<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Va nous permettent de crée la table
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenoms');
            $table->foreignId('classe_id')->constrained('classes');
            $table->timestamps();
        });

        //Permet d'activé les contrainte d'intrégriter sur les clé étranger
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

     //Va nous permettent de supprimer la table
    public function down()
    {
        Schema::table('etudiants', function(Blueprint $table){
            $table->dropForeign('classe_id');
        });
        Schema::dropIfExists('etudiants');
    }
}
