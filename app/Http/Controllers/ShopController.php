<?php

namespace App\Http\Controllers;
use App\Shop;
use App\Food;
use App\Orders;
use App\Category;
use Auth;
use App\Address;
use App\Ward;
use App\District;
use App\User;
use App\Rating;
use App\Wishlist;
use App\Province;


use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getLogin()
    {
        return view('shop.login');
    }
    public function postLogin(Request $request)
    {
        $input = $request->all();
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'login_name';
        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
        {
            return redirect('/shop-manager');
        }else{
            return back()->with('message', 'email hoặc mật khẩu không đúng!');
        }
    }

    public function showlist($province)
    {
        $province_now = Province::find($province);
        $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
        // dd($province_now->address);
        // $address_id = [];
        foreach ($province_now->address as $address) {   
             $shop_id[] = $address->shop_id;

        }
    //    $shop_count = Shop::whereIn('shop.address_id',$address_count)->get();
        $shop = Shop::whereIn('shop.id',$shop_id)->where('status',1)->paginate(8);
        $category = Category::all();
        //    dd($shop);
        return view('customer.pages.shop.shop',compact('shop','category','province','province_now'));
    }
    public function showlistCategory($province,$slug)
    {
        $province_now = Province::find($province);
        $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
        foreach ($province_now->address as $address) {   
            $shop_id1[] = $address->shop_id;

       }
    //  dd($shop_id1);
        $category_now = Category::where('slug', $slug)->firstOrFail();
        $food=$category_now->food;
        // dd($food);
        $shop_id2 = [];
        foreach ($food as $item) {
            // if (!in_array($item->shop_id,$shop_id)) {
            //     $shop_id[]= $item->shop_id ; 
            // }
            $shop_id2[]= $item->shop_id ; 
            
        }
        
        // dd($shop_id2);
        $shop = Shop::whereIn('shop.id', $shop_id1)->whereIn('shop.id', $shop_id2)->where('status',1)->paginate(8);
        // dd($shop);
        // foreach ($category->food->shop as $food) {
        //    echo $food->name;
        // }
        // $shop_id = $shop->id;
        $category = Category::all();
    //     //    dd($shop);
        return view('customer.pages.shop.shop',compact('shop','category','province','province_now'));
    }
    public function showShopSingle($province,$slug)
    {
        $province_now = Province::find($province);
        
        $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
    //     foreach ($province_now->address as $address) {   
    //         $shop_id[] = $address->shop_id;

    //    }
        
        $shop = Shop::where('slug', $slug)->where('status',1)->firstOrFail();
        $shop_id = $shop->id;
        $rating = Rating::where('shop_id',$shop_id)->orderBy('id','DESC')->get();
        $foods = Food::where('shop_id',$shop_id)->get();

        

        $category_name = [];
    
        foreach ($foods as $item) {
           foreach ($item->category as $cate) {
                
                if(!in_array($cate->name, $category_name))
                {
                    $category_name[]= $cate->name;
                   
                }

           }
        }
        if (Auth::user() != null) {
            $wishlist = Wishlist::where('shop_id',$shop_id)->where('user_id',Auth::user()->id)->first();
        }else{
            $wishlist = null;
        }
        
        // dd($foods->category->id);
        // $category = Category::whereIn('id', $foods->category->id);
        // // dd($foods);
        return view('customer.pages.shop.shop_single',compact('shop','foods','province','province_now','category_name','rating','wishlist' ));
        
    }
   
    public function index(){
        $shop = Shop::where('status',1)->get();
        // dd($user);
        return view('admin.pages.shop.list',compact('shop'));
    }
    public function create(){
        // $category = Category::all();   
        $province= Province::all();
        return view('admin.pages.shop.add', compact('province'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //  dd($request);
         // $this->validate($request, [
        //     // Validate the max number of characters to avoid database truncation
        //     'name' => ['required', 'string', 'max:100','min:1'],
        //     
        //     'img' => ['required'],
        //     'address'=>['required', 'string'],
        //    
        //     'ward_id'=>['required'],
        //    
        //     // The user should select at least one category
        // ],[
        //     'name.required'=>'Bạn chưa nhập tên ',
        //     'name.min'=>'Tên phải có độ dài từ 1 đến 100 ký tự',
        //     'name.max'=>'Tên phải có độ dài từ 1 đến 100 ký tự',
        //     
        //     'img.required'=>'Bạn chọn hình ảnh',
        //     'address.required'=>'Bạn chưa nhập địa chỉ chi tiết',
        //     'ward_id.required'=>'Bạn chưa chọn phường xã',   
        // ]
        // );
        $shop = Shop::find($id);
        if ($shop->address != null) {
            $address = Address::find($shop->address->id);
        }
        else{
            $address = new Address();
        }
        $shop->slug = $request->slug;
        $shop->name = $request->name;
        $shop->status = $request->status;
        $shop->cost = $request->cost;
        $shop->open_time = $request->open_time;
        $shop->close_time = $request->close_time;
        $shop->description = $request->description;
        $shop->img = $request->img;
        $shop->save();
        

        $address->ward_id = $request->ward_id;
        $address->shop_id = $shop->id;
        $address->address_detail = $request->address;
        
        $address->save();  
        return redirect()->route('shop.index')->with('message', 'chỉnh sửa thành công!');
        
        
    }
    public function store(Request $request){
        // dd($request);
         // $this->validate($request, [
        //     // Validate the max number of characters to avoid database truncation
        //     'name' => ['required', 'string', 'max:100','min:1'],
        //     'user_name' => ['required', 'string', 'max:100','min:1'],
        //     'img' => ['required'],
        //     'address'=>['required', 'string'],
        //     'email'=>['required', 'email'],
        //     'ward_id'=>['required'],
        //     'password'=>'required|min:3|max:20',
        //     're_password'=>'required|same:password',
        //     // The user should select at least one category
        // ],[
        //     'name.required'=>'Bạn chưa nhập tên ',
        //     'name.min'=>'Tên phải có độ dài từ 1 đến 100 ký tự',
        //     'name.max'=>'Tên phải có độ dài từ 1 đến 100 ký tự',
        //     'user_name.required'=>'Bạn chưa nhập họ ',
        //     'user_name.min'=>'họ phải có độ dài từ 1 đến 100 ký tự',
        //     'user_name.max'=>'họ phải có độ dài từ 1 đến 100 ký tự',
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

        $user = new User();
        $address = new Address();
        $shop = new Shop();
        $shop->slug = $request->slug;
        $user->login_name = $request->user_name;
        $user->password=bcrypt($request->password);
        $user->email = $request->email;
        $user->permission_id = 2;
        $user->save(); 


        $shop->name = $request->name;
        $shop->user_id = $user->id;
        $shop->cost = $request->cost;
        $shop->open_time = $request->open_time;
        $shop->close_time = $request->close_time;
        $shop->description = $request->description;
        $shop->img = $request->img;
        $shop->save();
        

        $address->ward_id = $request->ward_id;
        $address->shop_id = $shop->id;
        $address->address_detail = $request->address;
        
        $address->save();  
        return redirect()->route('shop.index')->with('message', 'thêm mới thành công!');
        
    }
    public function edit($id){
        $province= Province::all();
        $shop = Shop::find($id);
        return view('admin.pages.shop.edit', compact('province','shop'));
    }
   

    public function destroy(Request $request){
        Shop::find($request->id)->delete();
        $shop = shop::all();
        // dd($shop);
        return view('admin.pages.shop.list_ajax',compact('shop'));
    }
    public function profile(){
        $province= Province::all();
        $shop = Shop::where('user_id',Auth::user()->id)->where('status',1)->first();
        if (isset(Auth::user()->id)) {
            return view('shop.pages.profile.profile',compact('shop','province'));
        }
    //    return view('admin.pages.shop.profile',compact('shop'));
    }
    public function updateprofile(Request $request, $id){
        // dd($request);
        // $this->validate($request, [
       //     // Validate the max number of characters to avoid database truncation
       //     'name' => ['required', 'string', 'max:100','min:1'],
       //     
       //     'img' => ['required'],
       //     'address'=>['required', 'string'],
       //    
       //     'ward_id'=>['required'],
       //    
       //     // The user should select at least one category
       // ],[
       //     'name.required'=>'Bạn chưa nhập tên ',
       //     'name.min'=>'Tên phải có độ dài từ 1 đến 100 ký tự',
       //     'name.max'=>'Tên phải có độ dài từ 1 đến 100 ký tự',
       //     
       //     'img.required'=>'Bạn chọn hình ảnh',
       //     'address.required'=>'Bạn chưa nhập địa chỉ chi tiết',
       //     'ward_id.required'=>'Bạn chưa chọn phường xã',   
       // ]
       // );
       $shop = Shop::find($id);
       if ($shop->address != null) {
           $address = Address::find($shop->address->id);
       }
       else{
           $address = new Address();
       }
       $shop->slug = $request->slug;
       $shop->name = $request->name;
       $shop->cost = $request->cost;
       $shop->open_time = $request->open_time;
       $shop->close_time = $request->close_time;
       $shop->description = $request->description;
       $shop->img = $request->img;
       $shop->save();
       

       $address->ward_id = $request->ward_id;
       $address->shop_id = $shop->id;
       $address->address_detail = $request->address;
       
       $address->save();  
       return redirect()->back()->with('message', 'chỉnh sửa thành công!');
       
       
   }
   public function dashboard()
   {
       $shop = Shop::where('user_id',Auth::user()->id)->where('status',1)->first();
    //    dd($shop);
        if ($shop != null) {
            $orders = Orders::where('shop_id',$shop->id)->count();
            return view('shop.index',compact('shop','orders'));
        }else{
            Auth::logout();
            return redirect()->back()->with('message', 'Cửa hàng của bạn chưa được duyệt!');
        }
      
   }

   public function register()
   {
         $province= Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
       return view('shop.register',compact('province'));
   }
   public function registerstore(Request $request)
   {
        $user = new User();
        $address = new Address();
        $shop = new Shop();
        $shop->slug = $request->slug;
        $user->login_name = $request->user_name;
        $user->password=bcrypt($request->password);
        $user->email = $request->email;
        $user->permission_id = 2;
        $user->save(); 


        $shop->name = $request->name;
        $shop->status =2;
        $shop->user_id = $user->id;
        $shop->cost = $request->cost;
        $shop->open_time = $request->open_time;
        $shop->close_time = $request->close_time;
        $shop->description = $request->description;
        $shop->img = $request->img;
        $shop->save();
        

        $address->ward_id = $request->ward_id;
        $address->shop_id = $shop->id;
        $address->address_detail = $request->address;
        
        $address->save();  
        // return redirect()->route('shop.index')->with('message', 'thêm mới thành công!');
   }
   public function showlistregister(){
    $shop = Shop::where('status',2)->get();
    // dd($user);
    return view('admin.pages.shop.list_register',compact('shop'));
}



}
