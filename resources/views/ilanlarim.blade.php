@extends('layouts.layout')

@section('content')
<div style="background-color:#913434; padding:80px;"></div>
<div class="text-center">
<a class="btn btn-success mt-2" href="ilan-ekle">ILAN OLUŞTUR</a>
</div>
<div class="row mt-4 pb-3 text-center w-100">
    @if( count($ilanlar) < 1 ) <div class="text-center">
        <h1 class="text-danger mt-5" style="margin-bottom: 400px;">Hiç İlanınız Yok</h1>
        <div>
        </div>
    @else
    @foreach ($ilanlar as $item)
    @php
        $first_img = $item->getMedia();
        $img = $first_img[0]->getUrl();
    @endphp
    <div class="col-sm-3 p-4" style="border-radius: 10px;">
        <div class="card">
            <div class="card-block">
                <div class="panel-heading preview" >
                    <img class="w-100" src="{{ asset($img) }}"
                    style="overflow: hidden; height:230px!important; object-fit:cover;">
                </div>
                <h4 class="card-title text-success">{{$item->baslik}}</h4>
                <h6 class="card-subtitle text-danger">fiyat : {{$item->fiyat}}</h6>
                <p class="card-text p-y-1">Şehir : {{$item->sehir}} </p>
            </div>
            <a href="ilan-edit/{{$item->id}}" type="submit" class="btn btn-warning" style="">ilanı düzenle</a>
            <a href="/detay/{{$item->id}}" class="btn btn-secondary">Odayı görüntüle</a>
        </div>
    </div>

    @endforeach
    @endif
</div>
@endsection
