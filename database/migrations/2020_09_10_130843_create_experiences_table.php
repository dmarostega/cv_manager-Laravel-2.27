<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('company_id')->nullable();

            $table->string('office');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('job_type_id')->nullable();
            $table->timestamp('period_init')->nullable();
            $table->timestamp('period_end')->nullable();
            $table->string('company')->nullable();
            $table->string('local')->nullable();
            $table->tinyInteger('is_actual')->nullable();            
            $table->timestamps();
          
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropForeign(['profile_id','company_id']);
        });
        
        Schema::dropIfExists('experiences');
    }
}
