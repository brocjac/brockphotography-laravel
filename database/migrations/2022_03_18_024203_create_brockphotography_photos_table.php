<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('brockphotography_photos', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('name');
            $table->decimal('price');
            $table->integer('CategoryId');
            $table->string('Height');
            $table->string('Width');
            $table->string('Aperture');
            $table->string('Exposer');
            $table->string('ISO');
            $table->string('FocalLength');
            $table->timestamps();
        });

        //once the table is created use a raw query to ALTER it and add the MEDIUMBLOB
        DB::statement("ALTER TABLE brockphotography_photos ADD image MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE brockphotography_photos ADD imageLarge MEDIUMBLOB NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brockphotography_photos');
    }
};
