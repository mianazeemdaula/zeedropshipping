<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Services\DigiDokan;
use Illuminate\Support\Facades\Log;

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
        $orders = Order::whereNotIn('status', ['open','cancelled','delivered'])->get();
        foreach($orders as $order){
            $status = $this->getOrderStatus($order);
            $status = (new DigiDokan())->getStatus($status);
            if($status !== $order->status){
                // Send notification
                if($status === 'delivered'){
                    $user = $order->user;
                    $codcost = $order->details()->sum(\DB::raw('price * qty'));
                    $pcost = $order->details()->sum(\DB::raw('ds_price * qty'));
                    $packing = $order->weight > 1000 ? 40 : 30;
                    $total = (( $codcost - $pcost ) - $this->deliveryCharge($order->weight)) - $packing;
                    $user->vendorRevenue()->create([
                        'order_id' => $order->id,
                        'user_id' => $user->id,
                        'amount' => $total,
                        'status' => 'earned',
                        'paid_at' => now(),
                        'description' => "Order #$order->id revenue",
                    ]);
                    // increase sales count
                    $order->details->each(function($detail){
                        $product = $detail->product;
                        $product->increment('sales_count', $detail->qty);
                    });
                }
            }
            $order->status = $status;
            $order->save();
        }
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
                Log::info("Order #$order->id status is $nStatus DIGIDOKAAN");
                return $nStatus;
            }
        } catch (\Throwable $th) {
            $this->error($th->getMessage());
            return $order->status;
        }
        return $order->status;
    }

    protected function deliveryCharge($weight){
        if($weight <= 1000){
            return 180;
        }
        $weight = $weight - 1000;
        return 180 + (100 * (ceil($weight / 1000)));
    }
}
