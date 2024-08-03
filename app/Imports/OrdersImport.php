<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

use Illuminate\Support\Str;
class OrdersImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Order([
            'order_date' => $row[0],
            'customer_name' => $row[1],
            'customer_phone' => $row[2],
            'customer_email' => $row[3],
            'shipping_address' => $row[4],
            'billing_address' => $row[5],
            'order_number' => "PK".Str::upper(Str::random(18)),
            'payment_method_id' => 1,
            'status' => 'open',
        ]);
    }
}
