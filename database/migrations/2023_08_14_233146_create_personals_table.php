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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); 
            $table->string('dni')->nullable(); 
            $table->enum('jerarquia',array('Contratista','Gerente general','Vicepresidente','Superintendente','Jefe','Supervisor','Analista','Auxiliar','Worker','Practicante','Asistente','Conductor','Gerente','Jefe general','Linea RPC'))->nullable();
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
        Schema::dropIfExists('personals');
    }
};
