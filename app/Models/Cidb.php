<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidb extends Model
{
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
