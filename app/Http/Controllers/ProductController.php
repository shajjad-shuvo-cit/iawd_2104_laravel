<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;

use Str;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }


    public function create()
    {
      $all_categories = Category::all();
      $all_sub_categories = Subcategory::all();
      return view('product.create',compact('all_categories','all_sub_categories'));
    }

    public function store(Request $request)
    {
      $request->validate([
        'product_name' => 'required',
        'old_price' => 'required|numeric',
        'product_image' => 'image',
      ]);



      $product_slug =  Str::slug(Str::lower($request->product_name));
      $sku = Str::lower(Str::substr($request->product_name,0,3)."-".Str::random());
      $product_id =  Product::insertGetId([
        'product_name' => Str::lower($request->product_name),
        'old_price' => $request->old_price,
        'new_price' => $request->new_price,
        'product_slug' => $product_slug,
        'product_sku' => $sku,
        'category_id' => $request->category_id,
        'sub_category_id' => $request->sub_category_id,
        'short_description' => $request->short_description,
        'created_at' => Carbon::now(),
      ]);

      if($request->hasFile('product_image')){
        $new_image_ext = $request->file('product_image')->getClientOriginalExtension();
        $image_name =  $product_id.".".$new_image_ext;
        //image upload starts
        Image::make($request->file('product_image'))->resize(270,310)->save(base_path('public/uploads/product_photo/'.$image_name));
        //image upload starts
        Product::find($product_id)->update([
          'product_image' => $image_name,
        ]);
      }

      return back();
    }

    public function index()
    {
      $all_products = Product::all();
      return view('product.index',compact('all_products'));
    }

    public function delete($id)
    {
      if(Product::find($id)->product_image != "product_default_image.jpg"){
        unlink(public_path()."/uploads/product_photo/".Product::find($id)->product_image);
      }
      Product::find($id)->delete();
      return back();
    }


    public function edit($id)
    {
      $product_info = Product::find($id);
      return view('product.edit',compact('product_info'));
    }

    public function update(Request $request)
    {

      if($request->hasFile('product_image')){
        if(Product::find($request->id)->product_image != "product_default_image.jpg"){
          unlink(public_path()."/uploads/product_photo/".Product::find($request->id)->product_image);
        }

        $new_image_ext = $request->file('product_image')->getClientOriginalExtension();
        $image_name =  $request->id.".".$new_image_ext;
        //image upload starts
        Image::make($request->file('product_image'))->resize(270,310)->save(base_path('public/uploads/product_photo/'.$image_name));

        Product::find($request->id)->update([
          'product_image' => $image_name,
        ]);
      }
      return back();
    }






}
