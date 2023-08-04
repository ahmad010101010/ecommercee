<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category)
    {
        $category = Category::where('name', $category)->first();
        $product = product::where('category_id',$category->id)->get();
    return response()->json($product);
    }

    public function allProduct()
    {
        $allProduct = product::all();
        return response()->json($allProduct);
    }
}
