@extends('layouts.layout')


@section('content')


        @foreach($ilan as $item)
            <div class="col-sm-4 d-flex pb-3 mt-2 text-center">
                <div class="card card-inverse card-danger">
                    <div class="panel-heading preview">
                        <img src="{{ asset("assets/img/ilan/". $item->photos[0]->name) }}" height="300px" width="300px" style="border-radius: 25px; overflow: hidden">
                    </div>
                    <div class="panel-body text-center">
                        <img class="img-circle avatar-small mt-4" height="70px" style="border-radius: 50%;" src="{{ Gravatar::get($item->user->email) }}" alt="">
                        <h3>{{ $item->baslik }}</h3>
                    </div>
                    <div class="card-block text-center">
                        <h3 class="card-title">{{$item->fiyat}}</h3>
                        <p class="card-text">{{$item->aciklama}}</p>
                        <a href="/chat/{{$item->user_id}}" class="btn btn-outline-warning">MESAJ GÖNDER</a>
                    </div>
                </div>
            </div>
        @endforeach

        @endsection
