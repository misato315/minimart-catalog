@extends('layouts.app')

@section('title', '')

@section('content')
<main class="container">
    <div class="row justify-content-center">
        <div class="col-3">
            @if($user->avatar)
            <img src="{{asset('storage/avatars/'.$user->avatar)}}" alt="{{$user->avatar}}" class="d-block mx-auto img-thumbnail">
            @else
            <i class="fa-regular fa-user d-block text-center profile-icon"></i>
            @endif
            

            <div class="mt-2 mb-3 text-center">
                <p class="h4 mb-0"><?= $user['username'] ?></p>
                <p><?= $user['first_name'] . " " . $user['last_name'] ?></p>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="input-group mb-2">
                    <input type="file" name="photo" class="form-control">
                    <button type="submit" class="btn btn-outline-secondary" name="btn_upload_photo">Upload</button>
                </div>
            </form>
        </div>  
    </div>
</main>
    
@endsection