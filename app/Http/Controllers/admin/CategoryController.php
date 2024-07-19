<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController
{
function createcategory(Request $request)
{
     $request->validate([
       'name'=>'required',
       'slug'=>'required',
        'image'=>'required',
   ]);
    $cover = Storage::put('cat', $request['image']);

   Categories::create([
       'name'=>$request->name,
       'slug'=>$request->slug,
       'image'=>$cover,
   ]);



   $msg="Category Create Successfully";
//   return response()->json([
//       'status'=>'success',
//       'message'=>$msg,
//   ]);
    return redirect('admin/category')->with('success', $msg);
}
function updatecategory(Request $request)
{
    $validatedData= $request->validate([
        'name'=>'required',
    ]);
    $category=Categories::findOrFail($request->id);
    $category->update($validatedData);

    return response()->json([
        'status' => 'success',
        'message' => 'Category updated successfully',
    ]);
}

    function detetecategory($id)
    {
        Categories::where('id', $id)->delete();
        $msg="Category delete successful";
        return response()->json([
            'status'=>'success',
            'message'=>$msg,
        ]);

}
}
