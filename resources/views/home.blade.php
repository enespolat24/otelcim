@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container" style="width: 300px; margin-bottom: 20px;">
    <div class="row">
        <a href="#" class="col-sm btn btn-success" style="border-radius: 200px;">ilan ekle</a>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            @foreach ($ilan as $ilan)
            <div class="col-sm">
                <div class="card mb-4" style="background-color: rgb(250, 233, 233);">
                    <div class="card-header">
                        <h3>{{$ilan->baslik}}</h3>
                    </div>

                    <div class="card-body col-lg-4">
                        <div class="mb-2">
                            <h4>{{$ilan->aciklama}}</h4>
                            <h5>{{$ilan->fiyat}}</h5>
                        </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-danger">Sil</button>
                        <button type="button" class="btn btn-warning">düzenle</button>
                        <button type="button" class="btn btn-secondary">Right</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
