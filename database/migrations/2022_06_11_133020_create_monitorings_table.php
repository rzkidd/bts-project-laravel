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
        Schema::create('monitorings', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->foreignId('bts_id');
            $table->timestamp('tgl_generate');
            $table->date('tgl_kunjungan')->nullable();
            $table->foreignId('kondisi_bts_id');
            $table->foreignId('user_surveyor_id');
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
        Schema::dropIfExists('monitorings');
    }
};
