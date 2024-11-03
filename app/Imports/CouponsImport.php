<?php

namespace App\Imports;

use App\Models\Coupon;
use Maatwebsite\Excel\Concerns\ToModel;

class CouponsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) {
        $coupon = new Coupon();
        $coupon->code = $row[0];
        $coupon->max = $row[1];
        $coupon->discount = $row[2];
        $coupon->expired_date = $row[3];
        $coupon->status = $row[4];
        $coupon->save();

        return $coupon;
    }
}
