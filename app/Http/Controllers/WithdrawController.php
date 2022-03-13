<?php

namespace App\Http\Controllers;

use App\Withdraw;
use Illuminate\Http\Request;
use App\Services\WithdrawService;
class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $withdraw_orders = auth()->user()->withdraw_orders()->get();
        return view('withdraws.index')->with([
            'menu_active'    => 'withdraws',
            'withdraw_orders'=> $withdraw_orders
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

        $this->validate($request,[
            'value' => 'required|gt:25|lt:200000',
            'withdraw_type' => 'required',
            'withdraw_account' => 'required'
        ]);

        $order_create = WithdrawService::Create_Order_Withdraw($request);

        if($order_create){
            return response()->json([
                'status'    =>'Payment Added successful'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Withdraw $withdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WithdrawController  $withdrawController
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $withdraw)
    {
        //
        return view('withdraws.edit',compact('withdraw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        //
        $this->validate($request,[
            'value' => 'required|gt:25|lt:200000',
            'withdraw_type' => 'required',
            'withdraw_account' => 'required'
        ]);

        $order_create = WithdrawService::Update_Order_Withdraw($request);

        if($order_create){
            return response()->json([
                'status'    =>'Payment Updated successful'
            ]);
        }
    }

    public function withdraw_status(Withdraw $order,$status){
        $order_updated = WithdrawService::Update_Order_Status_Withdraw($order,$status);

        if($order_updated){
            return response()->json([
                'status'    =>'Payment Updated successful'
            ]);
        }
    }
}
