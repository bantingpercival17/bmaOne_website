@extends('auth.layout')
@section('pageTitle', 'LOGIN')
@section('content')
<div class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <div>
                <img class="watermark" src="{{ asset('assets/image/bma-logo-1.png') }}" alt="BMA">
            </div>
            <a href="/login" class="bma-font"><b>BALIWAG MARITIME ACADEMY</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"></p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="client_code" type="text"
                            class="form-control @error('client_code') is-invalid @enderror" name="client_code" placeholder="Student Code"
                            value="{{ old('client_code') }}" required autocomplete="client_code" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-code"></span>
                            </div>
                        </div>
                        @error('client_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="row">

                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->

                    </div>
                    <p class="mb-0">
                        <a href="/register" class="text-center">Register a new membership</a>
                    </p>
                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>

@endsection