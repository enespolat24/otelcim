<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ilanlar', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('baslik');
            $table->longText('aciklama');
            $table->string('fiyat');
            $table->string('sehir');
            $table->string('ilce');
            $table->string('adres');
            $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ilanlar');
    }
};
