@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    Welcome
                    {{ Auth::user()->name }}
                    You are logged in!

                    <div class="flex-center position-ref full-height">
                        @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                            <!-- <a href="{{ url('/dropdownlist') }}">order</a> -->
                            <a href="{{ url('/getorder') }}" class="btn btn-small btn-info iframe"><span
                                    class="glyphicon glyphicon-plus-sign"></span> Order </a>
                            @endauth
                        </div>
                        @endif
                        @if (Route::has('login'))
                        <div class="top-right links">
                            @auth

                            <a href="{{ url('/piechart') }}" class="btn btn-small btn-info iframe"><span
                                    class="glyphicon glyphicon-plus-sign"></span> Pie Char</a>
                            @endauth
                        </div>
                        @endif
                        @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                            <a href="{{ url('/bargraph') }}" class="btn btn-small btn-info iframe"><span
                                    class="glyphicon glyphicon-plus-sign"></span> BarGraph</a>
                            @endauth
                        </div>
                        @endif
                        @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                            <a href="{{ url('/linegraph') }}" class="btn btn-small btn-info iframe"> LineGraph</a>
                            @endauth
                        </div>
                        @endif
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection