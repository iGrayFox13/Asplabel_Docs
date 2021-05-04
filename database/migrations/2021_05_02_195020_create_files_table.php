<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->enum('section',['Ingenieria civil','Ingenieria industrial','Ingenieria de sistemas','Ingenieria mecanica','Derecho','Fisioterapia']);
            $table->String('nombre');
            $table->text('code_name');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id');
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
        Schema::dropIfExists('files');
    }
}