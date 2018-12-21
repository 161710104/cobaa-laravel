<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_barang')->unsigned();
            $table->foreign('id_barang')
                  ->references('id')->on('barangs')
                  ->onDelete('CASCADE');
            $table->double('kuantitas')->unsigned();
            $table->integer('harga');
            $table->integer('total');
            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')
                  ->references('id')->on('customers')
                  ->onDelete('CASCADE');
            $table->integer('id_karyawan')->unsigned();
            $table->foreign('id_karyawan')
                  ->references('id')->on('users')
                  ->onDelete('CASCADE');
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
        Schema::dropIfExists('barang_keluars');
    }
}
