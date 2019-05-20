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
                    Welcome {{ Auth::user()->name }}
                     are successfully logged in!
                    <div class="flex-center position-ref full-height">
                        @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                            <a href="{{ url('/dropdownlist') }}">order</a>
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