<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillabel = [ 'user_id','product_id','product_qty' ];

    public function cartProduct(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
