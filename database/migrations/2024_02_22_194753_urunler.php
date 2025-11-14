<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Urunler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunler', function (Blueprint $table) {
            $table->id();
            $table->string('urun_adi');
            $table->integer('birim');
            $table->string('barkod');
            
            $table->string('tedarikci_bilgileri');

            $table->text('aciklama');
            $table->integer('kategori_id');
            $table->string('resim');

            $table->string('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('urunler');
    }
}
