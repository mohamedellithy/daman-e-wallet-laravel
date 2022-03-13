@extends('admin.master')
@section('content_header')
    <h1>Payments </h1>
@stop
@section('page_title')
   show payment
@endsection
@section('content_page')
    <div class="col-md-8 container-data">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Payment Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <label>payer email</label>
                <p class="text-green item-pa">
                    {{ $payment->payer_id }}
                </p>

                <label>payee email</label>
                <p class="text-aqua item-pa"> {{ $payment->payee_email }}</p>

                <label>payment value</label>
                <p class="text-light-blue item-pa">{{ $payment->value.' '.$payment->currency }}</p>

                <label>currency</label>
                <p class="text-red item-pa">{{ $payment->currency }}</p>

                <label>status payment</label>
                <p class="text-yellow item-pa">{{ $payment->status_text }}</p>

                <label>payment date</label>
                <p class="text-muted item-pa">{{ $payment->created_at }}</p>
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
                <h3 class="widget-user-username">Payer</h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row row-statics">
                    <h6 class="block widget-user-username">{{ 'no-found' }}</h6>
                    <p class="block widget-user-desc">{{ $payment->payer_id  }}</p>
                    <a href="{{ url('admin/users/'.($payment->payer->id ?? '')) }}" class="btn btn-info">Details Member</a>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>


         <!-- Widget: user widget style 1 -->
         <div class="card card-widget widget-user shadow">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-success">
                <h3 class="widget-user-username">Payee</h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row row-statics">
                    <h6 class="block widget-user-username">{{ $payment->payee->username ?? 'no-found' }}</h6>
                    <p class="block widget-user-desc">{{ $payment->payee->email ?? 'no-found' }}</p>
                    <a href="{{ url('admin/users/'.$payment->payee->id) }}" class="btn btn-info payee-btn">Details Member</a>
                <!-- /.col -->
                </div>
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
        border: 3px dashed #eee;
        direction: rtl;
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
  </style>
@endsection


@section('scripts_content')

@endsection
