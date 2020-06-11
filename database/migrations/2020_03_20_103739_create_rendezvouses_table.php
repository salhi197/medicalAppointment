<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRendezvousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendezvouses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');            
            $table->integer('id_medecin')->unsigned();
            #$table->foreign('id_medecin')->references('id')->on('medecins');
            $table->text('motif');
            $table->text('remarque');
            $table->integer('montant');
            $table->boolean('etat_payment');    
            $table->string('status')->default(0);    
            $table->date('date_rdv');
            $table->string('creneau');            
            /**
             * date et heure sans dans le timestamps
             */
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
        Schema::dropIfExists('rendezvouses');
    }
}
