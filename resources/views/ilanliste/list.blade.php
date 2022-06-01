@extends('layouts.layout')


@section('content')
<div class="" style="padding: 70px; background-color:#913434;"></div>
<div>
    <div class="row pb-3 text-center w-100">
        @foreach($ilan as $item)
        <div class="col-sm-3 p-4">
            <div class="card">
                <div class="panel-heading preview" >
                    <img class="w-100" src="{{ asset("assets/img/ilan/".$item->photos[0]->name) }}"
                    style="overflow: hidden; height:230px!important; object-fit:cover;">
                </div>
                <div class="panel-body text-center">
                    <img class="img-circle avatar-small mt-4" height="70px" style="border-radius: 50%;"
                        src="{{ Gravatar::get($item->user->email) }}" alt="">
                    <h3>{{ $item->baslik }}</h3>
                </div>
                <div class="card-block text-center">
                    <h3 class="card-title">{{$item->fiyat}}</h3>
                    <p class="card-text">{{Str::limit($item->aciklama, 50)}}</p>
                    <a href="/detay/{{$item->id}}" class="btn btn-secondary mb-4"
                        style="background-color: #913434!important; border-color:#913434;">DETAYLAR</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
