<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

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
}
