@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col"><h1 class="text-center">{{__('Edit Product')}}</h1></div>
    </div>

    <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label text-secondary">{{__('Name')}}</label>
            <input type="text" name="name" id="name" placeholder="Enter name here" class="form-control" value="{{old('name',$product->name)}}" autofocus>
            @error('name')
                <div class="text-danger small">{{ $message }}</div> 
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label text-secondary">{{__('Description')}}</label>
            <textarea type="text" name="description" id="description" row="5" class="form-control" value="">{{old('description',$product->description)}}</textarea>
            @error('description')
            <div class="text-danger small">{{ $message }}</div>                
            @enderror
        </div>

        <div class="mb-3">
            <label for="section_id" class="form-label text-secondary">{{__('Section')}}</label>
            <select name="section_id" id="section_id" class="form-control" value="{{old('section_id',$product->section_id)}}">
                <option value="{{$product->section_id}}" hidden>{{$product->section_id ? $product->section->name : 'No section'}}</option>
                    @foreach ($all_sections as $section)
                    <option value="{{ $section->id }}"{{ old('section_id') == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                    @endforeach
            </select>
            @error('section')
            <div class="text-danger small">{{ $message }}</div>                
            @enderror
            <div class="mb-3">
                <label for="price" class="form-label text-secondary">{{__('Price')}}</label>
                <input type="number" name="price" id="price" class="form-control" value="{{old('price',$product->price)}}">
                @error('price')
                <div class="text-danger small">{{ $message }}</div>                
                @enderror
            </div>
            
            <div class="row">
                <div class="col-6">
                    <label for="image" class="form-label text-secondary">Image</label>
                    <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
                    <div class="format-text" id="image-info">
                        Acceptable formats are jpeg, jpg, png, gif only. <br>
                        Maximum file size is 1048kb.
                    </div>
                    @error('image')
                    <div class="text-danger small">{{ $message }}</div>                
                    @enderror
                </div>
            </div>
            <a href="{{route('product.index')}}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-secondary px-5">Save Changes</button>
        </div>
    </form>

    


</div>
    
@endsection