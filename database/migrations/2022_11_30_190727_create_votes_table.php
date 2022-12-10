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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('teacher_id')->constrained();
            $table->tinyInteger('comunicacion');
            $table->tinyInteger('conocimiento');
            $table->tinyInteger('metodologia');
            $table->tinyInteger('recursos');
            $table->tinyInteger('evaluacion');
            $table->tinyInteger('tarea');
            $table->tinyInteger('empatia');
            $table->tinyInteger('puntualidad');
            $table->tinyInteger('atencion');
            $table->tinyInteger('voto');
            $table->softDeletes();
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
        Schema::dropIfExists('votes');
    }
};
