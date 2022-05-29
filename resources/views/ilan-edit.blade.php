@extends('layouts.layout')



<div style="height: 10em; background-color: rgb(202, 79, 79)"></div>
<div class="row g-5 p-4">
    <div class="col-md-8 py-4">

        {{-- <img src="{{ asset(" assets/img/ilan/". $photos->photos[0]->name) }}" style=""> --}}


        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset("assets/img/ilan/". $photos->photos[0]->name) }}" style="" height="600px">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset("assets/img/ilan/". $photos->photos[1]->name) }}" style="" height="600px">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset("assets/img/ilan/". $photos->photos[2]->name) }}" style="" height="600px">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="color: red;"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <h1 class="mt-2 text-center" style="margin-top: 1em!important; margin-left: 3rem; font-family: 'Courier New', Courier, monospace">{{$ilan->baslik}}</h1>
        <h5 class="px-4" style="font-family: 'Courier New', Courier, monospace;">{{$ilan->aciklama}}</h5>

    </div>

    <div class="col-md-4">
        <div class="card mb-4 text-center p-2">
            <h1>{{$ilan->fiyat}} - Geceliği</h1>
            <form method="POST" action="/ilan-guncelle/{{$ilan->id}}">
                @csrf
                <input type="hidden" name="id" value="{{$ilan->id}}" required>
                <input type="hidden" name="baslik" value="{{$ilan->baslik}}" required>
                <input type="hidden" name="" value="{{$ilan->id}}" required>
                <input type="hidden" name="id" value="{{$ilan->id}}" required>
                <input type="text" name="fiyat" id="fiyat"  required>

                <button type="submit">fiyat güncelle</button>
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
                        <input type="text" name="answer" id="answer">

                        <button type="submit">cevapla</button>
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
