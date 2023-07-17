<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        $categories = Category::where('status','=','0')->get();
        return view('admin.brand.index',compact('brands','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::where('status','=','0')->get();
        return view('admin.brand.create',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandStoreRequest $request)
    {
        Brand::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->slug),
            'status'=>$request->status == true ? '1':'0',
            'category_id'=>$request->category_id,

        ]);
        return to_route('brands.index')->with('message','Brand Add successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $categories = Category::where('status','=','0')->get();

        return view('admin.brand.edit',compact('brand','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandStoreRequest $request, Brand $brand)
    {
        $brand->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->slug),
            'status'=>$request->status == true ? '1':'0',
            'category_id'=>$request->category_id,
        ]);

        return to_route('brands.index')->with('message','Brand updted successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return to_route('brands.index')->with('danger','Brand deleted successfuly');
    }
}
