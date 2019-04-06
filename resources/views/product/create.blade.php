<!-- create.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Product
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
      <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Product Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="code">Product Code :</label>
              <input type="text" class="form-control" name="code"/>
          </div>
          <div class="form-group">
              <label for="price">Product Price :</label>
              <input type="text" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="description">Product Discription :</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="image">Product Image :</label>
              <input type="file" class="form-control" name="image"/>
              
          </div>          
          <button type="submit" class="btn btn-primary">Create Product</button>
      </form>
  </div>
</div>
@endsection