@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">2FA Secret Key</div>

                <div class="panel-body">
                    2FA has been removed
                    <br /><br />
                    <!--<a href="{{ url('/home') }}">Go Home</a>-->
                    @if(Auth::user()->user_type == 'A')
                    <a href="{{ url('admin/dashboard') }}">Go Home</a>
                    @elseif(Auth::user()->user_type == 'S')
                    <a href="{{ url('startup/dashboard') }}">Go Home</a>
                    @elseif(Auth::user()->user_type == 'O')
                    <a href="{{ url('admin/dashboard') }}">Go Home</a>
                    @else
                    <a href="{{ url('home') }}">Go Home</a>
                    @endif  
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection

