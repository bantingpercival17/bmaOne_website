@extends('auth.layout')
@section('pageTitle', 'Registration')
@section('content')

<div class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <div>
                <img class="watermark" src="{{ asset('assets/image/bma-logo-1.png') }}" alt="BMA">
            </div>
           
            <a href="/login" class="bma-font"><b>BALIWAG MARITIME ACADEMY</b></a>
        </div>
        <div class="card bma-font-body">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new Inquirer</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                            value="{{ old('first_name') }}" required autocomplete="name" autofocus placeholder="Firstname">

                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                            value="{{ old('last_name') }}" required autocomplete="name" autofocus  placeholder="Lastname">

                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="name" autofocus placeholder="Email" >

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('contact_number') is-invalid @enderror"
                            name="contact_number" value="{{ old('contact_number') }}" required autocomplete="name" autofocus placeholder="Contact Number">

                        @error('contact_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="/login" class="text-center">I already have account</a>
            </div>
            </form>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</div>



{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                    value="{{ old('first_name') }}" required autocomplete="name" autofocus>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    @enderror
            </div>

        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                    value="{{ old('lastname') }}" required autocomplete="name" autofocus>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('contact_number') is-invalid @enderror"
                    name="contact_number" required>

                @error('contacct_numer')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
@endsection