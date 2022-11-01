@extends('product.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
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

    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row" style="width:500px;background: #c5d78f;">
            <div class="col-xs-12 col-sm-12 col-md-12"  style="width: 250px;margin: 7px;border: 4px; padding: 10px;">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $product->title }}"  style="height:50px;width:230px"class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="width: 150px;margin: 7px;border: 4px; padding: 10px;">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" class="form-control" style="height:50px;width:100px" name="price"  value="{{ $product->price }}" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="width: 400px;margin: 7px;border: 4px; padding: 10px;">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:100px;width: auto" name="description" placeholder="Description">{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" style="height:35px;width:230px" placeholder="image">
                    <img src="/images/{{ $product->image }}" width="300px">
                </div>
            </div>
            <div class="pull-right" >
                <a class="btn btn-primary" href="{{ route('products.index') }}" style="width: 100px;top: 130px;background: #3e681ef0;"> Back</a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="width: 100px;">
                <button type="submit" class="btn btn-primary" style="background: #3e681ef0;">Edit</button>
            </div>
        </div>

    </form>
@endsection
