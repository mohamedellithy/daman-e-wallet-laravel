@extends('admin.master')
@section('content_header')
    <h1>عرض المستخدمين</h1>
@stop
@section('content_page')
    <div class="col-sm-12 col-md-12">
        <div class="color-palette-set">
            {!! $dataTable->table() !!}
        </div>
    </div>
@endsection

@section('styles_content')
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection


@section('scripts_content')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js" type="text/javascript"></script>

    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
   {!! $dataTable->scripts() !!}
@endsection