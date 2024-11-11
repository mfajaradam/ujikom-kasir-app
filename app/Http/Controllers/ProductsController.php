<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Products',
            'products' => Product::all(),
            'method' => 'POST',
            'route' => route('products.store'),
        ];
        return view('products.index', $data);
    }

    // Add Data
    public function store(Request $request)
    {
        $request->validate([
            'product_ID' => 'required|min:4',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|min:3',
            'category' => 'required',
            'price' => 'required',
            'stock' => 'required|numeric',
        ]);

        $imageName = null;
        if ($request->hasFile('photo')) {
            $imageName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('images', $imageName, 'public');
        }

        Product::create([
            'ProductID' => $request->product_ID,
            'image' => $imageName,
            'name_product' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        notify()->success('Successfully added data');
        return redirect()->route('products.index')->with(['success']);
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        return response()->json([
            'status' => 200,
            'product' => $product
        ]);
    }

    public function update(Request $request)
{
    $request->validate([
        'ProductID' => 'required|min:4',
        'name' => 'required|min:3',
        'category' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi gambar
    ]);
    
    $product = Product::findOrFail($request->get('id'));
    $product->ProductID = $request->ProductID;
    $product->category = $request->category;
    $product->name_product = $request->name;
    $product->price = $request->price;
    $product->stock = $request->stock;

    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image) {
            Storage::disk('public')->delete('images/' . $product->image);
        }

        // Simpan gambar baru
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('images', $imageName, 'public');
        $product->image = $imageName;
    }

    $product->updated_at = now();
    $product->save();

    notify()->success('Successfully updated data');
    return redirect()->route('products.index')->with('success', 'Data has been updated');
}

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        notify()->success('Successfully deleted data');
        return redirect()->route('products.index')->with(['success']);
    }
}
