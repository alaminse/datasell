<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Orders extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'product_id', 'uid','	status','quantity','amount','sub_amount','discount','payment_method','email'.'coupon_code'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
