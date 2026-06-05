<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();
        if (!empty($request->keyword)) {
            $products->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->sort === 'high') {
        $products->orderBy('price', 'desc');
        }

        if ($request->sort === 'low') {
        $products->orderBy('price', 'asc');
        }

        $products = $products->paginate(6)->withQueryString();

        return view('index', compact('products'));
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        return view('show',compact('product'));
    }

    public function create()
    {
        return view('register');
    }

    public function store(ProductRequest $request)
    {
        $imageName = $request->file('image')->hashName();
        $request->file('image')->storeAs(
            'public/fruits-img',
            $imageName
        );
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        $product->seasons()->attach($request->seasons);

        return redirect('/products');
    }

    public function update(ProductRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        $product->seasons()->sync($request->seasons);

        return redirect('/products');
    }

    public function destroy($productId)
    {
        Product::findOrFail($productId)->delete();

        return redirect('/products');
    }
}


