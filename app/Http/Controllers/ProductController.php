<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
//1
    public function index()
    {
        $products = Product::get();
        return view('product.index', compact('products'));
    }

    //2
    public function create()
    {
        return view('product.create');
    }

    //3
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|min:1',

        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {

            $fileName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('images', $fileName, 'public');
            $input['image'] = $path;

        }

        Product::create($input);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

//4
    public function show(Product $product)
    {
        return view('product.show', compact('product'))
            ->with('success', 'Product created successfully.');
    }

//5
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

//6
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:1',

        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('images', $fileName, 'public');
            $input['image'] = $path;
        } else {
            unset($input['image']);
        }
        $product->update($input);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');

    }

//7
    public function order()
    {
        return view('product.order');
    }

//    public function addOrder(Request $request, int $product_id)
//    {
//
//        $data = $request->validate([
//            'qty' => 'required|max:255',
//            'order_date_time' => 'required',
//        ]);
//
////        var_dump($product_id);
////        dd($data -> {$product_id});
//        $f = $data['qty'] . ' ' . $data['order_date_time'] . ' ' . $product_id;
////        dd($f);
//         (new \App\Models\Orders)->get($f);
//        return redirect()->route('orders.index')
//            ->with('success', 'Product updated successfully');
//
//    }

//8
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
