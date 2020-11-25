<?php

namespace App\Http\Controllers;
use App\User;
use App\Address;
use App\Ward;
use App\Permission;
use App\District;
use App\Province;
use Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getLogin()
    {
        if (Auth::user() != null) {
            if (Auth::user()->permission->permission == 'customer') {
                return back();
            }else {
                Auth::logout();
                return view('customer.login');
            }
        }else{
            return view('customer.login');

        }
       
    }
    public function postLogin(Request $request)
    {
        $input = $request->all();
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'login_name';
        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'],  'permission_id' => 3 )))
        {
            return redirect('/');
        }else{
            return back()->with('error','không thể đăng nhập');
        }
        // echo $request->email;

    }
    public function getRegister()
    {
        return view('customer.register');
    }
    public function postRegister(Request $request){
        // dd($request);
         // $this->validate($request, [
        //     // Validate the max number of characters to avoid database truncation
        //     'email'=>['required', 'email'],
        //     'password'=>'required|min:3|max:20',
        //     're_password'=>'required|same:password',
        //     // The user should select at least one category
        // ],[
        //     'email.required'=>'Bạn chưa nhập email',
        //     'email.email'=>'không đúng định dạng email',
            // 'password.required'=>'Bạn chưa password',
            // 'password.min'=>'password phải có độ dài từ 3 đến 10 kí tự',
            // 'password.max'=>'password phải có độ dài từ 3 đến 10 kí tự',
            // 're_password.required'=>'Bạn chưa nhập lại password',
            // 're_password.same'=>'mật khẩu không khớp',
                
            
        // ]
        // );

        $user = new User();
        // $address = new Address();
        // $permission = new Permission();
        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        // $user->phone = $request->phone;
        $user->login_name = $request->login_name;
        $user->password=bcrypt($request->password);
        // $user->img = $request->img;
        $user->email = $request->email;
        $user->permission_id = 3;
        $user->save(); 
        // $address->ward_id = $request->ward_id;
        // $address->user_id = $user->id;
        // $address->address_detail = $request->address;
        
        // $address->save();  
         
            
        return redirect()->route('login.form')->with('message', 'đăng ký thành công!');
    }
}
