@extends('layouts.app')

@section('content')
<div style="height: 200px; background-color: #913434"></div>
<div style="background-color: #913434">
    <div class="container" style="max-width: 60%">
        <div class="row justify-content-center">
            <h1 style="color:#fff;" class="col-md-8">{{ __('Reset Password') }}</h1>
            <div class="col-md-8">
                <div class="card" style="background: rgba(255, 255, 255, 0.521); border-radius: 18px;">
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary text-white" style="background: #913434; color: #913434; border-color:#913434;">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
