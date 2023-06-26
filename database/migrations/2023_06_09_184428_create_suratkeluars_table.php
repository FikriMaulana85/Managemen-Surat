<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratkeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratkeluars', function (Blueprint $table) {
            $table->id();
            $table->integer("id_divisi");
            $table->integer("id_jenis_surat");
            $table->string("nomor_agenda", 25);
            $table->string("nomor_surat_keluar", 25);
            $table->string("kepada_surat_keluar", 50);
            $table->text("deskripsi_surat_keluar");
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
        Schema::dropIfExists('suratkeluars');
    }
}
