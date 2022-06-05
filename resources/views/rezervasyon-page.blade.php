@extends('layouts.layout')


@section('content')
<div style="padding: 80px; background-color: #913434"></div>
<div class="py-5">
    <div class="container">
        @foreach ($rezervasyon as $item)
        <div class="row py-2 mx-auto">

            <div class="col-md-5 mx-auto w-50" style="border-radius: 10px;">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title text-success">{{$item->ilan->baslik}}</h4>
                        <h6 class="card-subtitle text-danger">fiyat : {{$item->fiyat}}</h6>
                        <p class="card-text p-y-1">kişi sayısı : {{$item->kisi_sayisi}} </p>
                    </div>
                    <form action="/rezervasyon-iptal/{{$item->id}}" method="post" class="">
                        @csrf
                        <button type="submit" class="btn btn-danger">Rezervasyonu Sil</button>
                        <a href="/detay/{{$item->ilan->id}}" class="btn btn-warning">Odayı görüntüle</a>
                    </form>
                </div>
            </div>

        </div>
        @endforeach
    </div>

</div>

@endsection
