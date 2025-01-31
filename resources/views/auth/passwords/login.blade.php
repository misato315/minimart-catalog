@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Login')}}</div>
                    <div class="card-body">
                        <form action="{{route('login')}}" method="post">
                            @csrf
                        
                            <div class="row mb-3">
                                <label for="email" name="email" id="email" class="col-md-4 col-form-label text-md-end">{{__('Email Address')}}</label>
                                <div class="col-md-6">
                                    <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" required autofocus autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" name="password" id="password" class="col-md-4 col-form-label text-md-end">{{__('Password')}}</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autofocus>

                                    @error('password')
                                    <span class="invalid-feedback role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{__('Login')}}</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection