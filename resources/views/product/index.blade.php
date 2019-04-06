<!-- index.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <a href="{{ route('products.create')}}" class="btn btn-info">Create Product</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Product` Name</td>
          <td>Product Code</td>
          <td>Product Price</td>
          <td>Product Description</td>
          <td>Product Image</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->code}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td><img src="{{ url('public/'.$product->image) }}" alt="" title="" /></td>
            <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection