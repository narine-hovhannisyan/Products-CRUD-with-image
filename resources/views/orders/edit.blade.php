@extends('orders.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Order</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('orders.index') }}"> Back</a>
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
    <form action="{{ route('orders.update',$order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity:</strong>
                    <input type="number" name="qty" value="{{ $order->qty }}" class="form-control" placeholder="Quantity">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order_date_time:</strong>
                    <input type="datetime-local" name="order_date_time" value="{{ date('Y-m-d\TH:i', strtotime($order->order_date_time )) }}" class="form-control" placeholder="Order_date_time">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </form>
@endsection
