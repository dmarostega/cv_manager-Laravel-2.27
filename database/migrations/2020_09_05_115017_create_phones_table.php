<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('phone_type_id');
            $table->unsignedInteger('profile_id');

            $table->integer('country_code')->default('55');
            $table->integer('area_code');
            $table->integer('number');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('is_main')->default(1);
            $table->timestamps();

            $table->foreign('phone_type_id')->references('id')->on('phone_types');
            $table->foreign('profile_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phones', function (Blueprint $table) {
           $table->dropForeign('phone_type_id');
           $table->dropForeign('profile_id');
        });
        
        Schema::dropIfExists('phones');
    }
}
