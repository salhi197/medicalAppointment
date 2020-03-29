<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soins', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('nom', 100);
            $table->text('description');
            $table->unsignedInteger('id_medecin');
            $table->foreign('id_medecin')->references('id')->on('medecins');
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
        Schema::dropIfExists('soins');
    }
}
