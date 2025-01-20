<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = true;

    public function category()
		{
			return $this->belongsTo('App\Models\ProductCategory');
		}

    public function stock()
    {
      return $this->hasMany('App\Models\ProductStock');
    }
}
