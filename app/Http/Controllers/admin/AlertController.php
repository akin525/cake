<?php


namespace App\Http\Controllers\admin;


use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController
{

    function loadindex()
    {
        $message=Alert::all();
        return view('admin.alert', compact('message'));
    }
    function updatealert(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'name'=>'required',
            'body'=>'required',
        ]);
        $check=Alert::where('id', $request->id)->first();

        $check->name=$request->name;
        $check->message=$request->body;
        $check->save();

        return response()->json([
            'status'=>'success',
            'message'=>'message Updated',
        ]);

    }
}
