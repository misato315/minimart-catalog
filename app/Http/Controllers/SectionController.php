<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Section;


class SectionController extends Controller
{
    private $section;

    public function __construct(Section $section_model){
        $this->section = $section_model;
    }

    public function count()
    {
        $all_sections = $this->section->get();
        $num_section = count($all_sections);

        return view('layouts.home', compact( 'num_section'));
    }

    public function index(){
        $all_sections = $this->section->get();
        return view('sections.index')->with('all_sections',$all_sections);
    }


    // public function index(){
    //     $all_sections = $this->section->get();
    //     return view('products.index')->with('all_sections',$all_sections);
    // }
    

    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:50'
        ]);
        $this->section->name = $request->name;
        $this->section->save();

        return redirect()->route('section.index');
    }

    public function destroy($id){
        $this->section->destroy($id);
        return redirect()->back();
    }
}
