<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Services\DigiDokan;


class CheckOrderStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-order-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check order status and update the status of the order';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking order status');
        $digidokan = new DigiDokan();
        Order::whereIn('status', ['dispatched','delivered','shipped'])->get()->each(function($order){
            $status = $this->getOrderStatus($order);
            // $order->status = $status;
            // $order->save();
        });
        $this->info('Order status checked');
    }

    public $digidokan;

    private function getOrderStatus($order)
    {
        try {
            if($order->shipper_id === 1){
                $response = (new DigiDokan())->getShipmentTracking([
                    'tracking_no' => $order->track_data['tracking_no'],
                    'order_no' => $order->track_data['order_no'],
                ]);
                $this->info("Order #$order->id status is $response");
                $nStatus =  strtolower($response);
                if($order->status === 'delivered'){
                    $user = $order->user;
                    // $user->notify(new OrderDelivered($order));
                    $tcost = $order->details()->sum(\DB::raw('price * qty'));
                    $pcost = $order->details()->sum(\DB::raw('ds_price * qty'));
                    $total = $tcost - $order->total - $order->shipping_cost;
                    $user->vendorRevenue()->create([
                        'order_id' => $order->id,
                        'user_id' => $user->id,
                        'amount' => $total,
                        'status' => 'paid',
                        'paid_at' => now(),
                        'description' => "Order #$order->id revenue",
                    ]);
                    // increase sales count
                    $order->details->each(function($detail){
                        $product = $detail->product;
                        $product->increment('sales_count', $detail->qty);
                    });
                }
                return $nStatus;
            }
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
            return $order->status;
        }
        return $order->status;
    }
}
