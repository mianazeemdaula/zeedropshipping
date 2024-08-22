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
        Order::whereIn('status', ['dispatched'])->get()->each(function($order){
            $status = $this->getOrderStatus($order);
            // $order->status = $status;
            // $order->save();
        });
    }

    public $digidokan;

    private function getOrderStatus($order)
    {
        try {
            if($order->shipper_id === 1){
                $response = $this->digidokan->getShipmentTracking($order->tracking_number);
                return strtolower($response);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $order->status;
        }
        return $order->status;
    }
}
