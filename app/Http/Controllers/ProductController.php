<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index(Request $request)
    {
        $query = $request->input('keyword');
        if ($query) {
            $products = Products::where('name', 'like', "%$query%")
                                ->orWhere('description', 'like', "%$query%")
                                ->latest()
                                ->paginate(100);
            return view('products.index', compact('products', 'query'));
        }
        $products = Products::latest()->paginate(100);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'nullable',
            'price'       => 'required|numeric',
            'image.*'    => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products', 'public');
                $image[] = $path;
            }
        }

        Products::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'image'      => json_encode($image),
            'is_valid'    => $request->is_valid ? 1 : 0,
        ]);

        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function show($id)
    {
        $product = Products::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'nullable',
            'price'       => 'required|numeric',
            'image.*'    => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = json_decode($product->images, true) ?? [];
        // $existingImages = is_array($product->image) ? $product->image : (json_decode($product->image, true) ?? []);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('products', 'public');
                $image[] = $path;
            }
        }

        $product->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'image'      => json_encode($image),
            'is_valid'    => $request->is_valid ? 1 : 0,
        ]);

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Xóa sản phẩm thành công.');
    }
}