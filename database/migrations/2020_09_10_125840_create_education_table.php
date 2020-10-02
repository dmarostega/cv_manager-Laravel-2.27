<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institution_id')->nullable();            
            $table->unsignedBigInteger('profile_id');

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('institution')->nullable(); //Nome aleatorio da instituião
            $table->string('formation')->nullable(); // Graduação/Mestrado etc
            $table->string('study_area')->nullable(); // Admninistração tecnologia
            $table->text('activities')->nullable();
            $table->double('note')->nullable();            
            $table->timestamp('period_init');
            $table->timestamp('period_end');            
            $table->timestamps();
            
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('institution_id')->references('id')->on('institutions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('education', function (Blueprint $table) {
            $table->dropForeign('profile_id');
            $table->dropForeign('institution_id');
        });

        Schema::dropIfExists('education');
    }
}
