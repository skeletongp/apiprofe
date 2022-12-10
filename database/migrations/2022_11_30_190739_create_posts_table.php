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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->string('bg_color')->default('#000000');
            $table->string('text_color')->default('#ffffff');
            $table->enum('type',['question','post','image'])->default('post');
            $table->enum('status',['pendiente','resuelto'])->default('pendiente');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('university_id')->constrained();
            $table->foreignId('career_id')->nullable()->constrained();
            $table->foreignId('sede_id')->nullable()->constrained();
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
        Schema::dropIfExists('posts');
    }
};
