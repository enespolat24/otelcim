@extends('layouts.layout')

@section('content')

<div style="height: 10em; background-color: rgb(202, 79, 79)"></div>
<div class="row g-5 p-4">
    <div class="col-md-8 py-4">

        {{-- <img src="{{ asset(" assets/img/ilan/". $photos->photos[0]->name) }}" style=""> --}}

        <div style="">
            <form action="/ilan-fotograf-guncelle" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$ilan->id}}">
                <div class="d-flex">
                    <div>
                        <img class="w-10 h-10" src="{{$firstPhoto}}" alt="" style="object-fit:cover;" height="100" width="100"><br/>
                        <label for="firstPhoto"> İlk Görsel</label><br />
                        <input type="file" name="firstPhoto" ">
                    </div>
                    <div class="p-4"></div>
                    <div>
                        <div>
                        <img class="w-10 h-10" src="{{$secondPhoto}}" alt=""  height="100" width="100"
                            style="object-fit:cover;"><br/>
                        </div>
                        <label for="firstPhoto"> ikinci Görsel</label><br />
                        <input type="file" name="secondPhoto" ">
                    </div>
                    <div class="p-4"></div>
                    <div>
                        <img class="w-10 h-10" src="{{$thirdPhoto}}" alt=""  height="100" width="100"
                            style="object-fit:cover;"><br />
                        <label for="firstPhoto"> üçüncü Görsel</label><br />
                        <input type="file" name="thirdPhoto" ">
                    </div>
                </div>
                <button class="btn btn-success mt-3" type="submit">Görselleri güncelle</button>
            </form>
        </div>
        <div class="m-5">
            <form action="/ilan-baslik-aciklama-guncelle/{{$ilan->id}}" method="POST">
                @csrf
                {{-- <h1 class="mt-2 text-center"
                    style="margin-top: 1em!important; margin-left: 3rem; font-family: 'Courier New', Courier, monospace">
                    {{$ilan->baslik}}</h1> --}}
                <label for="baslik">İlan Başlığı</label>
                <input type="text" class="form-control mb-5" id="baslik" name="baslik" value="{{$ilan->baslik}}">
                <label for="baslik">Şehir</label>
                <input type="text" class="form-control mb-5" id="sehir" name="sehir" value="{{$ilan->sehir}}">
                <label for="baslik">İlçe</label>
                <input type="text" class="form-control mb-5" id="ilce" name="ilce" value="{{$ilan->ilce}}">
                <label for="baslik">Adres</label>
                <input type="text" class="form-control mb-5" id="adres" name="adres" value="{{$ilan->adres}}">
                <label for="baslik">İlan Açıklaması</label>
                <textarea class="form-control" id="aciklama" rows="10" name="aciklama">{{$ilan->aciklama}}</textarea>
                <button type="submit" class="btn btn-success mt-4">GÜNCELLE</button>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4 text-center p-2">
            <h1>{{$ilan->fiyat}} - Geceliği</h1>
            <form method="POST" action="/ilan-fiyat-guncelle">
                @csrf
                <input type="hidden" name="id" value="{{$ilan->id}}">
                <input type="text" name="fiyat" id="fiyat" value="{{$ilan->fiyat}}" placeholder="fiyatı giriniz">

                <button type="submit" class="mt-2 btn btn-success">fiyat güncelle</button>
            </form>
        </div>



        <div class="position-sticky" style="top: 2rem;">

            @foreach ($questions as $q)
            <div class="card mb-4">
                <div class="card-body">
                    <img src="{{ Gravatar::get($q->user->email) }}" alt=""
                        style="border-radius: 50%; height:40px; martin-bottom:-100px; display:inline">
                    <p style="display:inline; font-size: 17px;" class="small mb-0 ms-2">{{$q->user->name}}</p>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <p style="font-size: 20px">{{$q->message}}</p>
                        </div>
                    </div>
                    @if(empty($q->answer))

                    <form method="POST" action="/cevap-ekle">
                        @csrf
                        <input type="hidden" name="id" value="{{$q->id}}">
                        <input class="form-control" type="text" name="answer" id="answer">

                        <button type="submit" class="btn btn-danger mt-2">cevapla</button>
                    </form>
                    @endif

                    @if($q->answer)
                    <div class="card mb-4 bg-success text-white">
                        <div class="card-body">
                            <p>{{$q->answer}}</p>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <p class="small mb-0 ms-2">Otel Yetkilisinin Cevabı</p>
                                </div>

                            </div>
                        </div>

                    </div>
                    @endif

                </div>





            </div>

            @endforeach

        </div>
    </div>
</div>
@endsection
