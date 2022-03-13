<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SupportTicketService;
use App\Services\PaymentService;
class SupportTicketController extends Controller
{
    //
    public function get_payments_all(){
        $payment_ids = PaymentService::get_all_payments();
        return response()->json([
            'payments_id' => $payment_ids,
            'email'       => auth()->user()->email
        ]);
    }

    public function index(){
       // support-tickets
        $my_tickets_support = SupportTicketService::get_my_tickets_support();
        return response()->json([
            'tickets' => $my_tickets_support
        ]);
    }

    public function show($id){
        // support-tickets
        $ticket_support = SupportTicketService::show_single_ticket_support($id);
        return response()->json([
            'tickets' => $ticket_support
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'payment' => 'required|exists:payments,id',
            'title'      => 'required',
            'ticket'     => 'required',
            'email'      => 'required|email'
        ]);

        if($request->has('ticket_id')):
            $ticket = SupportTicketService::add_replay_on_ticket($request);
        else:
            $ticket = SupportTicketService::open_new_ticket($request);
        endif;

        return response()->json([
            'status' => 'Ticket Is opened successfully . number of ticket #'.$ticket->id,
            'ticket' => $ticket
        ]);
    }

    public function change_status_ticket($ticket_id,$status_id){
         $ticket =  SupportTicketService::status_support_ticket($ticket_id,$status_id);
         return response()->json([
             'ticket' => $ticket
         ]);
    }
}
