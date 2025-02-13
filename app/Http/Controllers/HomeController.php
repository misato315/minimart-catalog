<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Section;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('layouts.home');
    // }
    public function index()
    {
      
        $productCount = Product::count();
        $sectionCount = Section::count();

        return view('layouts.home', compact('productCount', 'sectionCount'));
    }

}
