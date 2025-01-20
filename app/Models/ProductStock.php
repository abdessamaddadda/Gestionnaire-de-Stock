<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $table = 'product_stocks';
	public $timestamps = true;

	public function product()
		{
			return $this->belongsTo('App\Models\Product');
		}
}
