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
        Schema::create('carts', function (Blueprint $table){
            $table->id();
//            $table->string('session_id');
            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')->references('id')->on('brockphotography_photos')->onDelete('cascade');
            $table->string('user_id');
            $table->string('name');
            $table->string('description');
            $table->decimal('price');
            $table->integer('quantity');
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
        //
    }
};
