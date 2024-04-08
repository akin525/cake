<?php

namespace App\Http\Controllers\admin;

use App\Models\Attribute;
use App\Models\Attributes;
use Illuminate\Http\Request;

class CreateAttributeController
{
    function index()
    {
        $attribute=Attributes::all();
        return view('admin.attribute', compact('attribute'));
 }

    function createattribute(Request $request)
    {
        $create=$request->validate([
            'name'=>'required',
        ]);

        $insert=Attributes::create($create);
        return response()->json([
            'status'=>'success',
            'message'=>'attribute create successfully',
        ]);

 }

}
