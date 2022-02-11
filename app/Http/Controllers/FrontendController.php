<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    //

    public function index()
    {
      $all_products = Product::all();
      return view('welcome',compact('all_products'));
    }
}
