@extends('layouts.app')
@section('content')
<div style="background-color:#913434; padding:80px;"></div>
<div class="text-center">
<a class="btn btn-success mt-2" href="ilan-ekle">ILAN OLUŞTUR</a>
</div>
<div class="row mt-4 pb-3 text-center w-100">
    @foreach ($ilanlar as $item)
    <div class="col-sm-3 p-4" style="border-radius: 10px;">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title text-success">{{$item->baslik}}</h4>
                <h6 class="card-subtitle text-danger">fiyat : {{$item->aciklama}}</h6>
                <p class="card-text p-y-1">kişi sayısı : {{$item->fiyat}} </p>
            </div>
            <a href="ilan-edit/{{$item->id}}" type="submit" class="btn btn-warning" style="">ilanı düzenle</a>
            <a href="/detay/{{$item->id}}" class="btn btn-secondary">Odayı görüntüle</a>
        </div>
    </div>

    @endforeach
</div>
@endsection
