<?php
$i = 0;
?>
@extends('product.layout')

@section('content')

    <div class="d-flex justify-content-center">
        <h2>Product CRUD</h2>
    </div>
    <div class="d-grid gap-3 d-md-block">
        <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
        <a class="btn btn-success" href="{{ route('orders.index') }}"> View order</a>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>

                <td>{{ $product-> title }}</td>
                <td>{{ $product-> description }}</td>
                <td><img src="/storage/{{ $product->image }}" width="100px"></td>
                <td>{{ $product-> price }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                        <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}">Show</a>

                        <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}">Edit</a>

                        <a class="btn btn-success btn-sm"
                           href="{{ route('products.order',['product_id'=>$product->id]) }}">Order</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{--    {!! $products->links() !!}--}}

@endsection
