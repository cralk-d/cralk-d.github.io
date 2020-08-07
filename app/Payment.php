<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
