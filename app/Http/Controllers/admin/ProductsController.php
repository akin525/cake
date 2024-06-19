<?php

namespace App\Http\Controllers\admin;

use App\Models\Attribute;
use App\Models\Attributes;
use App\Models\Categories;
use App\Models\Layers;
use App\Models\Option;
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
//     return response()->json($request, Response::HTTP_BAD_REQUEST);
// Validate the request
//     $request->validate([
//         'tittle' => 'required',
//         'content' => 'required',
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//         // Add other validation rules as needed
//     ]);




//     return $request;
// Upload the image file
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
         'category' => $request->input('categories'),
         'status' => 1,
         'fee' => $request->input('fee') ?? 0,
     ]);

// Handle product variations
     foreach ($request->attribute as $index => $tri) {
         if ($index % 2 == 0 && isset($tri['name']) && isset($request->attribute[$index + 1]['value'])) {
             Attribute::create([
                 'product_id'=>$insert['id'],
                 'name' => $tri['name'],
                 'value' => $request->attribute[$index + 1]['value'],
             ]);
         }
     }


     $act=Attributes::all();
         foreach ($request['variation_attributes'] as $variation) {
             Variation::create([
                 'attribute_id' => $insert->id,
                 'attribute_size' => $variation['Sizes'],
                 'attribute_layer' => $variation['layers'] ?? null,
                 'attribute_flavor' => $variation['Flavor'] ?? null,
                 'price' => $variation['price'] ??0  ,
             ]);
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
     return view('admin.duplicateproduct', compact('product',
         'category', 'attribute', 'variation', 'size','attributes', 'layer'));
 }

 function editproduct($request)
 {
     $product=Products::where('id', $request)->first();
     $category=Categories::all();
     $attribute=Attribute::where('product_id', $product->id)->get();
     $variation=Variation::where('attribute_id', $product->id)->get();
     $attributes=Attribute::all();
     $size=Sizes::where('product_id', $product->id)->get();
     $layer=Layers::where('product_id', $product->id)->get();
     return view('admin.editproduct', compact('product',
         'category', 'attribute', 'variation', 'size','attributes', 'layer'));
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
//     return response()->json($request,  Response::HTTP_BAD_REQUEST);

     $validatedData = $request->validate([
         'name' => 'required|string|max:255',
         'price' => 'required|numeric|min:0',
         'tamount' => 'nullable|numeric|min:0',
         'ramount' => 'nullable|numeric|min:0',
         'cprice' => 'required|numeric|min:0',
         'fee' => 'required|numeric|min:0',
         'description' => 'nullable|string',

     ]);


     $product = Products::findOrFail($request->id);

     // Update the product
     $product->update($validatedData);

//     foreach ($request->attribute as $index => $tri) {
//         if ($index % 2 == 0 && isset($tri['name']) && isset($request->attribute[$index + 1]['value'])) {
//             $act = Attribute::findOrFail($tri->id);
//             $act->update([
//                 'name' => $tri['name'],
//                 'value' => $request->attribute[$index + 1]['value'],
//             ]);
//         }
//     }


     foreach ($request->variation as $index => $tri) {
         if ($index % 2 == 0 && isset($tri['id']) && isset($request->variation[$index + 1]['price'])) {
             $act =Variation::findOrFail($tri['id']); // Ensure 'id' exists in $tri
             $act->update([
                 'price' => $request->variation[$index + 1]['price'],
             ]);
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
//     return response()->json($request,  Response::HTTP_BAD_REQUEST);

     $validatedData = $request->validate([
         'name' => 'required|string|max:255',
         'price' => 'required|numeric|min:0',
         'cprice' => 'required|numeric|min:0',
         'fee' => 'required|numeric|min:0',
         'description' => 'nullable|string',

     ]);


     $cover = Storage::put('cover', $request->file('image'));

// Create the product
     $insert = Products::create([
         'name' => $request->input('name'),
         'description' => $request->input('description')?? null,
         'price' => $request->input('price') ?? 0,
         'cprice' => $request->input('cprice') ?? 0,
         'ramount' => $request->input('ramount') ?? null,
         'tamount' => $request->input('tamount') ?? null,
         'quantity' => 1,
         'addition' => $request->input('addition') ?? null,
         'image' => $cover,
         'category' => $request->input('categories[]'),
         'status' => 1,
         'fee' => $request->input('fee') ?? 0,
     ]);

// Handle product variations
     foreach ($request->attribute as $index => $tri) {
         if ($index % 2 == 0 && isset($tri['name']) && isset($request->attribute[$index + 1]['value'])) {
             Attribute::create([
                 'product_id'=>$insert['id'],
                 'name' => $tri['name'],
                 'value' => $request->attribute[$index + 1]['value'],
             ]);
         }
     }

//     $collectionFromArray = collect($request->variation_attributes);

     $variationsArray =$request['variation'];

// Define an array to store variations temporarily
     $currentVariation = [];

// Iterate through the variations array
     foreach ($variationsArray as $variationData) {
         // Check if the attribute is present and add it to the current variation
         if (isset($variationData['id'])) {
             $currentVariation[$variationData['id']] = $variationData['price'] ?? 0;
         } elseif (isset($variationData['Sizes'])) {
             $currentVariation['Sizes'] = $variationData['Sizes'];
         } elseif (isset($variationData['layers'])) {
             $currentVariation['layers'] = $variationData['layers'];
         } elseif (isset($variationData['Flavor'])) {
             $currentVariation['Flavor'] = $variationData['Flavor'];
         }

         // If the current variation is complete (contains all required attributes), insert it into the database
         if (count($currentVariation) == 5) {
             Variation::create([
                 'attribute_id' => $insert->id,
                 'attribute_size' => $currentVariation['Sizes'],
                 'attribute_layer' => $currentVariation['layers'] ?? null,
                 'attribute_flavor' => $currentVariation['Flavor'] ?? null,
                 'price' => $currentVariation['price'] ?? 0,
             ]);
             // Reset the current variation array
             $currentVariation = [];
         }
     }

// Insert the last variation
     if (!empty($currentVariation)) {
         Variation::create($currentVariation);
     }
// Redirect with success message
     $mg = "Product post was successful";
     return redirect('admin/addproduct')->with('success', $mg);


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

