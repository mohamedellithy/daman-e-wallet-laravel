<?php

namespace App\Http\Controllers;

use App\Withdraw;
use Illuminate\Http\Request;
use App\Services\ChargeWalletService;
use App\ChargeWalletOrder;
class ChargeWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $charge_orders = auth()->user()->charge_wallet_orders()->get();
        return view('charge-wallet.index')->with([
            'menu_active'    => 'charge-wallet',
            'charge_orders'  => $charge_orders
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
            'notice' => 'required'
        ]);

        $order_create = ChargeWalletService::Create_Order_charge_wallet($request);

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
    public function show(ChargeWalletOrder $charge_wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WithdrawController  $withdrawController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $charge_order = ChargeWalletOrder::find($id);
        return view('charge-wallet.edit',compact('charge_order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChargeWalletOrder $charge_wallet)
    {
        //
        $this->validate($request,[
            'value' => 'required|gt:25|lt:200000',
            'notice' => 'required'
        ]);

        $order_create = ChargeWalletService::Update_Order_charge_wallet($request);

        if($order_create){
            return response()->json([
                'status'    =>'Payment Updated successful'
            ]);
        }
    }

    public function charge_wallet_status(ChargeWalletOrder $order,$status){
        $order_updated = ChargeWalletService::Update_Order_Status_charge_wallet($order,$status);

        if($order_updated){
            return response()->json([
                'status'    =>'Payment Updated successful'
            ]);
        }
    }
}
