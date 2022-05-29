@extends('layouts.app')

@section('content')
<div class="bg-secondary" style="padding: 60px;"></div>
    <div class="container text-center" style="margin-top: 150px; margin-bottom:200px; width:500px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-dark" style="background-color: rgb(231, 229, 168)">
                    <div class="card-header">{{ __('Email adresinizi onaylayın') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('yeni bir email adresi gönderildi') }}
                        </div>
                        @endif

                        {{ __('Devam etmeden önce, lütfen bir doğrulama bağlantısı için e-postanızı kontrol edin.') }}
                        </br>
                        </br>
                        {{ __('Eğer email size ulaşmadıysa') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Yeni bir tane
                                göndermek için tıklayın') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
