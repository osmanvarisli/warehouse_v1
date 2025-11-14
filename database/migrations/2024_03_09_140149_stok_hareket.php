<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StokHareket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_hareket', function (Blueprint $table) {
            $table->id();
            $table->integer('stok_id');
            $table->tinyInteger('islem');//stok girmiş mi çıkış mı
            $table->integer('urun_id');
            $table->integer('adet');
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
        //
    }
}
