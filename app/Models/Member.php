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
    public function PaymentCategoryAmount(){
        return $this->hasMany(PaymentCategoryAmount::class);
    }

    public function cidbs(){
        return $this->hasMany(Cidb::class);
    }

    public function passports(){
        return $this->hasMany(Passport::class);
    }
    public function documents(){
        return $this->hasMany(Document::class);
    }
    public function allVisa(){
        return $this->hasMany(Visa::class);
    }
    public function allLevis(){
        return $this->hasMany(Levi::class);
    }
    public function allIcards(){
        return $this->hasMany(Icard::class);
    }
    public function allOthers(){
        return $this->hasMany(Other::class);
    }

}
