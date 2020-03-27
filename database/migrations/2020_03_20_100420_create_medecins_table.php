<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedecinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medecins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->date('date_naissance')->nullable();
            $table->integer('age')->nullable();
            $table->string('sexe')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telephone')->nullable();
            $table->string('objet')->nullable();
            $table->string('specilaite')->nullable();
            $table->longText('adresse')->nullable();
            $table->decimal('langitude')->nullable();
            $table->decimal('latitude')->nullable();
            $table->string('commune')->nullable();
            $table->string('wilyaya')->nullable();
            $table->longText('presentation')->nullable();
            $table->boolean('etat_payment')->default(false); //de payement
            $table->boolean('etat_compte')->default(false); //de payement
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
        Schema::dropIfExists('medecins');
    }
}
