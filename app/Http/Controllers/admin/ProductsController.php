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
 function addproductindexs()
 {
     $category=Categories::all();
     $attribute=Attributes::all();
     return view('admin.addproduct3', compact('category', 'attribute'));
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
 function addproduct3(Request $request)
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
//         'category' => $request->input('categories') ?? 'cakes',
         'status' => 1,
         'fee' => $request->input('fee') ?? 0,
         'topper'=>$request->input('topper') ?? 1,
         'card'=>$request->input('card') ?? 1,
     ]);

     $categoryIds = $request->input('categories', []); // Ensure it's an array
     $insert->categories()->attach($categoryIds);

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
 function addproduct(Request $request)
 {
//     return $request;


     $cover = Storage::put('cover', $request->file('image'));

// Create the product
     $product = Products::create([
         'name' => $request->input('tittle'),
         'description' => $request->input('content')?? null,
         'price' => $request->input('price') ?? 0,
         'cprice' => $request->input('cprice') ?? 0,
         'ramount' => $request->input('ramount') ?? null,
         'tamount' => $request->input('tamount') ?? null,
         'quantity' => 1,
         'addition' => $request->input('addition') ?? null,
         'image' => $cover,
         'status' => 1,
         'fee' => $request->input('fee') ?? 0,
         'topper'=>$request->input('topper') ?? 1,
         'card'=>$request->input('card') ?? 1,
         'text'=>$request->input('text') ?? 1,
         'color'=>$request->input('color') ?? 1,
     ]);

     $categoryIds = $request->input('categories', []); // Ensure it's an array
     $product->categories()->attach($categoryIds);

// Handle product variations
     if ($request->has('attribute') && !empty($request->input('attribute'))) {
         foreach ($request->attribute as $attr) {
             if (isset($attr['name']) && isset($attr['value'])) {
                 Attribute::create([
                     'product_id' => $product->id,
                     'name' => $attr['name'],
                     'value' => $attr['value'],
                 ]);
             }
         }
     }

     // Handle product variations
     if ($request->has('variation_attributes') && !empty($request->input('variation_attributes'))) {
         foreach ($request->variation_attributes as $variationData) {
             $variation = $product->variations()->create([
                 'price' => $variationData['price'],
             ]);

             foreach ($variationData as $key => $value) {
                 if ($key !== 'price') {
                     $variation->options()->create([
                         'name' => $key,
                         'value' => $value,
                     ]);
                 }
             }
         }
     }

     // Handle additional items
     if ($request->has('items') && !empty($request->input('items'))) {
         foreach ($request->input('items') as $item) {
             if (!empty($item['Sizes'])) {
                 Items::create([
                     'products_id' => $product->id,
                     'Product' => $item['Sizes'],
                     'price' => $item['price'] ?? 0,
                 ]);
             }
         }
     }


// Redirect with success message
     $mg = "Product post was successful";
     return redirect('admin/allproduct')->with('success', $mg);

 }
 function addproduct1(Request $request)
 {
//     return $request;
//     $request->validate([
//         'tittle'=>'required',
//         'price'=>'required',
//         'content'=>'required',
//         'image'=>'required',
//     ]);

     $cover = Storage::put('cover', $request['image']);
     $insert = Products::create([
         'name' => $request->input('tittle'),
         'description' => $request->input('content')?? null,
         'price' => $request->input('price') ?? 0,
         'cprice' => $request->input('cprice') ?? 0,
         'quantity' => 1,
         'addition' => $request->input('addition') ?? null,
         'image' => $cover,
         'status' => 1,
         'cool'=>'hots',
         'fee' => $request->input('fee') ?? 0,
//         'category' => $request->input('categories') ?? 'cakes',
         'topper'=>$request->input('topper') ?? 1,
         'card'=>$request->input('card') ?? 1,
     ]);
     $categoryIds = $request->input('categories', []); // Ensure it's an array
     $insert->categories()->attach($categoryIds);

// Handle product variations


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
     $product = Products::with('variations.options')->findOrFail($request);
     $category=Categories::all();
     $attribute=Attribute::where('product_id', $product->id)->get();
//     $variation=Variation::where('attribute_id', $product->id)->get();
     $attributes=Attribute::all();
//     $size=Sizes::where('product_id', $product->id)->get();
//     $layer=Layers::where('product_id', $product->id)->get();
     $items=Items::where('products_id', $product->id)->get();

     return view('admin.duplicateproduct', compact('product',
         'category', 'attribute', 'attributes', 'items'));
 }

 function editproduct($request)
 {
     $product = Products::with('variations.options')->findOrFail($request);
     $category=Categories::all();
     $attribute=Attribute::where('product_id', $product->id)->get();
//     $variation=Variation::where('attribute_id', $product->id)->get();
     $attributes=Attribute::all();
//     $size=Sizes::where('product_id', $product->id)->get();
     $items=Items::where('products_id', $product->id)->get();
//     $layer=Layers::where('product_id', $product->id)->get();
     return view('admin.editproduct', compact('product',
         'category', 'attribute', 'attributes', 'items'));
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
//     $product->category = $validatedData['categories'];
     $product->topper = $request['topper'];
     $product->card = $request['card'];
     $product->text = $request['text'];
     $product->color = $request['color'];


     $product->save();
     $categoryIds = $request->input('categories', []);
     $product->categories()->sync($categoryIds);

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

     if ($request->has('variation')) {
         foreach ($request->input('variation') as $variationData) {
             $variation = $product->variations()->find($variationData['id']);
             if ($variation) {
                 $variation->update(['price' => $variationData['price']]);

                 // Optionally, update options if needed
                 // $variation->options()->delete(); // Uncomment if you want to clear old options before updating
                 foreach ($variation->options as $option) {
                     $variation->options()->updateOrCreate(
                         ['name' => $option->name],
                         ['value' => $variationData[$option->name] ?? $option->value]
                     );
                 }
             }
         }
     }

     // Handle new variations
     if ($request->has('variation_attributes')) {
         foreach ($request->input('variation_attributes') as $variationData) {
             $variation = $product->variations()->create([
                 'price' => $variationData['price'],
             ]);

             foreach ($variationData as $key => $value) {
                 if ($key !== 'price') {
                     $variation->options()->create([
                         'name' => $key,
                         'value' => $value,
                     ]);
                 }
             }
         }
     }
     if ($request->has('items') && $request->input('items') != null) {
         $existingItems = Items::where('products_id', $request->id)->get();
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
                         'products_id' => $request->id,
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
     $product = Products::create([
         'name' => $request->input('tittle'),
         'description' => $request->input('content')?? null,
         'price' => $request->input('price') ?? 0,
         'cprice' => $request->input('cprice') ?? 0,
         'ramount' => $request->input('ramount') ?? null,
         'tamount' => $request->input('tamount') ?? null,
         'quantity' => 1,
         'addition' => $request->input('addition') ?? null,
         'image' => $cover,
         'status' => 1,
         'fee' => $request->input('fee') ?? 0,
         'topper'=>$request->input('topper') ?? 1,
         'card'=>$request->input('card') ?? 1,
         'text'=>$request->input('text') ?? 1,
         'color'=>$request->input('color') ?? 1,
     ]);

     $categoryIds = $request->input('categories', []); // Ensure it's an array
     $product->categories()->attach($categoryIds);

// Handle product variations
     if ($request->has('attribute') && !empty($request->input('attribute'))) {
         foreach ($request->attribute as $attr) {
             if (isset($attr['name']) && isset($attr['value'])) {
                 Attribute::create([
                     'product_id' => $product->id,
                     'name' => $attr['name'],
                     'value' => $attr['value'],
                 ]);
             }
         }
     }

     if ($request->has('variation_attributes') && !empty($request->input('variation_attributes'))) {
         // Clear existing variations if needed
         // $product->variations()->delete(); // Uncomment if you want to clear old variations

         foreach ($request->input('variation_attributes') as $variationIndex => $variationData) {
             // Create or update the variation
             $variation = $product->variations()->updateOrCreate(
                 ['id' => $variationData['id'] ?? null], // Use ID if updating, otherwise create new
                 ['price' => $variationData['price']]
             );

             // Clear existing options if needed
             // $variation->options()->delete(); // Uncomment if you want to clear old options

             foreach ($variationData['options'] as $optionIndex => $optionData) {
                 // Create or update the option
                 $variation->options()->updateOrCreate(
                     [
                         'name' => $optionData['name'],
                         'value' => $optionData['value'],
                     ],
                     [
                         'variation_id' => $variation->id,
                     ]
                 );
             }
         }
     }
     // Handle additional items
     if ($request->has('items') && !empty($request->input('items'))) {
         foreach ($request->input('items') as $item) {
             if (!empty($item['Sizes'])) {
                 Items::create([
                     'products_id' => $product->id,
                     'Product' => $item['Sizes'],
                     'price' => $item['price'] ?? 0,
                 ]);
             }
         }
     }


// Redirect with success message
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
        $product = Products::with('variations.options', 'categories', 'items')->findOrFail($id);

        // Optionally delete related data if not using cascading deletes
        // Delete variations and their options
        foreach ($product->variations as $variation) {
            $variation->options()->delete();
        }
        $product->variations()->delete();

        // Detach categories if using many-to-many relationship
        $product->categories()->detach();

        // Delete related items
        $product->items()->delete();

        // Finally delete the product
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

