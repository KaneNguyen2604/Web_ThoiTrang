<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser')->unsigned();//khong duoc la so am
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->integer('idNew')->unsigned();
            $table->foreign('idNew')->references('id')->on('news')->onDelete('cascade');
            $table->string('NoiDung');
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
        Schema::dropIfExists('comments');
    }
}
