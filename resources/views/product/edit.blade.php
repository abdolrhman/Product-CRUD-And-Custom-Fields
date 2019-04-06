<!-- edit.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Product
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Product Name:</label>
              <input type="text" class="form-control" name="name" value="{{$product->name}}"/>
          </div>
          <div class="form-group">
              <label for="code">Product Code :</label>
              <input type="text" class="form-control" name="code" value="{{$product->code}}"/>
          </div>
          <div class="form-group">
              <label for="price">Product Price :</label>
              <input type="text" class="form-control" name="price" value="{{$product->price}}"/>
          </div>
          <div class="form-group">
              <label for="description">Product description :</label>
              <input type="text" class="form-control" name="description" value="{{$product->description}}"/>
          </div>    
          <div class="form-group">
              <label for="image">Product Image :</label>
              <input type="file" class="form-control" name="image" value="{{ $product->image }}" />
          </div>        
          <button type="submit" class="btn btn-primary">Update Product</button>
      </form>
  </div>
</div>
@endsection