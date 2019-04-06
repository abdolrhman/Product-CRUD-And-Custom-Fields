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
    Add Product Custom Field
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
      <form method="post" action="{{ route('custom_fields.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="product_id">Product Name:</label>
              <select class="form-group" name="product_id">
                @foreach ($products as $product)
                  <option id="product_id" value="{{ $product->id }}">
                    {{ $product->name }}
                  </option>
                @endforeach                
              </select>
              
          </div>
          <div class="form-group">
              <label for="name">Field Name :</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="description">Field Description :</label>
              <input type="text" class="form-control" name="description"/>
          </div>

          <button type="submit" class="btn btn-primary">Create Field</button>
      </form>
  </div>
</div>
@endsection