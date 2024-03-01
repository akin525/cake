<?php

namespace App\Http\Controllers\admin;

use App\Models\Homepage;
use App\Models\Settings;
use Illuminate\Http\Request;

class SetiingsController
{
function loadsettings()
{
    $setting=Settings::where('id', 1)->first();
    $homepage=Homepage::get();

    return view('admin.settings', compact('setting', 'homepage'));
}
function changepage(Request $request)
{
    $request->validate([
        'page'=>'required',
    ]);
    $check=Homepage::where('status', "1")->first();

    $check->status=0;
    $check->save();
    $page=Homepage::where('page',$request->page)->first();

     $page->status=1;
     $page->save();

     $msg="Page Switch Successfully";

     return response()->json([
         'status'=>'success',
         'message'=>$msg,
     ]);
}
}