<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\prodect;

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
        return $this->hasMany(prodect::class,'category_id','id');
    }

    public function brand(){
        return $this->hasMany(Brand::class);
    }

}
