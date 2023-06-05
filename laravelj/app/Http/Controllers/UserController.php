<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.index');
    }

    public function reviews(){
        $comments = Comment::where('user_id','=',Auth::id())->get();
        return view('pages.user.comments',[
            'comments' => $comments
        ]);
    }

    public function orderdetail($id){
        $order = Order::find($id);
        $orderproducts = OrderProduct::where('order_id','=',$order->id)->get();
        return view('pages.user.orderdetail',[
            'order' => $order,
            'orderproducts' => $orderproducts

        ]);
    }

    public function orders(){
        $data = Order::where('user_id','=',Auth::id())->get();
        return view('pages.user.orders',[
            'data' => $data
        ]);
    }

    public function cancelproduct($id)
    {
        $data = OrderProduct::find($id);
        $data->status = 'Cancelled';
        $data->save();
        return redirect()->back();
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
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function reviewdestroy($id)
    {
        $data=Comment::find($id);
        $data->delete();
        return redirect(route('userpanel.reviews'));
    }
}
