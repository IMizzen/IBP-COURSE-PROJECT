<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopCartController extends Controller
{

    public static function countshopcart(){
        return ShopCart::where('user_id',Auth::id())->count();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShopCart::where('user_id',Auth::id())->get();
        return view('pages.user.shopcart',[
            'data'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $id = $request->id;
        $data = ShopCart::where('product_id',$id)->where('user_id',Auth::id())->first();
        if ($data) {
            $data->quantity = $data->quantity + $request->input('quantity');
        }else {
            $data = new ShopCart;
            $data->product_id = $id;
            $data->user_id = Auth::id();
            $data->quantity = $request->input('quantity');
        }
        $data->save();

        return redirect()->back()->with('info','Product added to Shopcart..');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        return view('pages.user.order',[
            'total' => $request->total
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeorder(Request $request)
    {
        #Get credit card information send to bank webservice if everything is ok next
        $cardcheck = 'True'; //Asume we send credit card inf. to bank then we get result

        if($cardcheck == 'True') {
            $data = new Order;
            $data->name = $request->input('name');
            $data->address = $request->input('address');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone');
            $data->total = $request->input('total');
            $data->user_id = Auth::id();
            $data->IP = $_SERVER['REMOTE_ADDR'];
            $data->save();

            $datalist = ShopCart::where('user_id',Auth::id())->get();
            foreach ($datalist as $rs) {
                $data2 = new OrderProduct;
                $data2->user_id = Auth::id();
                $data2->product_id = $rs->product_id;
                $data2->order_id = $data->id;
                $data2->price = $rs->product->price;
                $data2->quantity = $rs->quantity;
                $data2->amount = $rs->quantity * $rs->product->price;
                $data2->save();
                
            }
            $data3 = ShopCart::where('user_id',Auth::id());
            $data3->delete();

            return redirect()->route('shopcart.ordercomplete')->with('success','Product Order Successfuly');

        
        }else{
            return redirect()->route('shopcart.ordercomplete')->with('error','Your credit card is not valid');
        }
    }

    public function ordercomplete(){
        return view('pages.user.ordercomplete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $data = ShopCart::where('product_id',$id)->where('user_id',Auth::id())->first();
        if ($data) {
            $data->quantity = $data->quantity + 1;
        }else {
            $data = new ShopCart;
            $data->product_id = $id;
            $data->user_id = Auth::id();
            $data->quantity = 1;
        }
        $data->save();

        return redirect()->back()->with('info','Product added to Shopcart..');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ShopCart::find($id);
        $data->quantity = $request->input('quantity');
        $data->save();
        return redirect()->back()->with('success','Product Updated to Shopcart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ShopCart::find($id);
        $data->delete();
        return redirect()->back()->with('info','Product deleted from Shopcart..');
    }
}
