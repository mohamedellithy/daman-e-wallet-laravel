<?php
namespace app\Services;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Payment;
use App\User;
use App\Orders;
class PaymentService{
    public static function Create_Payment(Request $request){
        // create Payments
        $payment = auth()->user()->payee()->create([
            'currency' => $request->input('currency'),
            'value'    => $request->input('value'),
            'payer_id' => self::Payer_Info($request->input('payer'))->id,
        ]);

        // orders create
        $orders = $payment->orders()->createMany($request->input('orders'));

        if($payment){
            return $payment;
        }
    }

    public static function Payer_Info($email){
        // get payer info
        return User::where('email',$email)->first();
    }

    public static function Update_Payment(Request $request){
        // create Payments
        $payment = Payment::find($request->input('id'));

        $prev_orders_id = $payment->orders()->pluck('id')->toArray();

        // update payment 
        $payment->update([
            'currency' => $request->input('currency'),
            'value'    => $request->input('value'),
            'payer_id' => self::Payer_Info($request->input('payer_id'))->id,
        ]);

        // check if orders exist
        if($request->has('orders')){

            // update exist order changed
            foreach(self::orders_needed_to_update($request->input('orders')) as $order):
                $orders = Orders::where('id',$order)
                ->update(self::get_order_by_id($request->input('orders'),$order));
            endforeach;


             // insert new order that changed
            if(self::orders_needed_to_insert($request->input('orders'))){
                $orders = $payment->orders()
                ->CreateMany(self::orders_needed_to_insert($request->input('orders')));
            }

            // delete unsed order id
            if($orders_id_need_to_delete = array_diff($prev_orders_id,self::orders_needed_to_update($request->input('orders')))){
                $payment->orders()->whereIn('id',$orders_id_need_to_delete)->delete();
            }
        }

        if($payment){
            return $payment;
        }
    }

    public static function orders_needed_to_update($orders){
        // get orders need to update
        return collect($orders)->pluck('id')->toArray();
    }

    public static function orders_needed_to_insert($orders){
        // get orders needed to insert
        return collect($orders)->where('id',null)->toArray();
    }

    public static function get_order_by_id($orders,$order_id){
        // get details order need to update
        $order_info = collect($orders)->Where('id',$order_id)->first();
        return [ 
            'title'      =>$order_info['title'] ?? '',
            'description'=>$order_info['description'] ?? '',
            'quantity'   =>$order_info['quantity'] ?? ''
        ];
    }

    public static function Update_Order_Status_Payment($order,$status){

        $order->update([
            'status' => $status,
        ]);

        if($order){
            return $order;
        }

    }

    public static function get_all_payments(){
        $payments_id = Payment::pluck('id')->toArray();
        return $payments_id;
    }


}
