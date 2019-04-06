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
    Edit CustomField
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
      <form method="post" action="{{ route('custom_fields.update', $custom_field->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('PATCH')
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
              <label for="name">name :</label>
              <input type="text" class="form-control" name="name" value="{{$custom_field->name}}"/>
          </div>
          <div class="form-group">
              <label for="description">description :</label>
              <input type="text" class="form-control" name="description" value="{{$custom_field->description}}"/>
          </div>
  
      
          <button type="submit" class="btn btn-primary">Update Product</button>
      </form>
  </div>
</div>
@endsection