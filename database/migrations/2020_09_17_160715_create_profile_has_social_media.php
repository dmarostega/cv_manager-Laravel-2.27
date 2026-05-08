<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileHasSocialMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_has_social_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('social_media_id');
            $table->string('link',200);            
            $table->timestamps();

            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('social_media_id')->references('id')->on('social_media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_has_social_media', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
            $table->dropForeign(['social_media_id']);
        });
        
        Schema::dropIfExists('profile_has_social_media');
    }
}
