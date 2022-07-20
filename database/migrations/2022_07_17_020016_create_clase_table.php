<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('sede_id');
            $table->unsignedBigInteger('tipo_clase_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            $table->foreign('sede_id')->references('id')->on('sede');
            $table->foreign('tipo_clase_id')->references('id')->on('tipo_clase');
            $table->foreign('categoria_id')->references('id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clase');
    }
}
