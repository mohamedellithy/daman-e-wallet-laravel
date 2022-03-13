<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Payment;
use App\Services\PaymentService;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('payments.create')->with('menu_active','payments');
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
        $validate = Validator::make($request->all(),[
            'currency' => 'required',
            'value'    => 'required|gt:10',
            'payer'    => 'sometimes|exists:users,email'
        ]);

        if($validate->fails()) {
            return response()->json([
                'errors'=>$validate->errors()
            ],422);
        }

        $payment = PaymentService::Create_Payment($request);

        if($payment){
            return response()->json([
                'status'    =>'Payment Added successful',
                'Payment_id'=>$payment->id,
                'redirect'  =>route('payments.show',$payment->id)
            ]);
        }
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
        $payment = Payment::where('id',$id)->with('orders')->first();
        return view('payments.show',compact('payment'));
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
        $payment = Payment::where('id',$id)->with('orders')->first();
        return view('payments.edit',compact('payment'));
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
        $validate = Validator::make($request->all(),[
            'currency' => 'required',
            'value'    => 'required|gt:10',
            'payer'    => 'sometimes|exists:users,email'
        ]);

        if($validate->fails()) {
            return response()->json([
                'errors'=>$validate->errors()
            ],422);
        }

        $update = PaymentService::Update_Payment($request);

        if($update){
            return response()->json(['status'=>'Payment added successfully','payment'=>$update]);
        }
    }

    public function payment_status(Payment $order,$status){
        $order = PaymentService::Update_Order_Status_Payment($order,$status);
        if($order){
            return response()->json([
                'status'    =>'Payment Updated successful',
                'order'     => $order
            ]);
        }
    }

    public function pay_me(Payment $payment){
        $payment = $payment->with('orders')->first();
        return view('pay-me.index',compact('payment'));
    }

    public function accept_order_payment(Payment $order){
        if(!auth()->user()){
            return response()->json([
                'status'    =>'You must register to accept order '
            ],401);
        }

        if (auth()->user()->email == $order->payer_id) {
            $order = PaymentService::Update_Order_Status_Payment($order, 1);
            if ($order) {
                return response()->json([
                    'status'    =>'Payment Updated successful',
                    'order'     => $order
                ]);
            }
        }

        return response()->json([
            'status'    =>'You cannot have priviliage to accept order '
        ],401);
    }
    public function refuse_order_payment(Payment $order){
        if(!auth()->user()){
            return response()->json([
                'status'    =>'You must register to refuse order '
            ],401);
        }

        if (auth()->user()->email == $order->payer_id) {
            $order = PaymentService::Update_Order_Status_Payment($order, 2);
            if ($order) {
                return response()->json([
                    'status'    =>'Payment Updated successful',
                    'order'     => $order
                ]);
            }
        }

        return response()->json([
            'status'    =>'You cannot have priviliage to refuse order '
        ],401);
    }


}
