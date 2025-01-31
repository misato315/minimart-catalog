@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h1 class="text-center">{{__('Create Product')}}</h1>
        </div>
    </div>

    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label text-secondary">{{__('Name')}}</label>
            <input type="text" name="name" id="name" placeholder="Enter name here" class="form-control" value="{{old('name')}}" autofocus>
            @error('name')
                <div class="text-danger small">{{ $message }}</div> 
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label text-secondary">{{__('Description')}}</label>
            <textarea type="text" name="description" id="description" row="5" class="form-control" value="{{old('description')}}"></textarea>
            @error('description')
            <div class="text-danger small">{{ $message }}</div>                
            @enderror
        </div>

        <div class="mb-3">
            <label for="section_id" class="form-label text-secondary">{{__('Section')}}</label>
            {{-- @forelse ($all_sections as $section) --}}
                <select name="section_id" id="section_id" class="form-select" value="{{old('section_id')}}">
                    <option value="" hidden>Select Section</option>
                    @foreach ($all_sections as $section)
                    <option value="{{ $section->id }}"{{ old('section_id') == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                    @endforeach
                </select>
                <a href="{{route('section.index')}}">Add new section</a>
            {{-- @empty
                <input type="text" name="section_name" id="section_name" placeholder="Enter Section name here" class="form-control" autofocus>
            @endforelse --}}
        
            @error('section_id')
            <div class="text-danger small">{{ $message }}</div>                
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label text-secondary">{{__('Price')}}</label>
            <input type="number" name="price" id="price" class="form-control" value="{{old('price')}}" min="0" step="0.01">
            @error('price')
            <div class="text-danger small">{{ $message }}</div>                
            @enderror
        </div>

        <div class="mb-2">
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

        <button type="submit" class="btn btn-primary px-5">Create</button>
    
    </form>
</div>
    
@endsection