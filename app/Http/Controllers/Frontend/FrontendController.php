<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $products = product::where('status','=',0)->get();
        return view('frontend.index',compact('products'));
    }
}
