<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $data = Order::where('status',$slug)->get();
        //dd($data);
        
        return view('admin.order.index',[
            'data' => $data
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
        $data = Order::find($id);
        $datalist = OrderProduct::where('order_id',$id)->get();
        return view('admin.order.show',[
            'data' => $data,
            'datalist' => $datalist
        ]);
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
        $data = Order::find($id);
        $data->status = $request->status;
        $data->note = $request->note;
        $data->save();
        return redirect(route('admin.order.show',['id'=>$id]));
    }

    public function cancelorder($id)
    {
        $data = Order::find($id);
        $data->status = 'Cancelled';
        $data->save();
        return redirect()->back();
    }

    public function cancelproduct($id)
    {
        $data = OrderProduct::find($id);
        $data->status = 'Cancelled';
        $data->save();
        return redirect()->back();
    }

    public function acceptproduct($id)
    {
        $data = OrderProduct::find($id);
        $data->status = 'Accepted';
        $data->save();
        return redirect()->back();
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
}
