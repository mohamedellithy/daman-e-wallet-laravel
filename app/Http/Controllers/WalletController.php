<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
class WalletController extends Controller
{
   
    public function payments_recievied(){
        $recievied_request_payments = auth()->user()->payer()->get();
        return response()->json([
            'payments' => $recievied_request_payments
        ]);
    }

    public function payments_sent(){
        $send_request_payments = auth()->user()->payee()->get();
        return response()->json([
            'payments' => $send_request_payments
        ]);
    }


}
