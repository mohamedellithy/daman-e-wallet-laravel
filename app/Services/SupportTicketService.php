<?php
namespace app\Services;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Payment;
use App\User;
use DB;
use App\Orders;
use App\TicketSupport;
class SupportTicketService{
    public static function open_new_ticket(Request $request){
        // create Payments
        $open_ticket = auth()->user()->ticket_support()->create([
            'title'     => $request->input('title'),
            'ticket'    => $request->input('ticket'),
            'payment_id'=> $request->input('payment'),
            'type'      => 0,
            'ticket_id' => rand(1,1000).strtotime(date('Y-m-d H:i:s')),
            'email'     => $request->input('email')
        ]);

        if($open_ticket){
            return $open_ticket;
        }
    }

    public static function Complainant_Info($email){
        // get payer info
        return User::where('email',$email)->first();
    }

    public static function get_my_tickets_support(){
        //return auth()->user()->ticket_support ?? null;
        $my_tickets = auth()->user()->ticket_support()->select(DB::raw('ANY_VALUE(id) as id ,
        ANY_VALUE(payment_id) as payment_id,
        ANY_VALUE(user_id) as user_id,
        ANY_VALUE(title) as title,
        ANY_VALUE(ticket) as ticket,
        ANY_VALUE(email) as email,
        ANY_VALUE(status) as status,
        ANY_VALUE(created_at) as created_at,
        ticket_id as ticket_id'))
       ->groupBy('ticket_id')->where('type',0)->orWhere('type',1)->get();
       return $my_tickets;
    }

    public static function status_support_ticket($ticket_id,$status){
        $method = 'close';
        if($status == 0){
            $method = 'open';
        }
        elseif($status == 1){
            $method = 'close';
        }
        return self::{"{$method}_support_ticket"}($ticket_id);
    }

    public static function close_support_ticket($ticket_id){
        $ticket_update = TicketSupport::where([
            'ticket_id' => $ticket_id,
            'status'    => 0
        ])->update([
           'status' => 1
        ]);

        if($ticket_update){
            return TicketSupport::find($ticket_update);
        }
    }

    public static function open_support_ticket($ticket_id){
        $ticket_update = TicketSupport::where([
            'ticket_id' => $ticket_id,
            'status'    => 1
        ])->update([
           'status' => 0
        ]);

        if($ticket_update){
            return TicketSupport::find($ticket_update);
        }
    }

    public static function show_single_ticket_support($ticket_id){
        //return 'ticket_id';
        $ticket = TicketSupport::with('users','payments')->where('ticket_id',$ticket_id)->get();
        return $ticket;
    }

    public static function add_replay_on_ticket(Request $request){
        // create Payments
        $open_ticket = auth()->user()->ticket_support()->create([
            'title'     => $request->input('title'),
            'ticket'    => $request->input('ticket'),
            'payment_id'=> $request->input('payment'),
            'type'      => 0,
            'ticket_id' => $request->input('ticket_id'),
            'email'     => $request->input('email')
        ]);

        if($open_ticket){
            return $open_ticket;
        }
    }
}
