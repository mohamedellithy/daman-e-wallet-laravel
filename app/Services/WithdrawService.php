<?php
namespace app\Services;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Payment;
use App\User;
use App\Orders;
use App\Withdraw;
class WithdrawService{
    public static function Create_Order_Withdraw(Request $request){
        // create Order Withdraw
        $order = auth()->user()->withdraw_orders()->create([
            'value'            => $request->input('value'),
            'withdraw_type'    => $request->input('withdraw_type'),
            'withdraw_account' => $request->input('withdraw_account'),
            'notice'           => $request->input('notice')
        ]);

        if($order){
            return $order;
        }
    }

    public static function Update_Order_Withdraw(Request $request){
        // get payer info
          // create Order Withdraw
        $order = auth()->user()->withdraw_orders()->where('id',$request->input('id'))->update([
            'value'            => $request->input('value'),
            'withdraw_type'    => $request->input('withdraw_type'),
            'withdraw_account' => $request->input('withdraw_account'),
            'notice'           => $request->input('notice')
        ]);

        if($order){
            return $order;
        }
    }

    public static function Update_Order_Status_Withdraw($order,$status){
        $order->update([
            'status' => $status,
        ]);

        if($order){
            return $order;
        }
    }

   


}
