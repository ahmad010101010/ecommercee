<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product_Images;
use App\Models\Category;



class product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable =[
        'name',
        'slug',
        'description',
        'original_price',
        'selling_price',
        'status',
        'meta_title',
        'quntity',
        'meta_description',
        'meta_keyword',
        'category_id',
        'brand_id',
        'popular',
    ];
    public function productImages(){
        return $this->hasMany(Product_Images::class,'product_id','id');
    }
    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
