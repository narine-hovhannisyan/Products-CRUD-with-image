@extends('orders.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Order</h2>
            </div>

        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity:</strong>
                    <input type="number" name="qty" class="form-control" placeholder="Quantity">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order_date_time:</strong>
                    <input type="datetime-local" name="order_date_time" class="form-control"
                           placeholder="Order_date_time">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product_id:</strong>
                    <select name="product_id" class="form-select" aria-label="Default select example">
                        <option selected>select product</option>
                        @foreach ($order as $orders )
                            <option value="{{ $orders->id }}">{{ $orders->title }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            {{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
            {{--                <div class="form-group">--}}
            {{--                    <strong>Order:</strong>--}}
            {{--                    <input type="datetime-local" name="id" value="{{ $product_id }}" class="form-control" placeholder="Order_date_time">--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('orders.index') }}"> Back</a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </form>
@endsection
