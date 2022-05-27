<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket', 100);
            $table->string('harga_paket', 20);
            $table->string('jumlah_paket', 100);
            $table->text('ket_paket');
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
        Schema::dropIfExists('gym');
    }
}
