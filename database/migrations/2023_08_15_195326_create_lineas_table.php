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
        Schema::create('lineas', function (Blueprint $table) {
            $table->id();
            $table->string('linea'); 
            $table->enum('tipo',array('Usuario','Modem'));
            $table->string('plan'); 
            $table->string('precio')->nullable(); 
            $table->string('sim'); 
            $table->enum('sede',array('Lima','Huancayo','Tuctu','Kismillgs','EPCM','Truckshop'))->nullable();
            $table->enum('estado',array('Asignada','Libre','Cambio de titularidad','Préstamo'))->nullable();
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
        Schema::dropIfExists('lineas');
    }
};
