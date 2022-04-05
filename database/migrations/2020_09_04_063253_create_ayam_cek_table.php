<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyamCekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayam_cek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kandang_detail_id');
            $table->integer('ayam_mati');
            $table->integer('ayam_sakit');
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
        Schema::dropIfExists('ayam_cek');
    }
}
