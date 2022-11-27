@extends('product.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2>Order Product</h2>
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
    <form action="{{ route('orders.store', ['product_id'=>$product_id]) }}" method="POST">
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
{{--            <div class="col-xs-12 col-sm-12 col-md-12" style="width: 250px;margin: 7px;border: 4px; padding: 10px;">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Product_id:</strong>--}}
{{--                    <input type="number" name="product_id" value="{{$product_id}}" style="height:50px;width:230px"--}}
{{--                           class="form-control" placeholder="product_id">--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.index') }}"> Back</a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </form>
@endsection
