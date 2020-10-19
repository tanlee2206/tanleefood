<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        // dd($user);
        return view('admin.pages.category.list',compact('category'));
    }
    public function create(){
        
    }
    public function update(){
        
    }
    public function store(){
        
    }
    public function destroy(){
        
    }
}
