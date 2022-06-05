@extends('layouts.layout')
<div style="padding: 10em"></div>
<form action="/ilan-ekle-form" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="image container">
        <label><h4>Birinci görsel</h4></label>
        <input type="file" class="form-control w-50" required name="first-img" required>
        <label><h4>ikinci görsel</h4></label>
        <input type="file" class="form-control w-50" required name="second-img" required>
        <label><h4>üçüncü görsel</h4></label>
        <input type="file" class="form-control w-50" required name="third-img" required>

        <div class="mt-4"></div>
        <label class="mt-2"><h4> Başlık</h4></label>
        <input type="text" class="form-control w-50 mt-2" name="title" required>
        <label class="mt-2"> <h4>Açıklama</h4></label>
        <input type="text" class="form-control w-50 mt-2" name="aciklama" required>
        <label class="mt-2"> <h4>Fiyat (lütfen birimi belirtin. örneğin 100$)</h4></label>
        <input type="text" class="form-control w-50 mt-2" name="fiyat" required>

        <label class="mt-2"><h4>Şehir</h4></label>
        <input type="text" class="form-control w-25 mt-2" name="sehir" required>

        <label class="mt-2"><h4>İlçe</h4></label>
        <input type="text" class="form-control w-25 mt-2" name="ilce" required>
        <label><h4> Adres</h4></label>
        <textarea type="text" rows="5" class="form-control w-50 mt-2" name="adres" required></textarea>

        <div class="post_button mt-4">
            <button type="submit" class="btn btn-success">İlan Oluştur</button>
        </div>

    </div>


</form>
