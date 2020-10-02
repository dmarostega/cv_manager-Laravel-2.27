<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('profile_id');
            $table->string('public_place')->nullable();
            $table->integer('number')->nullable();
            $table->string('complement',250)->nullable();
            $table->string('district')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('title')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('is_main')->nullable()->default(0);
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign('city_id');
            $table->dropForeign('profile_id');
        });
        
        Schema::dropIfExists('addresses');
    }
}
