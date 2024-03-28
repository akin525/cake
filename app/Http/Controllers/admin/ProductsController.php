<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;
use App\Models\Layers;
use App\Models\Products;
use App\Models\Rtb;
use App\Models\Sizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController
{
 function addproductindex()
 {
     $category=Categories::all();
     return view('admin.addproduct', compact('category'));
 }
 function addproductindex1()
 {
     $category=Categories::all();
     return view('admin.addproduct1', compact('category'));
 }
 function addproductindex2()
 {
     $category=Categories::all();
     return view('admin.addproduct2', compact('category'));
 }
 function addproduct(Request $request)
 {
//     return $request;
     $request->validate([
         'tittle'=>'required',
         'content'=>'required',
         'price'=>'required',
         'cprice'=>'required',
         'fee'=>'required',
         'category'=>'required',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file validation rules as needed

     ]);

     $cover = Storage::put('cover', $request['image']);
     $insert=Products::create([
         'name'=>$request['tittle'],
         'description'=>$request['content'],
         'price'=>$request['price'],
         'cprice'=>$request['cprice'],
         'quantity'=>1,
         'addition'=>$request['addition'],
         'image'=>$cover,
         'category'=>$request['category'],
         'status'=>1,
         'fee'=>$request['fee'],
     ]);

     $layers = [];
     $layerName = null;
     $layerAmount = null;

     foreach ($request->layers as $item) {
         if (isset($item['name'])) {
             $layerName = $item['name'];
         } elseif (isset($item['amount'])) {
             $layerAmount = $item['amount'];
             // Insert into database here
             // For example:
             $layers[] = ['name' => $layerName, 'amount' => $layerAmount];
             // Reset variables for next iteration
             $layerName = null;
             $layerAmount = null;
         }
     }

     foreach ($layers  as $layer) {

//         return $layer;
//         if (isset($layer['name']) && isset($layer['amount'])) {
             Layers::create([
                 'name' => $layer['name'],
                 'amount' => $layer['amount'],
                 'product_id' => $insert->id,
             ]);
//         }
     }

     $sizes = [];
     $sizeName = null;
     $sizeAmount = null;

     foreach ($request->sizes as $item) {
         if (isset($item['name'])) {
             $sizesName = $item['name'];
         } elseif (isset($item['amount'])) {
             $sizesAmount = $item['amount'];
             // Insert into database here
             // For example:
             $sizes[] = ['name' => $sizesName, 'amount' => $sizesAmount];
             // Reset variables for next iteration
             $sizesName = null;
             $sizesAmount = null;
         }
     }

     foreach ($sizes as $size) {
//         if (isset($size['name']) && isset($size['amount'])) {
             Sizes::create([
                 'name' => $size['name'],
                 'amount' => $size['amount'],
                 'product_id' => $insert->id,
             ]);
//         }
     }

     $mg="product post was Successful";
     return redirect('admin/addproduct')->with('success', $mg);

 }
 function addproduct1(Request $request)
 {
//     return $request;
     $request->validate([
         'tittle'=>'required',
         'content'=>'required',
         'price'=>'required',
         'cprice'=>'required',
         'fee'=>'required',
         'category'=>'required',
         'image'=>'required',
     ]);

     $cover = Storage::put('cover', $request['image']);
     $insert=Products::create([
         'name'=>$request['tittle'],
         'description'=>$request['content'],
         'price'=>$request['price'],
         'cprice'=>$request['cprice'],
         'quantity'=>1,
         'addition'=>$request['addition'],
         'image'=>$cover,
         'category'=>$request['category'],
         'cool'=>'hots',
         'status'=>1,
         'fee'=>$request['fee'],
     ]);

     $layers = [];
     $layerName = null;
     $layerAmount = null;

     foreach ($request->layers as $item) {
         if (isset($item['name'])) {
             $layerName = $item['name'];
         } elseif (isset($item['amount'])) {
             $layerAmount = $item['amount'];
             // Insert into database here
             // For example:
             $layers[] = ['name' => $layerName, 'amount' => $layerAmount];
             // Reset variables for next iteration
             $layerName = null;
             $layerAmount = null;
         }
     }

     foreach ($layers  as $layer) {

//         return $layer;
//         if (isset($layer['name']) && isset($layer['amount'])) {
         Layers::create([
             'name' => $layer['name'],
             'amount' => $layer['amount'],
             'product_id' => $insert->id,
         ]);
//         }
     }

     $sizes = [];
     $sizeName = null;
     $sizeAmount = null;

     foreach ($request->sizes as $item) {
         if (isset($item['name'])) {
             $sizesName = $item['name'];
         } elseif (isset($item['amount'])) {
             $sizesAmount = $item['amount'];
             // Insert into database here
             // For example:
             $sizes[] = ['name' => $sizesName, 'amount' => $sizesAmount];
             // Reset variables for next iteration
             $sizesName = null;
             $sizesAmount = null;
         }
     }

     foreach ($sizes as $size) {
//         if (isset($size['name']) && isset($size['amount'])) {
         Sizes::create([
             'name' => $size['name'],
             'amount' => $size['amount'],
             'product_id' => $insert->id,
         ]);
//         }
     }

     $mg="product post was Successful";
     return redirect('admin/addproduct1')->with('success', $mg);

 }
 function addproduct2(Request $request)
 {
//     return $request;
     $request->validate([
         'tittle'=>'required',
         'content'=>'required',
         'price'=>'required',
         'cprice'=>'required',
         'fee'=>'required',
         'category'=>'required',
         'image'=>'required',
     ]);

     $cover = Storage::put('cover', $request['image']);
     $insert=Rtb::create([
         'name'=>$request['tittle'],
         'description'=>$request['content'],
         'price'=>$request['price'],
         'cprice'=>$request['cprice'],
         'quantity'=>1,
         'addition'=>$request['addition'],
         'image'=>$cover,
         'category'=>$request['category'],
         'cool'=>'hots',
         'status'=>1,
         'fee'=>$request['fee'],
     ]);

     $mg="product post was Successful";
     return redirect('admin/addproduct2')->with('success', $mg);

 }
 function editproduct($request)
 {
     $product=Products::where('id', $request)->first();
     $category=Categories::all();
     return view('admin.editproduct', compact('product', 'category'));
 }
 function editproduct1($request)
 {
     $product=Rtb::where('id', $request)->first();
     $category=Categories::all();
     return view('admin.editproduct1', compact('product', 'category'));
 }
 function updateproduct(Request $request)
 {
     $validatedData = $request->validate([
         'name' => 'required|string|max:255',
         'category' => 'required|string|max:255',
         'price' => 'required|numeric|min:0',
         'cprice' => 'required|numeric|min:0',
         'fee' => 'required|numeric|min:0',
         'description' => 'nullable|string',

     ]);
     $product = Products::findOrFail($request->id);

     // Update the product
     $product->update($validatedData);


     return response()->json([
         'status' => 'success',
         'message' => 'Product updated successfully',
         'product' => $product,
     ]);
 }
 function updateproduct1(Request $request)
 {
     $validatedData = $request->validate([
         'name' => 'required|string|max:255',
         'category' => 'required|string|max:255',
         'price' => 'required|numeric|min:0',
         'cprice' => 'required|numeric|min:0',
         'fee' => 'required|numeric|min:0',
         'description' => 'nullable|string',

     ]);
     $product = Rtb::findOrFail($request->id);

     // Update the product
     $product->update($validatedData);


     return response()->json([
         'status' => 'success',
         'message' => 'Product updated successfully',
         'product' => $product,
     ]);
 }
 function destroyproduct($id)
    {
        // Find the product by ID
        $product = Products::findOrFail($id);

        // Delete the product
        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully',
            'product' => $product
        ]);
    }
}

