@extends('layouts.layout')
@section('content')
<div style="height: 200px; background-color: #913434 "></div>
<div style="background-color: #913434">
    <div class="container" style="background-color: #913434;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 style="color: #fff">{{ __('Register') }}</h1>
                <div class="card" style="background: rgba(255, 255, 255, 0.521); border-radius: 18px;">

                    <div class="card-body text-center">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">İsim Soyisim</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email Adresi</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Şifre</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Şifreyi Doğrula</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="">
                                <input class="form-check-input mr-2" type="checkbox" name="manager" id="manager">
                                <label class="form-check-label ml-2">Otel Yöneticisi olarak başvurmak istiyorum</label>
                            </div>

                            <div class="row mb-0 ">
                                <div class="col-md-6 offset-md-4 ">
                                    <button type="submit" class="btn btn-primary mt-3"
                                        style="background: #913434; border-color: #913434">
                                        Kayıt Ol
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
<div style="height: 200px; background-color: #913434"></div>
@endsection
