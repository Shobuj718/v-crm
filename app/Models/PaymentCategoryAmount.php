<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentCategoryAmount extends Model
{
    public function allPaymentAmount() {
        return $this->belongsTo(Company::class);
    }
}
