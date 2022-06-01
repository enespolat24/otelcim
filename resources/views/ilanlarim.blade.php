@extends('layouts.app')
@section('content')
<div style="background-color: rgb(183, 183, 40); padding:80px;"></div>
@foreach ($ilanlar as $item)
<div class="row py-2 mx-auto">

    <div class="col-md-5 mx-auto w-50" style="border-radius: 10px;">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title text-success">{{$item->baslik}}</h4>
                <h6 class="card-subtitle text-danger">fiyat : {{$item->aciklama}}</h6>
                <p class="card-text p-y-1">kişi sayısı : {{$item->fiyat}} </p>
            </div>
                <a href="ilan-edit/{{$item->id}}" type="submit" class="btn btn-success">ilanı düzenle</a>
                <a href="/detay/{{$item->id}}" class="btn btn-warning">Odayı görüntüle</a>
        </div>
    </div>

</div>
@endforeach
@endsection
