<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Message;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $sliderdata = Product::limit(4)->get();
        $productlist1 = Product::limit(8)->get();
        $categorylist = Categories::limit(8)->get();
        $lastproducts = Product::orderBy('id','DESC')->limit(8)->get();
        $setting = Setting::first();

        return view('pages.index',[
            'setting'=>$setting,
            'sliderdata'=>$sliderdata,
            'productlist1'=>$productlist1,
            'categorylist'=>$categorylist,
            'lastproducts'=>$lastproducts


        ]);
    }

    public function search(Request $request){

        $search = $request->input('search');

        $posts = Product::query()
                    ->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('keywords', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->get();

        return view('pages.search', compact('posts'));
    }



    public function registeruser(){
        $setting = Setting::first();
        return view('pages.register',[
            'setting'=>$setting
        ]);
    }

    public function logoutuser(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public static function mainCategoryList(){
        return Categories::where('parent_id', '=' , 0)->with('children')->get();
    }

    public function about(){
        $setting = Setting::first();
        return view('pages.about',[
            'setting'=>$setting
        ]);
    }


    public function references(){
        $setting = Setting::first();
        return view('pages.references',[
            'setting'=>$setting
        ]);
    }

    public function shop(){
        $setting = Setting::first();
        $products = Product::all();
        return view('pages.shop',[
            'setting'=>$setting,
            'products'=>$products

        ]);
    }

    public function cart(){
        $setting = Setting::first();
        return view('pages.cart',[
            'setting'=>$setting
        ]);
    }

    public function checkout(){
        $setting = Setting::first();
        return view('pages.checkout',[
            'setting'=>$setting
        ]);
    }

    public function faq(){
        $setting = Setting::first();
        $datalist = Faq::where('status','True')->get();
        return view('pages.faq',[
            'setting'=>$setting,
            'datalist'=>$datalist
        ]);
    }

    public function contact(){
        $setting = Setting::first();
        return view('pages.contact',[
            'setting'=>$setting
        ]);
    }

    public function storemessage(Request $request){
        //dd($request);
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->ip = request()->ip();
        $data->save();

        return redirect()->route('contact')->with('info','Your message has been sent, Thank You.');
    }

    public function storecomment(Request $request){
        //dd($request);
        $data = new Comment();
        $data->user_id = Auth::id();
        $data->product_id = $request->input('product_id');
        $data->subject = $request->input('subject');
        $data->review = $request->input('review');
        $data->IP = request()->IP();
        $data->rate = $request->input('rate');

        $data->save();


        return redirect()->route('product',['id'=>$request->input('product_id')])->with('success','Your comment has been sent, Thank You.');
    }

    public function detail(){
        $setting = Setting::first();
        return view('pages.detail',[
            'setting'=>$setting
        ]);
    }
    public function product($id){
        $data = Product::find($id);
        $setting = Setting::first();
        $images = DB::table('images')->where('product_id',$id)->get();
        $reviews = Comment::where('product_id',$id)->where('status','True')->get();
        return view('pages.product',[
            'data'=>$data,
            'images'=>$images,
            'reviews'=>$reviews,
            'setting'=>$setting
        ]);
    }
    public function categoryproducts($id){
        $category = Categories::find($id);
        $products = Product::where('category_id',$id)->get();
        return view('home.categoryproducts',[
            'category'=>$category,
            'products'=>$products
        ]);
    }

}
