<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;

    public function customer()
    {
      return $this->belongsTo('App\Models\Customer');
    }
}
