<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class OrderItem extends Model
{

    use HasFactory;


    protected $fillable = [ 'order_id','product_id','quntity',];

    public function product(){
        return $this->belongsTo(product::class,'product_id','id');
    }



}
