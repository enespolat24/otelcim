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
        Schema::create('rezervasyons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('fiyat');
            $table->integer('user_id')->unsigned();
            $table->integer('ilan_id')->unsigned();
            $table->integer('kisi_sayisi');
            $table->date('baslangic_tarihi',6);
            $table->date('bitis_tarihi',6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rezervasyons');
    }
};
