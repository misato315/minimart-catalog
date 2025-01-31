<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private $user;
    const LOCAL_STORAGE_FOLDER = 'avatars/';

    public function __construct(User $user_model){
        $this->user = $user_model;
    }

    public function show(){
        $user = $this->user->findOrFail(Auth::user()->id);
        return view('users.show')->with('user',$user);
    }
}
