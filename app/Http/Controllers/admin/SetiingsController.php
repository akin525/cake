<?php

namespace App\Http\Controllers\admin;

use App\Models\Gateways;
use App\Models\Homepage;
use App\Models\Settings;
use App\Models\Topper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SetiingsController
{
function loadsettings()
{
    $setting=Settings::where('id', 1)->first();
    $homepage=Homepage::get();
    $slider=Homepage::where('status', 1)->first();

    return view('admin.settings', compact('setting', 'homepage', 'slider'));
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
function gatewayindex()
{
    $gateway=Gateways::where('name', 'paystack')->first();
return view('admin.gateway', compact( 'gateway'));
}
function updategateway(Request $request)
{
    $request->validate([
        'sk'=>'required',
        'pk'=>'required',
        'mk'=>'required',
        'ck'=>'required',
    ]);

    $gateway=Gateways::where('name', 'paystack')->first();

    $gateway->skey=$request->sk;
    $gateway->pkey=$request->pk;
    $gateway->call_url=$request->call_url ?? null;
    $gateway->cancel_url=$request->cancel_url ?? null;
    $gateway->member_call=$request->mk ?? null;
    $gateway->member_cancel=$request->ck ?? null;
    $gateway->save();

    return response()->json([
        'status'=>'success',
        'message'=>'Paystack updated',
    ]);
}

function aboutindex()
{
    $abouts=Settings::where('id', 1)->first();
    $about=$abouts->about;
    return view('admin.about', compact('about'));
}
function updateabout(Request $request){
    $request->validate([
        'contents'=>'required',
    ]);

    $abouts=Settings::where('id', 1)->first();
    $abouts->about= $request->contents;
    $abouts->save();
    return response()->json([
        'status'=>'success',
        'message'=>'About-us updated',
    ]);
}

    function banneruploadslidder(Request $request)
    {

        $request->validate([
            'slider'=>'required',
        ]);

        $slider = Storage::put('cover', $request['slider']);
        $upload=Homepage::get();
        foreach ($upload as $up){
            $up->slider=$slider;
            $up->save();
        }


        $mg = "Slider upload successfully";
        return redirect('admin/settings')->with('success', $mg);

}

    function loadtopper()
    {
        $topper=Topper::all();

        return view('admin/topper', compact('topper'));
}
function createtopper(Request $request)
{
    $validate=$request->validate([
        'name'=>'required',
        'amount'=>'required',
    ]);

    Topper::create($validate);

    $msg="Topper Created Success";

    return response()->json([
        'status'=>'success',
        'message'=>$msg,
    ]);
}

    function updatetopper(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required|integer|exists:toppers,id', // Assuming 'id' is needed to identify the record
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        // Find the Topper record by id and update it with the validated data
        $topper = Topper::find($validate['id']);
        $topper->update($validate);

        $msg = "Topper Updated Successfully";

        return response()->json([
            'status' => 'success',
            'message' => $msg,
        ]);
    }
    function detetetopper($id)
    {
        Topper::where('id', $id)->delete();
        $msg="Topper delete successful";
        return response()->json([
            'status'=>'success',
            'message'=>$msg,
        ]);

    }

}
