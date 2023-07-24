<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $categories = Category::where('status','=','0')->latest()->take(4)->get();
        $products = product::where('status','=','0')
        ->where('popular','=','1')->latest()->take(15)->get();
        return view('frontend.index',compact('products','categories'));


    }public function show($slug){

        $product = product::where('slug','=',$slug)->first();

        return view('frontend.collections.show',compact('product'));
    }

    public function products(){

        $products = product::where('status','=','0')->get();
        return view('frontend.collections.products',compact('products'));
    }

    public function categories(){
        $categories = Category::where('status','=','0')->get();
        return view('frontend.collections.categories',compact('categories'));
    }

    public function categories_product($category_slug){


        $category = Category::where('slug','=',$category_slug)->first();
       // dd( $category);

        if($category){

            $products = $category->prodects()->get();

           // dd($products);

        return view('frontend.collections.products_by_category',compact('products','category'));

        }else{

            return redirect()->back();
        }
    }
}
