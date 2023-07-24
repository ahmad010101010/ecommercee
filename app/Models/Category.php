<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';

    protected $fillable =[
        'name',
        'slug',
        'image',
        'description',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'


    ];

    public function prodects(){
        return $this->hasMany(product::class,'category_id','id');
    }

    public function brand(){
        return $this->hasMany(Brand::class);
    }

}
