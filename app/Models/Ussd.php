<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ussd extends Model {
    protected $fillable = ['sim_id', 'ussd_code', 'status', 'response_message', 'client_phone', 'amount'];

    // Add these fields to your 'ussds' migration if they don't exist
    // 'response_message' (text, nullable), 'client_phone' (string), 'amount' (decimal)

    public function sim()
    {
        return $this->belongsTo(Sim::class);
    }


}
