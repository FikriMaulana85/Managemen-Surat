<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratmasuks', function (Blueprint $table) {
            $table->id();
            $table->integer("id_divisi");
            $table->integer("id_jenis_surat");
            $table->string("nomor_agenda", 25);
            $table->string("nomor_surat_masuk", 25);
            $table->string("sumber_surat_masuk", 50);
            $table->text("deskripsi_surat_masuk");
            $table->date("tanggal_surat");
            $table->string("file_surat", 50);
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
        Schema::dropIfExists('suratmasuks');
    }
}
