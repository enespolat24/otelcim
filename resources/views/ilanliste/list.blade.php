@extends('layouts.layout')


@section('content')
<div class="bg-danger" style="padding: 70px;"></div>
<div style="background: rgb(194, 192, 192);">
    @foreach($ilan as $item)
    <div class="col-sm-6 d-flex pb-3 text-center">
        <div class="card card-inverse card-danger mt-2">
            <div class="panel-heading preview">
                <img src="{{ asset("assets/img/ilan/".$item->photos[0]->name) }}" height="300px" width="300px"
                style="border-radius: 25px; overflow: hidden">
            </div>
            <div class="panel-body text-center">
                <img class="img-circle avatar-small mt-4" height="70px" style="border-radius: 50%;"
                    src="{{ Gravatar::get($item->user->email) }}" alt="">
                <h3>{{ $item->baslik }}</h3>
            </div>
            <div class="card-block text-center">
                <h3 class="card-title">{{$item->fiyat}}</h3>
                <p class="card-text">{{Str::limit($item->aciklama, 50)}}</p>
                <a href="/detay/{{$item->id}}" class="btn btn-secondary mb-2">DETAYLAR</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
