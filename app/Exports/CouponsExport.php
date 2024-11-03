<?php

namespace App\Exports;

use App\Models\Coupon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CouponsExport implements FromCollection, WithHeadings
{
    /**
     * Return the collection of coupons.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Coupon::all(['code', 'max', 'discount', 'expired_date', 'status']);
    }

    /**
     * Return the headings for the columns.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Code',
            'Max Uses',
            'Discount (%)',
            'Expired Date',
            'Status',
        ];
    }
}
