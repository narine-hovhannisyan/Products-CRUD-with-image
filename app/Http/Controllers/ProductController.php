<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
///
//* Display a listing of the resource.
//*
//* @return \Illuminate\Http\Response
//*/
    public function index()
    {
        $products = Product::latest()->get();
        return view('product.index', compact('products'));
    }

///
//* Show the form for creating a new resource.
//*
//* @return \Illuminate\Http\Response
//*/
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',

        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {


            $fileName = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('images', $fileName, 'public');
//            $destinationPath = 'images/';
//            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
//         $file = $image->move($destinationPath, $profileImage);
             $input['image'] =$path;
        }

        Product::create($input);

        return redirect()->route('products.index')
            ->with('success','Product created successfully.');
    }
///
//* Display the specified resource.
//*
//* @param int $id
//* @return \Illuminate\Http\Response
//*/
    public function show(Product $product)
    {
        return view('product.show', compact('product'))
            ->with('success', 'Product created successfully.');
    }
//
///
//* Show the form for editing the specified resource.
//*
//* @param int $id
//* @return \Illuminate\Http\Response
//*/
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

///
//* Update the specified resource in storage.
//*
//* @param \Illuminate\Http\Request $request
//* @param int $id
//* @return \Illuminate\Http\Response
//*/
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',

        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        $product->update($input);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');

    }

///
//* Remove the specified resource from storage.
//*
//* @param int $id
//* @return \Illuminate\Http\Response
//*/
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
