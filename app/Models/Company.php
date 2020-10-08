<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Model
{
    use SoftDeletes;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function members(){
        return $this->hasMany(Member::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }
    public function cidbs(){
        return $this->hasMany(Cidb::class);
    }
    public function paymentCategoryAmounts(){
        return $this->hasMany(PaymentCategoryAmount::class);
    }
    public function paymentInstallmentReceived(){
        return $this->hasMany(PaymentInstallmentReceived::class);
    }
    public function passports(){
        return $this->hasMany(Passport::class);
    }

    
}
