<?php

namespace App\Http\Controllers\admin;

use App\Models\Attribute;
use App\Models\Attributes;
use App\Models\Categories;
use App\Models\Items;
use App\Models\Layers;
use App\Models\Option;
use App\Models\Products;
use App\Models\Rtb;
use App\Models\Sizes;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductsController
{
 function addproductindex()
 {
     $category=Categories::all();
     $attribute=Attributes::all();
     return view('admin.addproduct', compact('category', 'attribute'));
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


     $cover = Storage::put('cover', $request->file('image'));

// Create the product
     $insert = Products::create([
         'name' => $request->input('tittle'),
         'description' => $request->input('content')?? null,
         'price' => $request->input('price') ?? 0,
         'cprice' => $request->input('cprice') ?? 0,
         'ramount' => $request->input('ramount') ?? null,
         'tamount' => $request->input('tamount') ?? null,
         'quantity' => 1,
         'addition' => $request->input('addition') ?? null,
         'image' => $cover,
         'category' => $request->input('categories') ?? 'cakes',
         'status' => 1,
         'fee' => $request->input('fee') ?? 0,
         'topper'=>$request->input('topper') ?? 1,
         'card'=>$request->input('card') ?? 1,
     ]);

// Handle product variations
     if ($request->has('attribute') && $request->input('attribute') != null) {

         foreach ($request->attribute as $index => $tri) {
             if ($index % 2 == 0 && isset($tri['name']) && isset($request->attribute[$index + 1]['value'])) {
                 Attribute::create([
                     'product_id' => $insert['id'],
                     'name' => $tri['name'],
                     'value' => $request->attribute[$index + 1]['value'],
                 ]);
             }
         }
     }


     $act=Attributes::all();
     if ($request->has('variation_attributes') && $request->input('variation_attributes') != null) {
         foreach ($request['variation_attributes'] as $variation) {
             Variation::create([
                 'attribute_id' => $insert->id,
                 'attribute_size' => $variation['Sizes'],
                 'attribute_layer' => $variation['layers'] ?? null,
                 'attribute_flavor' => $variation['Flavor'] ?? null,
                 'price' => $variation['price'] ?? 0,
             ]);
         }
     }
     if ($request->has('items') && $request->input('items') != null) {
         foreach ($request->input('items') as $item) {
             if ($item['Sizes'] != null){
                 Items::create([
                     'product_id' => $insert->id,
                     'Product' => $item['Sizes'],
                     'price' => $item['price'] ?? 0,
                 ]);
         }
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
     $insert = Products::create([
         'name' => $request->input('tittle'),
         'description' => $request->input('content')?? null,
         'price' => $request->input('price') ?? 0,
         'cprice' => $request->input('cprice') ?? 0,
         'quantity' => 1,
         'addition' => $request->input('addition') ?? null,
         'image' => $cover,
         'category' => 'rtg',
         'status' => 1,
         'cool'=>'hots',
         'fee' => $request->input('fee') ?? 0,
     ]);

// Handle product variations
     foreach ($request->attribute as $index => $tri) {
         if ($index % 2 == 0 && isset($tri['name']) && isset($request->attribute[$index + 1]['value'])) {
             Attribute::create([
                 'product_id'=>$insert['id'],
                 'name' => $tri['name'],
                 'value' => $request->attribute[$index + 1]['value'] ??null,
             ]);
         }
     }

//     $collectionFromArray = collect($request->variation_attributes);

     $act=Attributes::all();
     foreach ($request['variation_attributes'] as $variation) {
         Variation::create([
             'attribute_id' => $insert->id,
             'attribute_size' => $variation['Sizes'],
             'attribute_layer' => $variation['layers'] ?? null,
             'attribute_flavor' => $variation['Flavor'] ?? null,
             'price' => $variation['price']  ?? 0,
         ]);
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
         'category'=>$request['categories'],
         'cool'=>'hots',
         'status'=>1,
         'fee'=>$request['fee'],
     ]);

     $mg="product post was Successful";
     return redirect('admin/addproduct2')->with('success', $mg);

 }
 function duplicateproduct($request)
 {
     $product=Products::where('id', $request)->first();
     $category=Categories::all();
     $attribute=Attribute::where('product_id', $product->id)->get();
     $variation=Variation::where('attribute_id', $product->id)->get();
     $attributes=Attribute::all();
     $size=Sizes::where('product_id', $product->id)->get();
     $layer=Layers::where('product_id', $product->id)->get();
     $items=Items::where('product_id', $product->id)->get();

     return view('admin.duplicateproduct', compact('product',
         'category', 'attribute', 'variation', 'size','attributes', 'layer', 'items'));
 }

 function editproduct($request)
 {
     $product=Products::where('id', $request)->first();
     $category=Categories::all();
     $attribute=Attribute::where('product_id', $product->id)->get();
     $variation=Variation::where('attribute_id', $product->id)->get();
     $attributes=Attribute::all();
     $size=Sizes::where('product_id', $product->id)->get();
     $items=Items::where('product_id', $product->id)->get();
     $layer=Layers::where('product_id', $product->id)->get();
     return view('admin.editproduct', compact('product',
         'category', 'attribute', 'variation', 'size','attributes', 'layer', 'items'));
 }
 function editproduct1($request)
 {
     $product=Rtb::where('id', $request)->first();
     $category=Categories::all();
     $size=Sizes::where('product_id', $product->id)->get();
     $layer=Layers::where('product_id', $product->id)->get();
     $item=Items::where('product_id', $product->id)->get();
     return view('admin.editproduct1', compact('product', 'category', 'size',
         'layer', 'item'
     ));
 }
 function updateproduct(Request $request)
 {
//     return response()->json($request,  Response::HTTP_BAD_REQUEST);

     $validatedData = $request->validate([
         'name' => 'required|string|max:255',
         'price' => 'required|numeric|min:0',
         'tamount' => 'nullable|numeric|min:0',
         'ramount' => 'nullable|numeric|min:0',
         'cprice' => 'required|numeric|min:0',
         'fee' => 'required|numeric|min:0',
         'description' => 'nullable|string',
         'categories' => 'required|min:1',
         'image'=>'image',
     ]);


     $product = Products::findOrFail($request->id);
     if ($request->hasFile('image')) {
         // Store the image and get the path
         $cover = Storage::put('cover', $request->file('image'));

         // Update the product's image path
         $product->image = $cover;
     }
     // Update the product
//     $product->update($validatedData);

     $product->name = $validatedData['name'];
     $product->price = $validatedData['price'];
     $product->tamount = $validatedData['tamount'];
     $product->ramount = $validatedData['ramount'];
     $product->cprice = $validatedData['cprice'];
     $product->fee = $validatedData['fee'];
     $product->description = $validatedData['description'];
     $product->category = $validatedData['categories'];
     $product->topper = $request['topper'];
     $product->card = $request['card'];

     $product->save();
     if ($request->has('attribute') && $request->input('attribute') != null) {
         foreach ($request->input('attribute') as $index => $tri) {
             if ($index % 2 == 0 && isset($tri['name']) && isset($request->input('attribute')[$index + 1]['value'])) {
                 if (isset($tri['id'])) {
                     $act = Attribute::find($tri['id']);
                     if ($act) {
                         $act->update([
                             'name' => $tri['name'],
                             'value' => $request->input('attribute')[$index + 1]['value'],
                         ]);
                     } else {
                         Attribute::create([
                             'product_id' => $product->id,
                             'name' => $tri['name'],
                             'value' => $request->input('attribute')[$index + 1]['value'],
                         ]);
                     }
                 } else {
                     Attribute::create([
                         'product_id' => $product->id,
                         'name' => $tri['name'],
                         'value' => $request->input('attribute')[$index + 1]['value'],
                     ]);
                 }
             }
         }
     }

     if ($request->has('variation_attributes') && $request->input('variation_attributes') != null) {
         foreach ($request->input('variation_attributes') as $index => $tri) {
             if ($index % 2 == 0 && isset($request->input('variation_attributes')[$index + 1]['price'])) {
                 if (isset($tri['id'])) {
                     $act = Variation::find($tri['id']);
                     if ($act) {
                         $act->update([
                             'price' => $request->input('variation_attributes')[$index + 1]['price'],
                         ]);
                     } else {
                         Variation::create([
                             'attribute_id' => $product->id,
                             'attribute_size' => $tri['Sizes'] ?? null,
                             'attribute_layer' => $tri['layers'] ?? null,
                             'attribute_flavor' => $tri['Flavor'] ?? null,
                             'price' => $request->input('variation_attributes')[$index + 1]['price'] ?? 0,
                         ]);
                     }
                 } else {
                     Variation::create([
                         'attribute_id' => $product->id,
                         'attribute_size' => $tri['Sizes'] ?? null,
                         'attribute_layer' => $tri['layers'] ?? null,
                         'attribute_flavor' => $tri['Flavor'] ?? null,
                         'price' => $request->input('variation_attributes')[$index + 1]['price'] ?? 0,
                     ]);
                 }
             }
         }
     }

     if ($request->has('items') && $request->input('items') != null) {
         $existingItems = Items::where('product_id', $request->id)->get();
         $existingItemIds = $existingItems->pluck('id')->toArray();

         foreach ($request->input('items') as $key => $item) {
             if (isset($item['id']) && in_array($item['id'], $existingItemIds)) {
                 // Update existing item
                 $existingItem = Items::find($item['id']);
                 if ($existingItem) {
                     $existingItem->update([
                         'Product' => $item['Sizes'],
                         'price' => $item['price'] ?? 0,
                     ]);
                 }else {
                     // Create new item

                     Items::create([
                         'product_id' => $request->id,
                         'Product' => $item['Sizes'],
                         'price' => $item['price'] ?? 0,
                     ]);

                 }
             }
         }
     }


     return response()->json([
         'status' => 'success',
         'message' => 'Product updated successfully',
         'product' => $product,
     ]);
 }
 function duplicateupdateproduct(Request $request)
 {
//     return $request;
//     return response()->json($request,  Response::HTTP_BAD_REQUEST);




     $cover = Storage::put('cover', $request->file('image'));

// Create the product
     $insert = Products::create([
         'name' => $request->input('tittle'),
         'description' => $request->input('content')?? null,
         'price' => $request->input('price') ?? 0,
         'cprice' => $request->input('cprice') ?? 0,
         'ramount' => $request->input('ramount') ?? null,
         'tamount' => $request->input('tamount') ?? null,
         'quantity' => 1,
         'addition' => $request->input('addition') ?? null,
         'image' => $cover,
         'category' => $request->input('categories') ?? 'cakes',
         'status' => 1,
         'fee' => $request->input('fee') ?? 0,
         'topper'=>$request->input('topper') ?? 1,
         'card'=>$request->input('card') ?? 1,
     ]);

// Handle product variations
     if ($request->has('attribute') && $request->input('attribute') != null) {

         foreach ($request->attribute as $index => $tri) {
             if ($index % 2 == 0 && isset($tri['name']) && isset($request->attribute[$index + 1]['value'])) {
                 Attribute::create([
                     'product_id' => $insert['id'],
                     'name' => $tri['name'],
                     'value' => $request->attribute[$index + 1]['value'],
                 ]);
             }
         }
     }


     $act=Attributes::all();
     if ($request->has('variation_attributes') && $request->input('variation_attributes') != null) {
         foreach ($request['variation_attributes'] as $variation) {
             Variation::create([
                 'attribute_id' => $insert->id,
                 'attribute_size' => $variation['Sizes'],
                 'attribute_layer' => $variation['layers'] ?? null,
                 'attribute_flavor' => $variation['Flavor'] ?? null,
                 'price' => $variation['price'] ?? 0,
             ]);
         }
     }
     if ($request->has('items') && $request->input('items') != null) {
         foreach ($request->input('items') as $item) {
             if ($item['Sizes'] != null){
                 Items::create([
                     'product_id' => $insert->id,
                     'Product' => $item['Sizes'],
                     'price' => $item['price'] ?? 0,
                 ]);
             }
         }
     }


     $mg = "Product post was successful";
     return redirect('admin/allproduct')->with('success', $mg);


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

        $attribute=Attribute::where('product_id', $product->id)->delete();
        $variation=Variation::where('attribute_id', $product->id)->delete();
        $item=Items::where('product_id', $product->id)->delete();

        // Delete the product
        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully',
        ]);
    }

    function postoptionindex()
    {
        $option=Option::all();
        return view('admin.option', compact('option'));
    }

    function postoptionproduct(Request $request)
    {

       $post= $request->validate([
            'product'=>'required',
            'price'=>'required',
        ]);


       $insert=Option::create($post);

        return response()->json([
            'status' => 'success',
            'message' => 'Product Option posted',
        ]);
    }
}

