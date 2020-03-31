<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journees', function (Blueprint $table) {
            $table->integer('id');
            $table->string('jour');
            $table->integer('disponible');
            $table->time('heuredeb');
            $table->time('heurefin');
            $table->unsignedInteger('id_medecin');
            $table->foreign('id_medecin')->references('id')->on('medecins');
            $table->primary(['id', 'id_medecin']);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journees');
    }
}
