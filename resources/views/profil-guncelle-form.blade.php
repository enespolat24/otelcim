@extends('layouts.app')


@section('content')
<div style="padding: 90px; background-color:#913434;"></div>
<div class="container -danger" style="margin-top: 100px;"><strong class="text-danger">Şifre güncelleme</strong>
    <form class="form-horizontal container mt-2" method="POST" action="{{ " /change-password" }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
            <label for="new-password" class="col-md-4 control-label">Güncel Şifre</label>

            <div class="col-md-6">
                <input id="current-password" type="password" class="form-control mt-2" name="current-password" required>

                @if ($errors->has('current-password'))
                <span class="help-block">
                    <strong>{{ $errors->first('current-password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
            <label for="new-password" class="col-md-4 control-label">Yeni Şifre</label>

            <div class="col-md-6">
                <input id="new-password" type="password" class="form-control mt-2" name="new-password" required>

                @if ($errors->has('new-password'))
                <span class="help-block">
                    <strong>{{ $errors->first('new-password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="new-password-confirm" class="col-md-4 control-label mt-2">Yeni Şifreyi Doğrula</label>

            <div class="col-md-6">
                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation"
                    required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success mt-2">
                    Şifreyi Güncelle
                </button>
            </div>
        </div>
    </form>
</div>
<div class="container mt-3 text-danger">
<label>İsim güncelle</label>
<div class="">
    <form class="form-horizontal container mt-4" method="POST" action="{{ " /change-name" }}">
        {{ csrf_field() }}
        <input type="text" class="form-control w-50" name="email" value="{{$user->name}}">
        <button class="btn btn-success mt-3 mb-3" type="submit">Güncelle</button>
    </form>

</div>
</div>
<div style="padding:70px;"></div>
@endsection
