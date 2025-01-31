<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Models\Section;


class ProductController extends Controller
{
    private $product;
    const LOCAL_STRAGE_FOLDER = 'image/';

    public function __construct(Product $product_model){
        $this->product = $product_model;
    }

    public function count()
    {
        $all_products = $this->product->get();
        $num_product =$this->$all_products->count();

        return view('layouts.home')->with('num_product',$num_product);
    }

    public function index(){
        $all_products = $this->product->get();
        return view('products.index')->with('all_products',$all_products);
    }
    public function show($id){
        $product = $this->product->findOrFail($id);
        return view('products.show')->with('product',$product);
    }
    
    public function create(){
        $all_sections = Section::all();
        return view('products.create')->with('all_sections',$all_sections);
    }

    public function store(Request $request){
        #1.Validate the request
        $request->validate([
            'name'=>'required|max:50',
            'description'=>'required|max:1000',
            'price'=>'required|numeric|min:0',
            'image'=>'required|max:1048',
            'section_id' => 'required|exists:sections,id'
        ]);
        #2.Save the form data to products table
        $this->product->name= $request->name;
        $this->product->description= $request->description;
        $this->product->price=$request->price;
        $this->product->image= $this->saveImage($request->image);
        $this->product->section_id = $request->section_id;

        $this->product->save();

        return redirect()->route('product.index');
    }

    public function saveImage($image){
        //Change the name of the image to CURRENT TIME to avoid overwriting.
        $image_name = time().".".$image->extension();//sample of extension: jpeg,jpg,png,and gif

        //Save the image to strage/app/public/images/
        $image->storeAs(self::LOCAL_STRAGE_FOLDER,$image_name);

        return $image_name;
    }

    public function destroy($id){
            $product = $this->product->findOrFail($id);
            $this->deleteImage($product->image);
            $product->delete();
    
            return redirect()->back();
    }

    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required|max:50',
            'description'=>'required|max:1000',
            'price'=>'required|numeric|min:0',
            'image'=>'max:1048|mimes:jpeg,jpg,png,gif',
            // 'section_id' => 'required|exists:sections,id'
        ]);
        $product = $this->product->findOrFail($id);
        $product->name = $request->name;
        $product->price= $request->price;
        $product->description = $request->description;
        $product->section_id = $request->section_id;

        #If there is new image...
        if($request->image){
            #delete the previous image from the local storage
            $this->deleteImage($product->iamge);
            //Sample: $this->deleteImage('1834355234.jpg');

            #Save the new image
            $product->image = $this->saveImage($request->image);
            //Sample: $product->image = '3437567582.jpg'; new image
        }
        $product->save();
        return redirect()->route('product.show',$id);
    }

    private function deleteImage($image){
        $image_path = self::LOCAL_STRAGE_FOLDER.$image;
        //Sample: $image_path = 'iamges/1232432.jpg';

        if(Storage::disk('public')->exists($image_path)){
            Storage::disk('public')->delete($image_path);
        }
    }

    public function edit($id){
        $product = $this->product->findOrFail($id);

        return view('products.edit')->with('product',$product);

    }

}
