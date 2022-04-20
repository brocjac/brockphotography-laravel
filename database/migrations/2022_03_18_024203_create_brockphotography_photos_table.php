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
            $table->string('Alt');
            $table->string('Title');
            $table->decimal('PhotoValuePrice');
            $table->integer('CategoryId');
//            $table->('Height');
//            $table->integer('Width');
            $table->timestamps();
        });

        //once the table is created use a raw query to ALTER it and add the MEDIUMBLOB
        DB::statement("ALTER TABLE brockphotography_photos ADD ImgSrc MEDIUMBLOB NULL");
        DB::statement("ALTER TABLE brockphotography_photos ADD LargeImgSrc MEDIUMBLOB NULL");

        //DB::statement();
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
