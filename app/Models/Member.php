<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function paymentInstallmentReceived(){
        return $this->hasMany(PaymentInstallmentReceived::class);
    }

    public function cidbs(){
        return $this->hasMany(Cidb::class);
    }

}
