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
    public function updateattribute(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Find the attribute by its ID
        $attribute = Attributes::find($request->id);

        if (!$attribute) {
            return response()->json([
                'status' => 'error',
                'message' => 'Attribute not found',
            ], 404);
        }

        // Update the attribute
        $attribute->update([
            'name' => $request->input('name'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Attribute updated successfully',
        ]);
    }
    public function deleteattribute($request)
    {
        // Validate the incoming request


        // Find the attribute by its ID
        $attribute = Attributes::find($request);

        if (!$attribute) {
            return response()->json([
                'status' => 'error',
                'message' => 'Attribute not found',
            ], 404);
        }

        // Update the attribute
        $attribute->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Attribute delete successfully',
        ]);
    }

}
