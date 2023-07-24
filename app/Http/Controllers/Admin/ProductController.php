<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\product_Images;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\productStoreRequest;
use Illuminate\Contracts\Support\ValidatedData;


class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::paginate(10);
        $categories = Category::all();
        return view('admin.product.index', compact('categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(productStoreRequest $request)
    {
        $product = product::create([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'description' => $request->description,
            'status' => $request->status == true ? '1' : '0',
            'popular' => $request->popular == true ? '1' : '0',
            'quntity' => $request->quntity,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_title,

        ]);



        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filename = $image->store('product');

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'name' => $filename,
                ]);
            };
        };

        return to_route('product.index')->with('message', 'Product Added sucssfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {


        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        $categories = Category::all();

        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(productStoreRequest $request, product $product)
    {
            //dd($request);
        $product->update([

            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'description' => $request->description,
            'status' => $request->status == true ? '1' : '0',
            'popular' => $request->popular == true ? '1' : '0',

            'quntity' => $request->quntity,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_title,

        ]);


        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $filename = $image->store('product');

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'name' => $filename,
                ]);
            };
        };

        return to_route('product.index')->with('message', 'Product updated sucssfully');
    }

    //this for deleting image frome edit bage
    public function deleteOneImage(int $id)
    {

        $image = product_Images::findOrfail($id);

        Storage::delete($image->name);

        $image->delete();

        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        if ($product->productImages()) {
            foreach ($product->productImages() as $image) {

                Storage::delete($image->name);
            }
        }
        $product->delete();
        return redirect()->back()->with('danger', 'Product deleted sucssfully');
    }


//ajax method fltering seclect barand based on category

    public function getPrands(Request $request)
    {
        $category_id = $request->input('category_id');

        $brands = brand::where('category_id', $category_id)->get();


        return response()->json($brands);
    }
}
