@extends('layouts.app')

@section('title', 'Home')

@section('content')
    
<div class="text-center" style="margin-top:50px;">
    <h1>Welcome to Minimart Catalog</h1>
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="mat-2 border border-2 rounded p-4" style="height: 100px;">
                <a href="{{route('product.index')}}" class="h3 text-primary text-decoration-none">Products {{$productCount}}</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mat-2 border border-2 rounded p-4" style="height: 100px;">
                <a href="{{route('section.index')}}" class="h3 text-primary text-decoration-none">Sections {{$sectionCount}}</a>
            </div>
        </div>
    </div>
    
</div>
@endsection