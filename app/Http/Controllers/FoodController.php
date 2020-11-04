<?php

namespace App\Http\Controllers;
use Auth;
use App\Food;
use App\Shop;
use App\Image_food;
use App\Category;
use App\Address;
use App\Ward;
use App\District;
use App\Province;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $shop = Shop::where('shop.user_id', Auth::user()->id)->first();
        $food = Food::where('food.shop_id', $shop->id)->get();
        // dd($food);
        return view('shop.pages.food.list',compact('food'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();   
        return view('shop.pages.food.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            // Validate the max number of characters to avoid database truncation
            'name' => ['required', 'string', 'max:100','min:5'],
            'price' => ['required', 'integer'],
            'sale' => ['integer'],
            'description' => ['required', 'min:20'],
            'img' => ['required'],
            // The user should select at least one category
            'category_id' => ['required', 'array', 'min:1'],
            'category_id.*' => ['required', 'integer', 'exists:category,id'],
        ],[
            'name.required'=>'Bạn chưa nhập tên món ăn',
            'name.min'=>'Tên sản phẩm phải có độ dài từ 5 đến 100 ký tự',
            'name.max'=>'Tên sản phẩm phải có độ dài từ 5 đến 100 ký tự',
            'price.required'=>'Bạn chưa nhập giá',
            'img.required'=>'Bạn chọn hình ảnh',
            'price.integer'=>'giá phải là kiểu số',
            'sale.integer'=>'khuyến mãi phải là kiểu số',
            'category_id.required'=>'Bạn chưa chọn danh mục món ăn',
            'description.required'=> 'Bạn chưa nhập miêu tả'
        ]
        );

        $shop = Shop::where('shop.user_id', Auth::user()->id)->first();
        $food = new Food();
        $food->name = $request->name;
        $food->description = $request->description;
        // $food->img = $request->img;
        $food->slug = $request->slug;
        $food->shop_id = $shop->id;
        $food->price = $request->price;
        $food->sale = $request->sale;
        $food->save();
        $food->category()->attach($request->category_id);
        $img = new Image_food();
        $img->path = $request->img;
        $img->food_id = $food->id;
        $img->index = 0;
        $img->save();
        $img1 = new Image_food();
        $img1->path = $request->img1;
        $img1->food_id = $food->id;
        $img1->index = 1;
        $img1->save();
        $img2 = new Image_food();
        $img2->path = $request->img2;
        $img2->food_id = $food->id;
        $img2->index = 2;
        $img2->save();
        $img3 = new Image_food();
        $img3->path = $request->img3;
        $img3->food_id = $food->id;
        $img3->index = 3;
        $img3->save();
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all(); 
        $food = Food::find($id);
        $img = Image_food::where('food_id',$id)->where('index',0)->first();
        $img1 = Image_food::where('food_id',$id)->where('index',1)->first();
        $img2 = Image_food::where('food_id',$id)->where('index',2)->first();
        $img3 = Image_food::where('food_id',$id)->where('index',3)->first();
        $category_id=[];
        foreach ($food->category as $item) {
            $category_id[] = $item->id;
        }
        
        // dd($category_id);
        return view('shop.pages.food.edit', compact('category','food','category_id','img','img1','img2','img3'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // $img = Image_food::where('food_id',$id)->where('index',1)->first();
        // dd($img);
        $this->validate($request, [
            // Validate the max number of characters to avoid database truncation
            'name' => ['required', 'string', 'max:100','min:5'],
            'price' => ['required', 'integer'],
            'sale' => ['integer'],
            'description' => ['required', 'min:20'],
            'img' => ['required'],
            // The user should select at least one category
            'category_id' => ['required', 'array', 'min:1'],
            'category_id.*' => ['required', 'integer', 'exists:category,id'],
        ],[
            'name.required'=>'Bạn chưa nhập tên món ăn',
            'name.min'=>'Tên sản phẩm phải có độ dài từ 5 đến 100 ký tự',
            'name.max'=>'Tên sản phẩm phải có độ dài từ 5 đến 100 ký tự',
            'price.required'=>'Bạn chưa nhập giá',
            'sale.integer'=>'giảm giá là số phần trăm',
            'img.required'=>'Bạn chọn hình ảnh',
            'price.integer'=>'giá phải là kiểu số',
            'category_id.required'=>'Bạn chưa chọn danh mục món ăn',
            'description.required'=> 'Bạn chưa nhập miêu tả'
        ]
        );
        $shop = Shop::where('shop.user_id', Auth::user()->id)->first();
        $food = Food::find($id);
        $food->category()->detach();
        $food->name = $request->name;
        $food->description = $request->description;
        // $food->img = $request->img;
        $food->slug = $request->slug;
        $food->shop_id = $shop->id;
        $food->price = $request->price;
        $food->sale = $request->sale;
        $food->save();
        $food->category()->attach($request->category_id);
        $img = Image_food::where('food_id',$id)->where('index',0)->first();
        if ($img != null) {
            $img->path = $request->img;
            $img->save();
        }else{
            $img = new Image_food();
            $img->path = $request->img;
            $img->food_id = $food->id;
            $img->index = 0;
            $img->save();
        }

        $img1 = Image_food::where('food_id',$id)->where('index',1)->first();
        if ($img1 != null) {
            $img1->path = $request->img1;
            $img1->save();
        }else{
            $img1 = new Image_food();
            $img1->path = $request->img1;
            $img1->food_id = $food->id;
            $img1->index = 1;
            $img1->save();
        }

        $img2 = Image_food::where('food_id',$id)->where('index',2)->first();
        if ($img2 != null) {
            $img2->path = $request->img2;
            $img2->save();
        }else{
            $img2 = new Image_food();
            $img2->path = $request->img2;
            $img2->food_id = $food->id;
            $img2->index = 2;
            $img2->save();
        }

        $img3 = Image_food::where('food_id',$id)->where('index',3)->first();
        if ($img3 != null) {
            $img3->path = $request->img3;
            $img3->save();
        }else{
            $img3 = new Image_food();
            $img3->path = $request->img3;
            $img3->food_id = $food->id;
            $img3->index = 3;
            $img3->save();
        }
        

        
        
        
        return redirect()->route('food.index')->with('message', 'chỉnh sửa thành công!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request);
        Food::findOrFail($request->id)->delete();
        $shop = Shop::where('shop.user_id', Auth::user()->id)->first();
        $food = Food::where('food.shop_id', $shop->id)->get();
        // dd($food);
        return view('shop.pages.food.list_ajax',compact('food'));
        // return response()->json();

    }
    public function showlist()
    {
        $province_now = Province::find('59');
        $province = Province::whereIn('name', ['Thành phố Hà Nội', 'Thành phố Cần Thơ','Thành phố Hồ Chí Minh'])->get();
        
        $food = Food::paginate(12);
        $category = Category::all();
        
        return view('customer.pages.food',compact('food','category','province','province_now'));
    }
    public function showHome()
    {
        $food = Food::all()->take(10);
    }
    public function detailfood(Request $request, $id){
        if ($request->ajax()) {
            $food_detail = Food::where('id',$id)->first();
            $html = view('shop.pages.food.food_detail', compact('food_detail'))->render();
            return \response()->json($html);
        }
    }
    public function detailfoodindex(Request $request, $id){
        if ($request->ajax()) {
            $food_detail = Food::where('id',$id)->first();
            $html = view('customer.pages.shop.food_detail', compact('food_detail'))->render();
            return \response()->json($html);
        }
    }
}
