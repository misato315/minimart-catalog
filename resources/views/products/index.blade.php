@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="container">
    <div class="row justify-content-center gx-2">
        <div class="text-center mb-3">
            <h1>{{__('Products')}} <a href="{{route('product.create')}}"><i class="fa-solid fa-plus"></i></a></h1>
        </div>
    </div>
    
    @if($all_products->isnotEmpty())
    <table class="table table-hover align-middle border" style="table-layout: fixed;">
        <thead class="small table-primary">
            <tr>
                <th>ID</th>
                <th>IMAGE</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>SECTION</th>
                <th style="width: 90px"></th>
            </tr>
        </thead>
    
        <tbody>
            @forelse ($all_products as $product)
            <tr style="height: 90px; cursor: pointer;" onclick="{{route('product.show',$product->id)}}">
                <a href="{{route('product.show',$product->id)}}">
                <td>{{$product->id}}</td>
                <td><img src="{{ asset('storage/image/'.$product->image)}}" alt="{{ $product->image }}" class="w-100 shadow rounded"></td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->section ? $product->section->name : 'No section'}}</td>
                <td>
                    <div>
                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $product->id }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </td>
                </a>
            </tr>     
            @empty         
            @endforelse   
        </tbody>
        
    </table>
    @else
    <div class="text-center" style="margin-top:100px;">
        <h2><i class="fa-regular fa-circle-xmark"></i>No product yet.</h2>
    </div>
    @endif

    <!-- 削除確認用モーダル -->
    @foreach ($all_products as $product)
<div class="modal fade" id="deleteModal-{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-danger">
                <h4 class="modal-title" id="deleteModalLabel">
                    <i class="fa-solid fa-circle-exclamation"></i> Delete Product
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this product?</p>
                <div class="row">
                    <img src="{{ asset('storage/image/'.$product->image)}}" alt="{{ $product->image }}" class="w-50 rounded">
                    <h5>{{$product->description}}</h5>
                </div>
            </div>
            <div class="text-end text-danger mb-3 me-3">
                <button type="button" class="btn btn-outline-denger text-denger" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="{{route('product.destroy',$product->id)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>    
@endsection
