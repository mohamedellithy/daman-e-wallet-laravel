@extends('admin.master')
@section('content_header')
    <h6 style="direction:rtl">
        <i class="fa fa-user single-sect"></i>
       {{ $user->username }}
    </h6>
@stop
@section('content_page')
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user shadow">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-secondary">
                    <h3 class="widget-user-username">{{ $user->firstname.' '.$user->lastname }}</h3>
                    <h5 class="widget-user-desc">{{ $user->email }}</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt="User Avatar">
                </div>
                <div class="card-footer">

                    <ul class="row items-balance-list">
                        <li>البريد الالكترونى الدافع :     {{ '#' }}</li>
                        <li>البريد الالكترونى المستلم :     {{ '#' }}</li>
                        <li>قيمة المدفوعات :   {{ '#' }} </li>
                        <li>حالة المدفوعات : {{ '#' }}</li>

                    </ul>
                <!-- /.row -->
                </div>
            </div>
        <!-- /.widget-user -->
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="color-palette-set">
                <div class="card card-success card-outline">
                    <div class="card-body">

                         <!-- Color Picker -->
                         <div class="form-group">
                            <label>الاسم الاول</label>
                            <input type="text" value="{{ $user->firstname ?? null }}" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="" readonly>
                        </div>

                         <!-- Color Picker -->
                         <div class="form-group">
                            <label>الاسم الثانى</label>
                            <input type="text" value="{{ $user->lastname ?? null }}" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="" readonly>
                        </div>

                         <!-- Color Picker -->
                         <div class="form-group">
                            <label>اسم المستخدم</label>
                            <input type="text" value="{{ $user->username ?? null }}" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="" readonly>
                        </div>

                         <!-- Color Picker -->
                         <div class="form-group">
                            <label>البريد الالكترونى</label>
                            <input type="text" value="{{ $user->email ?? null }}" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="" readonly>
                        </div>

                         <!-- Color Picker -->
                         <div class="form-group">
                            <label>الدولة</label>
                            <input type="text" value="{{ $user->country ?? null }}" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="" readonly>
                        </div>

                        <!-- Color Picker -->
                        <div class="form-group">
                            <label>رقم الجوال</label>
                            <input type="text" value="{{ $user->phone ?? null }}" class="form-control my-colorpicker1 colorpicker-element" data-colorpicker-id="1" data-original-title="" title="" readonly>
                        </div>
                        <!-- /.form group -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

@endsection

@section('styles_content')
     <style>
        .card-footer{
            background-color: white;
        }
        .row-statics{
            border-bottom: none !important;
            text-align:center !important;
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
     </style>
@endsection


@section('scripts_content')

@endsection
