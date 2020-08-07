<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }
}
