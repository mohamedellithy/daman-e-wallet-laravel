<?php
namespace app\Services;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Payment;
use App\User;
use App\Orders;
use App\ChargeWalletOrder;
class ChargeWalletService{
    public static function Create_Order_charge_wallet(Request $request){
        // create Order Withdraw
        $order = auth()->user()->charge_wallet_orders()->create([
            'value'            => $request->input('value'),
            'notice'           => $request->input('notice')
        ]);

        if($order){
            return $order;
        }
    }

    public static function Update_Order_charge_wallet(Request $request){
        // get payer info
          // create Order Withdraw
        $order = auth()->user()->charge_wallet_orders()->where('id',$request->input('id'))->update([
            'value'            => $request->input('value'),
            'notice'           => $request->input('notice')
        ]);

        if($order){
            return $order;
        }
    }

    public static function Update_Order_Status_charge_wallet($order,$status){
        $order->update([
            'status' => $status,
        ]);

        if($order){
            return $order;
        }
    }




}
