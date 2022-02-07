<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

use Carbon\Carbon;
use Str;

class SubcategoryController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    //to view create page
    public function create()
    {
      $all_categories = Category::all();
      return view('subcategory.create',compact('all_categories'));
    }
    //to view create page
    public function store(Request $request)
    {
      $request->validate([
        'category_id' => 'required',
        'subcategory_name' => 'required|unique:subcategories,subcategory_name',
      ]);

      Subcategory::insert([
        'category_id' => $request->category_id,
        'subcategory_name' => Str::lower($request->subcategory_name),
        'created_at' => Carbon::now(),
      ]);

      return back()->with('InsDone','Insert in DB successfully');
    }

    //to view index page
    public function index()
    {
      $all_subcategories = Subcategory::all();
      return view('subcategory.index',compact('all_subcategories'));
    }



}
