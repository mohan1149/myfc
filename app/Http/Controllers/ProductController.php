<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $products = Product::where('uid',auth()->user()->id)
            ->leftJoin('categories as cat','cat.id','=','products.category')
            ->leftJoin('brands as brand','brand.id','=','products.brand')
            ->select(['products.*','cat.name as category_name','brand.name as brand_name'])
            ->get();
            return view('products.index',['products'=>$products]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categories = Category::all()->pluck('name','id');
            $brands = Brand::all()->pluck('name','id');
            return view('products.create',['categories'=>$categories,'brands'=>$brands]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $product = new Product();
            $product->name = strip_tags($request['name']);
            $avatar = $request->file('avatar');
            $image_name  = uniqid().'.'.$avatar->getClientOriginalExtension();
            $destination = 'storage/avatars';
            $avatar->move($destination, $image_name );
            $url = $request->getSchemeAndHttpHost().'/storage/avatars/'.$image_name;
            $product->avatar = $url;
            $product->uid = auth()->user()->id;
            $product->price = strip_tags($request['price']);
            $product->description = strip_tags($request['description']);
            $product->category = $request['category'];
            $product->brand = $request['brand'];
            $product->color = $request['color'];
            $product->size = $request['size'];
            $product->stock = $request['stock'];
            $product->save();
            return redirect('/products');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
