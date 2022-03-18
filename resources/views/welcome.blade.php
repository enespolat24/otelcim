<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Otelcim</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<style>
    @media only screen and (max-width: 760px) {
        #img-card-customer {
            height: 200px;
        }

        #card-customer {
            width: 50px;
        }
    }
</style>

<body>

    @include('layouts.navbar')
    <!-- Banner Image  -->
    <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center"
        style="background-image: url({{ asset('assets/img/hotelbg.jpeg') }}); ">
        <div class="content text-center">
            <div style="padding: 0.5;">
                <h1 class="" style="color:#7e1313; ">Aradığınız Otel Burada</h1>
            </div>
        </div>
    </div>

    <div class=""
        style="height: 600px; max-height: 600px;  background-image: linear-gradient(to bottom right, rgb(117, 95, 95), rgb(245, 245, 245));">
        <div class="container">
            <div class="row text-center">
                <h1 style="margin-top: 100px;"> <span style="color:#7e1313;">O</span>telcim <br> olarak önceliğimiz otel kiralamadan önce aklınızdaki soruları otel yetkilisine mesaj yoluyla aklınıza takılabilecek her şeyi sorabilmenizi sağlamak</p>
            </div>



        </div>

    </div>

    <div style="height: 500px; background-color: rgb(165, 126, 126);">

        <div class="container">
            <div class="row">
                <h1 class="col sm text-center" style="margin-top: 200px;">Sen de Hemen <span style="color: #7e1313;">
                        O</span>tel aramak için<br><br><a href="/ilanliste"
                        style="color: #ffffff; font-size: 100px; font-family:  'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">TIKLA<span style="color: #7e1313;">!</span></a> </h1>
            </div>
        </div>
    </div>


    @include('layouts.footer')

    <!-- <div id="app">
        <navbar></navbar>
    </div> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
