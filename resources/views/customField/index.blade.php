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
  <a href="{{ route('custom_fields.create')}}" class="btn btn-info">Create CustomField</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Product` Name</td>
          <td>CusotmField Name</td>
          <td>CustomField Description</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($custom_fields as $custom_field)
        <tr>
            <td>{{$custom_field->id}}</td>
            <td>{{$custom_field->product->name}}</td>
            <td>{{$custom_field->name}}</td>
            <td>{{$custom_field->description}}</td>
            <td><a href="{{ route('custom_fields.edit',$custom_field->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('custom_fields.destroy', $custom_field->id)}}" method="post">
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