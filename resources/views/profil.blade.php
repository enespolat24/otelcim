@extends('layouts.app')
@section('content')
<div class="bg-success" style="padding: 100px;"></div>
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img src="{{Gravatar::get(Auth::user()->email)}}" alt="..." width=300>
                                <a class="btn btn-warning">Profili düzenle</a>
                            </div>
                            <p></p>
                            <div class="col-lg-6 px-xl-10">
                                <div class="d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-dark mb-0">{{Auth::user()->name}}</h3>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <br>
                                    @if(Auth::user()->phone)
                                    <li class="display-28"><span
                                            class="display-26 text-secondary me-2 font-weight-600">Telefon:</span>
                                        {{Auth::user()->phone}}</li>
                                    @else
                                    <li class="display-28"><span
                                            class="display-26 text-secondary me-2 font-weight-600">Telefon:</span>
                                        lütfen hesabınıza telefon numaranızı ekleyin</li>
                                    @endif
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="text-success">
                    <p>ilanlarınız</p>
                </div>
                @if(Auth::user()->ilan->count() > 0)
                @php
                $ilan = Auth::user()->ilan
                @endphp
                <ul style="list-style: none;">
                @foreach ($ilan as $item)
                    <li><a href="/ilan-edit/{{$item->id}}">{{$item->baslik}}</a></li>
                @endforeach
                </ul>
                @else
                Hiç ilanınız yok
                @endif
            </div>

        </div>
    </div>
</section>
@endsection
