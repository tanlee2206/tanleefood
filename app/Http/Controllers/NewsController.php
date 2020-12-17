<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        
    
        $news = News::all();
        return view('admin.pages.news.list',compact('news'));
    }
    public function create()
    {
        return view('admin.pages.news.add');
    }
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     // Validate the max number of characters to avoid database truncation
        //     'first_name' => ['required', 'string', 'max:100','min:1'],
        //     'last_name' => ['required', 'string', 'max:100','min:1'],
        //     'img' => ['required'],
        //     'address'=>['required', 'string'],
        //     'email'=>['required', 'email'],
        //     'ward_id'=>['required'],
        //     'password'=>'required|min:3|max:20',
        //     're_password'=>'required|same:password',
        //     // The user should select at least one category
        // ],[
        //     'first_name.required'=>'Bạn chưa nhập tên ',
        //     'first_name.min'=>'Tên phải có độ dài từ 1 đến 100 ký tự',
        //     'first_name.max'=>'Tên phải có độ dài từ 1 đến 100 ký tự',
        //     'last_name.required'=>'Bạn chưa nhập họ ',
        //     'last_name.min'=>'họ phải có độ dài từ 1 đến 100 ký tự',
        //     'last_name.max'=>'họ phải có độ dài từ 1 đến 100 ký tự',
        //     'img.required'=>'Bạn chọn hình ảnh',
        //     'address.required'=>'Bạn chưa nhập địa chỉ chi tiết',
        //     'ward_id.required'=>'Bạn chưa chọn phường xã',
        //     'email.required'=>'Bạn chưa nhập email',
        //     'email.email'=>'không đúng định dạng email',
            // 'password.required'=>'Bạn chưa password',
            // 'password.min'=>'password phải có độ dài từ 3 đến 10 kí tự',
            // 'password.max'=>'password phải có độ dài từ 3 đến 10 kí tự',
            // 're_password.required'=>'Bạn chưa nhập lại password',
            // 're_password.same'=>'mật khẩu không khớp',
                
            
        // ]
        // );
        // dd($request);
   
        $news = new News();
     
        $news->title = $request->title;
        $news->img = $request->img;
        $news->content = $request->content;
        $news->slug = $request->slug;
        
        
        $news->save();  
         
            
        return redirect()->route('news.index')->with('message', 'thêm mới thành công!');

    }


}
