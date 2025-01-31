<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\SectionController;
use App\HTTP\Controllers\ProductController;
use App\HTTP\Controllers\HomeController;


Auth::routes();
//Laravelの標準的な認証（ログイン、登録、パスワードリセット）ルートを自動的に生成(views/auth/password内のファイル)
//これにより、ユーザーはログイン、登録、パスワードリセットなどのページにアクセスできるようになる。

#認証されたユーザーのみがアクセスできるルートをまとめたグループ
Route::group(['middleware'=>'auth'],function(){
    //ミドルウェアは、リクエストがコントローラに到着する前、またはレスポンスがクライアントに返される前に実行されるコードのこと
   //'auth'というミドルウェアは、認証が必要であることを示す
   //ユーザーがログインしていない場合、自動的にログインページにリダイレクトする仕組み

   #HOME
   Route::get('/',[HomeController::class,'index'])->name('index');

   #PRODUCT
   Route::group(['prefix'=>'product','as'=>'product.'],function(){
    //prefix =>'product': このグループ内のすべてのURLは/productで始まる
    //as => 'product.': ルートに名前を付ける際にproduct.createのような名前空間を自動で追加。この名前空間は、route('product.create')
      Route::get('/show/',[ProductController::class,'index'])->name('index');
      Route::get('/', [ProductController::class, 'count']);  // 商品数を表示
      Route::get('/create/',[ProductController::class,'create'])->name('create');
      Route::post('/store',[ProductController::class,'store'])->name('store');
      Route::get('/{id}/edit',[ProductController::class,'edit'])->name('edit');
      Route::patch('/{id}/update',[ProductController::class,'update'])->name('update');
      Route::delete('/{id}/destroy',[ProductController::class,'destroy'])->name('destroy');
      Route::get('/{id}/show',[ProductController::class,'show'])->name('show');

   });

   #SECTION
   Route::group(['prefix'=>'section','as'=>'section.'],function(){
        Route::get('/show/',[SectionController::class,'index'])->name('index');
        Route::get('/create/',[SectionController::class,'create'])->name('create');
        Route::post('/store',[SectionController::class,'store'])->name('store');
        Route::delete('/{id}/destroy',[SectionController::class,'destroy'])->name('destroy');
        Route::get('/section', [SectionController::class, 'count']);  // セクション数を表示
   });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
