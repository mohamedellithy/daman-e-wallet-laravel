@extends('admin.master')
@section('content_header')
    <h1>طلبات السحب </h1>
@stop
@section('page_title')
    @if($withdraw->status == 0)
        <a href="{{ url('admin/update-withdraw-status/'.$withdraw->id.'/2') }}" class="btn btn-danger btn-sm">الغاء الطلب</a>
        <a href="{{ url('admin/update-withdraw-status/'.$withdraw->id.'/1') }}" class="btn btn-success btn-sm">موافقة على الطلب</a>
    @else
        <label class="status-info"> {{ $withdraw->status_text ?? '-' }} </label>
    @endif
@endsection
@section('content_page')
    <div class="col-md-8 container-data">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">تفاصيل طلب السحب</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <label>حساب طلبات السحب</label>
                <p class="text-green item-pa">
                    {{ $withdraw->withdraw_account ?? 'no-found' }}
                </p>

                <label>قيمة المدفوعات</label>
                <p class="text-aqua item-pa"> {{ $withdraw->value ?? 'no-found' }}</p>

                <label>حالة طلب السحب</label>
                <p class="text-yellow item-pa">{{ $withdraw->status_text }}</p>

                <label>تاريخ السحب</label>
                <p class="text-muted item-pa">{{ $withdraw->created_at }}</p>

                <label>ملاحظات على طلب السحب</label>
                <p class="text-muted item-pa">{{ $withdraw->notice }}</p>

                <label>نوع السحب</label>
                <p class="text-muted item-pa">{{ $withdraw->withdraw_type }}</p>
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
                <h3 class="widget-user-username">عضو</h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row row-statics">
                    <h6 class="block widget-user-username">{{ $withdraw->user->username ?? 'no-found' }}</h6>
                    <p class="block widget-user-desc">{{ $withdraw->user->email ?? 'no-found'  }}</p>
                    <a href="{{ url('admin/users/'.$withdraw->user->id) }}" class="btn btn-info">تفاصيل العضو</a>
                <!-- /.col -->
                </div>
                <ul class="row items-balance-list">
                    <li>{{ 'رصيد الحساب' }} : 1220 USD </li>
                    <li>{{ 'طلب السحب' }} : 233 USD</li>
                    <li>{{ 'المتبقي من الرصيد' }} : 300 USD </li>
                    <li>{{ 'الرصيد المحظور' }} : 200 USD</li>
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
      .status-info{
        background-color: #2196f3;
        padding: 10px;
        color: white;
      }
  </style>
@endsection


@section('scripts_content')

@endsection
