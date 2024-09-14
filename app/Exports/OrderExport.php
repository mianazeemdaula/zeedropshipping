<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class OrderExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function __construct($ids)
    {
        $this->ids = $ids;
    }
    
    public function query()
    {
        return Order::query()->whereIn('id', $this->ids);
    }

    public function map($item): array
    {
        return [
            $item->order_number,
            $item->customer_name,
            $item->customer_email,
            $item->customer_phone,
            $item->shipping_address,
            $item->billing_address,
            $item->shipping_cost,
            $item->tax,
            $item->total,
            $item->zip,
            $item->city,
            $item->weight,
            $item->details->count(),
            $item->status,
            $item->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Order Number',
            'Customer Name',
            'Customer Email',
            'Customer Phone',
            'Shipping Address',
            'Billing Address',
            'Shipping Cost',
            'Tax',
            'Total',
            'Zip',
            'City',
            'Weight',
            'Items',
            'Status',
            'Created At',
        ];
    }
}
