<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLookupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sbwm_actor_selection', function (Blueprint $table) {
            $table->string('actor-selection', 100)->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_composition_surveyed', function (Blueprint $table) {
            
            $table->string('composition', 100)->nullable()->default('text');
            $table->text('description')->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_country', function (Blueprint $table) {
            $table->string('code', 100)->nullable()->default('text');
            $table->string('country', 100)->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_curency', function (Blueprint $table) {
            $table->string('currency', 100)->nullable()->default('text');
            $table->string('description', 100)->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_data_resolution', function (Blueprint $table) {
            $table->string('data_resolution', 100)->nullable()->default('text');
            $table->string('description', 100)->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_education_level', function (Blueprint $table) {
            
            $table->string('level', 100)->nullable()->default('text');
            $table->string('description', 100)->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_ethnicity', function (Blueprint $table) {
            $table->string('ethnicity', 100)->nullable()->default('text');
            $table->string('description', 100)->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_harvest_acquisition', function (Blueprint $table) {
            
            $table->string('harvest-acquisition', 100)->nullable()->default('text');
            $table->string('description', 100)->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_harvest_condition', function (Blueprint $table) {
            $table->string('harvest-condition', 100)->nullable()->default('text');
            $table->string('description', 100)->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_harvest_use', function (Blueprint $table) {
            $table->string('harvest-use', 100)->nullable()->default('text');
            $table->string('description', 100)->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_hunting_area', function (Blueprint $table) {
            $table->string('method', 100)->nullable()->default('text');
            $table->string('description', 100)->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_hunt_method', function (Blueprint $table) {
            $table->string('hunt_method', 100)->nullable()->default('text');
            $table->string('description', 100)->nullable()->default('text');
            $table->timestamps();
        });

        Schema::create('sbwm_life_stage', function (Blueprint $table) {
            
            $table->string('life-stage', 100)->nullable()->default('text');
            $table->string('description', 100)->nullable()->default('text');
            $table->timestamps();

        });

        Schema::create('sbwm_wildmeat', function (Blueprint $table) {
            $table->integer('studyID')->unsigned()->nullable()->default(12);
            $table->integer('sampleID')->unsigned()->nullable()->default(12);
            $table->bigInteger('speciesID')->nullable()->default(12);
            
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
        Schema::dropIfExists('lookup');
    }
}
