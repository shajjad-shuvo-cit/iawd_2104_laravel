<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

use Str;
use Carbon\Carbon;

class RoleController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
    }
    //to view role add form page;
    function addform()
    {
        $all_roles = Role::all();
        return view('role.add',compact('all_roles'));
    }

    //store in databae
    function storerole(Request $request)
    {
        $request->validate([
            'role' => 'required',
        ]);
        // print_r($request->all());

        $role =  Str::upper($request->role);

        if(Role::Where('role', '=', $role)->doesntExist()){
          Role::insert([
              'role' => $role,
              'created_at' => Carbon::now(),
          ]);
        }else{
          return back()->with('InsErr','Already inserted');
        }

        return back();
    }








}
