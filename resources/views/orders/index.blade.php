<?php
$i = 0;
?>
@extends('orders.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-center">
                <h2>Order CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('orders.create') }}"> Create New Order</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Product_Name</th>
            <th>Product_image</th>
            <th>Quantity</th>
            <th>Order_date_time</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                {{--                $order->product_image}--}}
                <td>{{ ++$i }}</td>
                <td>{{ $order->product_title}}</td>
                <td><img src="/storage/{{$order->product_image}}"width="100px" alt="image"></td>
                <td>{{ $order->qty }}</td>
                <td>{{ $order->order_date_time }}</td>
                <td>
                    <form action="{{ route('orders.destroy',$order->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('products.index') }}" style="width: 100px;top: 130px;background: #3e681ef0;"> Back</a>
    </div>
    {{--    {!! $orders->links() !!}--}}

@endsection
