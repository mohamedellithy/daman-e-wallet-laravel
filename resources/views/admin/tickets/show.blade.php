@extends('admin.master')
@section('content_header')
    <h1>Tickets </h1>
@stop
@section('page_title')
    @if($tickets[0]->status == 0)
        <a href="{{ url('admin/support-tickets/status/'.$tickets[0]->ticket_id.'/1') }}" class="btn btn-danger btn-sm">Close Ticket</a>
    @else
        <a href="{{ url('admin/support-tickets/status/'.$tickets[0]->ticket_id.'/0') }}" class="btn btn-success btn-sm">Re-open Ticket</a>
    @endif
@endsection
@section('content_page')
    <div class="col-md-8 container-data">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h5 class="box-title">Ticket no #{{ $ticket_no }}</h5>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="ticket-item admin-write-replay">
                    <form action="{{ url('') }}" method="post">
                        {{ csrf_field() }}
                        <img class="ticket-img-avatar" src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png"/>
                        <a href="#" class="username-ticket"> Admin</a>
                        <textarea class="form-control write-replay-ticket" name="ticket" rows="5" cols="10">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius eos exercitationem distinctio. Corporis ipsa eligendi ratione voluptate? At sunt harum maxime cum. Excepturi magnam nostrum id dolores facilis, quaerat vel.
                        </textarea>
                        <button type="submit" class="btn btn-success">replay on ticket</button>
                    </form>
                </div>
                @forelse($tickets as $ticket)
                    <div class="ticket-item {{ $ticket->type == 0 ? '':'admin-replay'  }}">
                        <img class="ticket-img-avatar" src="{{ $ticket->image }}"/>
                        <a href="#" class="username-ticket"> {{ $ticket->type == 0 ? $ticket->users->username : 'admin' }}</a>
                        <a href="#" class="date-ticket">{{ $ticket->created_at }}</a>
                        <div class="ticket-body">
                           {{ $ticket->ticket }}
                        </div>
                    </div>
                @empty
                    <p> No Ticket is found </p>
                @endforelse

            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-4">
        <!-- /.box -->
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user shadow">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-secondary">
                <h3 class="widget-user-username">Member</h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row row-statics">
                    <h6 class="block widget-user-username">{{ $tickets[0] ? $tickets[0]->users->username : 'no-found'  }}</h6>
                    <p class="block widget-user-desc">{{ $tickets[0] ? $tickets[0]->users->email : 'no-found'  }}</p>
                    <a href="{{ url('admin/users/'.($tickets[0] ? $tickets[0]->users->id : '#')) }}" class="btn btn-info">Details Member</a>
                    <a href="{{ url('admin/payments/'.($tickets[0] ? $tickets[0]->payments->id : '#')) }}" class="btn btn-info">Payment Details</a>
                <!-- /.col -->
                </div>
                <ul class="row items-balance-list">
                    <li>Payer Email :     {{ ($tickets[0] ? $tickets[0]->payments->payer_id : '#') }}</li>
                    <li>Payee Email :     {{ ($tickets[0] ? $tickets[0]->payments->payee_email : '#') }}</li>
                    <li>Payment Value :   {{ ($tickets[0] ? $tickets[0]->payments->value.' '.$tickets[0]->payments->currency : '#') }} </li>
                    <li>Status Payment : {{ ($tickets[0] ? $tickets[0]->payments->status_text : '#') }}</li>
                    <li>Status Payment : {{ ($tickets[0] ? $tickets[0]->payments->created_at : '#') }}</li>
                    
                </ul>
                <!-- /.row -->
            </div>
        </div>

    </div>
@endsection

@section('styles_content')
  <style>
      body{
          direction: rtl;
      }
      .card{
          background-color:#eee !important;
      }
      .container-data{
        background: white;
        padding: 20px;
      }
      .box-title{
        padding: 15px 3px;
      }
      .item-pa{
        padding: 13px;
        border: 3px dashed #fff;
        direction: rtl;
        background-color: #eee;
      }
      .card-widget.widget-user{
        padding: 17px;
        background: white !important;
        box-shadow: 0px 1px 9px 7px #e0e0e0 !important;
      }
      .widget-user .widget-user-image{
        top: 75px;
      }
      .widget-user .widget-user-image>img{
        width: 70px !important;
      }
      .card-footer{
        background-color: white;
      }
      .row-statics{
          border-bottom: none !important;
          text-align:center !important;
      }
      .row-statics a.btn{
            margin:auto !important;
            color: #fff;
            background-color: #ff5722 !important;
            border-color: #ff5722 !important;
            border-radius: 0px;
            box-shadow: 3px 4px 6px 7px #eee;
      }
      .widget-user .widget-user-header{
        height: 85px;
      }
      .row-statics .block{
        display: block !important;
        width: 100%;
      }
      .card-title {
        float: left !important;
      }
      .items-balance-list li{
        list-style: none;
        width: 100%;
        padding: 10px;
        background-color: #eee;
        margin: 10px;
        border: 2px dashed white;
        direction: rtl;
        text-align: right;
      }
      .ticket-item{
        padding: 10px;
        background-color: #eee;
        margin: 11px;
      }
      .ticket-img-avatar{
          width:50px;
          height:50px;
          border-radius: 38px;
      }
      .username-ticket{
        text-decoration: none;
        color: #212539;
      }
      .ticket-body{
        padding: 0px 50px;
        text-align: justify;
      }
      .admin-replay{
        background-color: #f6e7ca;
      }
      .date-ticket{
        float: left;
        text-decoration: none;
        color: #ff5722;
      }
      .write-replay-ticket{
        margin: 15px 1px;
      }
  </style>
@endsection


@section('scripts_content')

@endsection
