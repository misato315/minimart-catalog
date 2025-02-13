@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">{{__('Register')}}</div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{__('Name')}}</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{__('Email Address')}}</label>
                            <div class="col-md-6">
                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required autocomplete="email">
                            
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{__('Password')}}</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{__('Confirm Password')}}</label>
                            <div class="col-md-6">
                                <input type="password" id="password-confirm" class="form-control" name="password-confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                           <button type="submit" class="btn btn-primary">{{__('Register')}}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection