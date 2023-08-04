<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name','address','phone','pincode','email','total_price','delivery_status','email_status'];



    public function users(){
        return $this->belongsTo(User::class);
    }


}
