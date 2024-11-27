<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Process;

class ProductController extends Controller
{
    public function welcome() {
        return view('welcome');
    }

    public function index() {
        $products = Product::with('category')->get();

        return view('pages.products.index', [
            "products" => $products,
        ]);
    }

    public function delete($id) {
        $products = Product::where('id' , $id);
        $products->delete();

        return redirect('/products');
    }

    public function create() {
        $categories = Category::all();

        return view('pages.products.create', [
            "categories" => $categories
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable',
            'price' => 'required',
            'stok' => 'required',
            'sku' => 'required',
            'category_id' => 'required',
        ]);

        Product::create($validated);

        return redirect('/products');
    }

    public function edit($id) {
        $products = Product::findOrFail($id);
        $categories = Category::all();

        return view('pages.products.edit', [
            "categories" => $categories,
            "products" => $products
        ]);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable',
            'price' => 'required',
            'stok' => 'required',
            'sku' => 'required',
            'category_id' => 'required',
        ]);

        Product::where('id', $id)->update($validated);

        return redirect('/products');
    }
}
