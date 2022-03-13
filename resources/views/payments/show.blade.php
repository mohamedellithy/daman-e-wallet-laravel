@extends('master')

@section('pre_style')
    <link href="{{ asset('template/css/magnific-popup.css') }}" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
@endsection


@section('content')
<show-payment-order
 :payment="{{ $payment }}"
  PaymentStatus="0"
  PayerAction="0"
 :edit_url="{{ json_encode(route('payments.edit',$payment->id)) }}"
 :user="{{ json_encode(auth()->user() ?? []) }}">
 </show-payment-order>
 <br/><br/><br/><br/><br/><br/>
@endsection



@section('pre_script')
    <script defer src="{{ asset('template/js/popper.min.js') }}"></script>
    <script defer src="{{ asset('template/js/variables.js') }}"></script>
    <script defer src="{{ asset('template/js/jquery.circliful.min.js') }}"></script>
    <script defer src="{{ asset('template/js/jquery.viewportchecker.min.js') }}"></script>
@endsection
