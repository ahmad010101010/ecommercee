<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStorRequiest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $categories = Category::all();

        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStorRequiest $request)
    {
        $image = $request->file('image')->store('category');
        //dd($image);====

         Category::create([

            'image' => $image,
            'name'=>$request->name,
            'slug'=> Str::slug($request->slug),
            'description'=>$request->description,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'status'=>$request->status == true ? '1':'0',

        ]);

            return to_route('categories.index')->with('message','Category add sucssfully');

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
    public function edit(Category $category)
    {



        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $image= $category->image;
        if($request->hasFile('image')){
            storage::delete($category->image);
        $image = $request->file('image')->store('category');
        }

        $category->update([
            'image' => $image,
            'name'=>$request->name,
            'slug'=>Str::slug($request->slug),
            'description'=>$request->description,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'status'=>$request->status == true ? '1':'0',
        ]);
        return to_route('categories.index')->with('message','Category updated sucssfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->delete();
        return to_route('categories.index')->with('danger','category deleted succssessfully');
    }
}
