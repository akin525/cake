<?php

namespace App\Http\Controllers\admin;

use App\Models\Attribute;
use App\Models\Categories;
use App\Models\Layers;
use App\Models\Products;
use App\Models\Rtb;
use App\Models\Sizes;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
// Validate the request
     $request->validate([
         'tittle' => 'required',
         'content' => 'required',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
         // Add other validation rules as needed
     ]);

// Upload the image file
     $cover = Storage::put('cover', $request->file('image'));

// Create the product
     $insert = Products::create([
         'name' => $request->input('tittle'),
         'description' => $request->input('content'),
         'price' => $request->input('price') ?? 0,
         'cprice' => $request->input('cprice') ?? 0,
         'quantity' => 1,
         'addition' => $request->input('addition') ?? null,
         'image' => $cover,
         'category' => $request->input('category'),
         'status' => 1,
         'fee' => $request->input('fee') ?? 0,
     ]);

// Handle product variations
     if ($request->has('attribute')) {
         foreach ($request->input('attribute') as $attribute) {
             $act = Attribute::create([
                 'name' => $attribute['name'],
                 'value' => $attribute['value'],
                 'product_id' => $insert->id,
             ]);


         }
     }
     if (isset($request['variation_attributes'])) {
         foreach ($request['variation_attributes'] as $variation) {
             Variation::create([
                 'attribute_id' => $insert->id,
                 'attribute_value' => $variation['sizes'],
                 'attribute_value1' => $variation['layer'] ?? null,
                 'attribute_name' => $variation['flavour'] ?? null,
                 'price' => $variation['price'] ?? 0,
             ]);
         }
     }

// Redirect with success message
     $mg = "Product post was successful";
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
     $size=Sizes::where('product_id', $product->id)->get();
     $layer=Layers::where('product_id', $product->id)->get();
     return view('admin.editproduct', compact('product', 'category', 'size', 'layer'));
 }
 function editproduct1($request)
 {
     $product=Rtb::where('id', $request)->first();
     $category=Categories::all();
     $size=Sizes::where('product_id', $product->id)->get();
     $layer=Layers::where('product_id', $product->id)->get();
     return view('admin.editproduct1', compact('product', 'category', 'size', 'layer'));
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

     $layers = [];
     $layerName = null;
     $layerAmount = null;
     $layerid = null;


     foreach ($request->layers as $item) {

         if (isset($item['name'])) {
             $layerName = $item['name'];

         } elseif (isset($item['amount'])) {
             $layerAmount = $item['amount'];
             // Insert into database here
             // For example:


         }elseif (isset($item['id'])) {
//             return response()->json( $item['id'], Response::HTTP_BAD_REQUEST);
             $layerid= $item['id'];

             $layers[] = ['name' => $layerName, 'amount' => $layerAmount, 'id'=>$layerid];
             // Reset variables for next iteration
             $layerName = null;
             $layerAmount = null;
             $layerid = null;
         }
     }

     foreach ($layers  as $layer) {

         $lay=Layers::where('id', $layer['id'])->get();
         foreach ($lay as $la){
             $la['name']=$layer['name'];
             $la->save();

         }
     }

     $sizes = [];
     $sizeName = null;
     $sizeAmount = null;
     $sizeid = null;

     foreach ($request->sizes as $item) {
         if (isset($item['name'])) {
             $sizesName = $item['name'];
         } elseif (isset($item['amount'])) {
             $sizesAmount = $item['amount'];

         } elseif (isset($item['id'])) {
             $sizesid= $item['id'];

             $sizes[] = ['name' => $sizesName, 'amount' => $sizesAmount, 'id'=>$sizesid];
             $sizesName = null;
             $sizesAmount = null;
             $sizesid = null;
         }
     }

     foreach ($sizes as $size) {
         $se=Sizes::where('id', $size['id'])->get();

         foreach ($se as $ses){
             $ses['name']=$size['name'];
             $ses['amount']=$size['amount'];
             $ses->save();
         }
     }

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

