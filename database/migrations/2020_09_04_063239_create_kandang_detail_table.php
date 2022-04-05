<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKandangDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kandang_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('suplier_id');
            $table->foreignId('kategori_id');
            $table->foreignId('kandang_id');
            $table->integer('jumlah_awal');
            $table->integer('jumlah_akhir')->nullable();
            $table->text('keterangan');
            $table->enum('status',['terpanen','diternak']);
            $table->softDeletes();
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
        Schema::dropIfExists('kandang_detail');
    }
}
