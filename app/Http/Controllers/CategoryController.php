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
        return view('admin.pages.category.add');
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->img = $request->img;
        $category->save();
        return redirect()->route('category.index')->with('message', 'chỉnh sửa thành công!');
    }
    public function store(Request $request){
        // dd($request);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->img = $request->img;
        $category->save();
        return redirect()->route('category.index')->with('message', 'thêm mới thành công!');
        
    }
    public function edit($id){
            $category = Category::find($id);
            return view('admin.pages.category.edit', compact('category'));
    }
    public function destroy(Request $request){
        Category::find($request->id)->delete();
        $category = Category::all();
        // dd($shop);
        return view('admin.pages.category.list_ajax',compact('category'));
    }
}
