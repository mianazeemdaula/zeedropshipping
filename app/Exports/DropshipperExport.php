<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class DropshipperExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return User::query()->role('dropshipper');
    }

    public function map($user): array
    {
        return [
            $user->vendor->ds_number,
            $user->name,
            $user->email,
            $user->phone,
            $user->vendor->business_name,
            $user->vendor->mobile,
            $user->vendor->status,
            $user->vendor->city_name,
            $user->vendor->store_url,
            $user->vendor->address,
            $user->vendor->note,
            $user->created_at,
            $user->updated_at,
            // Date::dateTimeToExcel($user->created_at),
            // Date::dateTimeToExcel($user->updated_at),
        ];
    }

    public function headings(): array
    {
        return [
            'DS Number',
            'Name',
            'Email',
            'Phone',
            'Business Name',
            'Mobile',
            'Status',
            'City',
            'Store URL',
            'Address',
            'Note',
            'Created At',
            'Updated At',
        ];
    }
}
