<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProductExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Product::query();
    }

    public function map($item): array
    {
        return [
            $item->category->name,
            $item->name,
            $item->sku,
            $item->weight,
            $item->purchase_price,
            $item->sale_price,
            $item->discount_price,
            $item->vat,
            $item->stock,
            $item->low_stock_report,
            $item->min_order_qty,
            $item->max_order_qty,
            $item->description,
            $item->status,
            $item->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Category',
            'Name',
            'sku',
            'weight',
            'Purchase price',
            'Sale price',
            'Discount price',
            'vat',
            'Stock',
            'Low stock report',
            'Min order qty',
            'Max order qty',
            'Description',
            'Status',
            'Created at'
        ];
    }
}
