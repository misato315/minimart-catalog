@extends('layouts.app')

@section('title', 'Product')

@section('content')
<div class="mt-2 border border-2 rouded p-4 shadow-sm">
  <h2>{{$product->name}}</h2>

  <div class="row">
    <div class="col-4">
      <img src="{{asset('storage/image/'.$product->image)}}" alt="{{$product->image}}" class="w-100 shadow rounded">
    </div>
    <div class="col-8">
      <div class="row">
        <table>
          <tr>
            <td>Description:</td>
            <th>{{$product->description}}</th>
          </tr>
          <tr>
            <td>Price:</td>
            <th>{{$product->price}}</th>
          </tr>
        </table>
      </div>
      <div class="text-center mt-4 text-end">
        <a href="{{route('product.edit',$product->id)}}" class="btn btn-success btn-sm">
          <i class="fa-solid fa-pen"></i>
        </a>
        <form action="{{route('product.destroy',$product->id)}}" method="post" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">
              <i class="fa-solid fa-trash-can"></i>
          </button>
      </div>
    </div>
  </div>

  
</div>
    
@endsection