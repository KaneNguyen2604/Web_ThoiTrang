<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('alias');
            $table->integer('price');
            $table->text('intro');
            $table->longtext('content');
            $table->string('image');
            $table->string('keywords');
            $table->string('description');
            $table->integer('featured')->default(0);//Sản phẩm noiit bật
            $table->integer('views')->default(0);// số lược xem
            $table->integer('user_id')->unsigned();//khong duoc la so am
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //tao khoa ngoai lien ket voi user ;ondelete Xoá bản user bên đây mất luôn
            $table->integer('cate_id')->unsigned();//khong duoc la so am
            $table->foreign('cate_id')->references('id')->on('cates')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
