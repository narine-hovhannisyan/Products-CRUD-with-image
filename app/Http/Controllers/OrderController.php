<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::select('orders.*' , 'products.title as product_title','products.image as product_image')
            ->join("products","products.id", "=" ,"orders.product_id")
            ->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd('hi');
//        $order  = Product::select('products.*', 'products.id as product_id')
//            ->join("orders","orders.product_id", "=" ,"products.id")
//           ->get();

//        $order = DB::table('products')->get();
        $order = Product::all();


        return view('orders.create',compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'qty' => 'required|numeric|min:1',
            'order_date_time' => 'required',
//            'product_id' => 'required|numeric',
        ]);

        Orders::create($validatedData);

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Orders $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $order)
    {
        return view('orders.show', compact('order'))
            ->with('success', 'Order created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Orders $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Orders $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $order)
    {
        $request->validate([
            'qty' => 'required|numeric|min:1',
            'order_date_time' => 'required',
//            'product_id' => 'required|numeric',
        ]);

        $input = $request->all();
        $order->update($input);

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Orders $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
