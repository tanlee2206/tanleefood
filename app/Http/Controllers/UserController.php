<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Shop;
use App\Category;
use App\Address;
use App\Ward;
use App\Permission;
use App\District;
use App\Province;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    
        $user = User::all();
        // dd($user);
        return view('admin.pages.user.list',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province= Province::all();
        $permission= Permission::all();
        

        return view('admin.pages.user.add',compact('province','permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
   
        $user = new User();
        $address = new Address();
        // $permission = new Permission();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->login_name = $request->login_name;
        $user->password=bcrypt($request->password);
        $user->img = $request->img;
        $user->email = $request->email;
        $user->permission_id = $request->permission_id;
        $user->save(); 
        $address->ward_id = $request->ward_id;
        $address->user_id = $user->id;
        $address->address_detail = $request->address;
        
        $address->save();  
         
            
        return redirect()->route('user.index')->with('message', 'thêm mới thành công!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $province= Province::all();
        $permission= Permission::all();
        $user = User::where('users.id', $id)->first();
        // dd($user);
        
        // dd($user->address->ward->district);

        return view('admin.pages.user.edit',compact('province','user','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  dd($request);
        $user = User::find($id);
        $address = Address::find($user->address->id);
        // dd($address);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->login_name = $request->login_name;
        // $user->password=bcrypt($request->password);
        $user->img = $request->img;
        $user->email = $request->email;
        $user->permission_id = $request->permission_id;
        $user->save(); 
        $address->ward_id = $request->ward_id;
        $address->user_id = $user->id;
        $address->address_detail = $request->address;
        
        $address->save();  
        return redirect()->route('user.index')->with('message', 'chỉnh sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request);
        User::find($request->id)->delete();
        $user = User::all();
        // dd($user);
        return view('admin.pages.user.list_ajax',compact('user'));
        // return response()->json();
    }
    public function getDistricts(Request $request){
        $districts = District::where('province_id',$request->province_id)->pluck('name','id');
        return response()->json($districts);

    }
    public function getWards(Request $request){
        $wards = Ward::where('district_id',$request->districts_id)->pluck('name','id');
        return response()->json($wards);
    }
    public function detailuser(Request $request, $id){
        if ($request->ajax()) {
            $user_detail = User::where('id',$id)->first();
            $html = view('admin.pages.user.user_detail', compact('user_detail'))->render();
            return \response()->json($html);
        }
    }
}
