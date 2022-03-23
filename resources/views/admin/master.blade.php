@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card card-default color-palette-box">
        <div class="card-header">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <h3 class="card-title">

              @yield('page_title')
            </h3>
        </div>
        <div class="card-body">
            <!-- /.col-12 -->
            <div class="row">
               @yield('content_page')
              <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    <!-- /.card-body -->
    </div>
@stop

@section('css')
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6a0783bcfd.js" crossorigin="anonymous"></script>
    @yield('styles_content')
    <link rel="stylesheet" href="{{ asset('template/admin/css/Adminlte-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/css/admin_custom.css') }}">
@stop

@section('js')
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK" crossorigin="anonymous"></script>
    <script> console.log('Hi!'); </script>
    

    @yield('scripts_content')
@stop
