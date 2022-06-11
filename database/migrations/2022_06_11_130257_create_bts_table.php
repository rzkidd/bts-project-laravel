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
        Schema::create('bts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->foreignId('jenis_bts_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('tinggi_tower');
            $table->integer('panjang_tanah');
            $table->integer('lebar_tanah');
            $table->boolean('ada_genset');
            $table->boolean('ada_tembok_batas');
            $table->foreignId('pemilik_id');
            $table->foreignId('wilayah_id');
            $table->foreignId('created_by');
            $table->foreignId('edited_by');
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
        Schema::dropIfExists('bts');
    }
};
