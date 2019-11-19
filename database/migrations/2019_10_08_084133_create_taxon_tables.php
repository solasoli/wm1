<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxonTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kingdoms_tbl', function (Blueprint $table) {
            
            $table->string('kingdom_name');
            $table->timestamps();
            
        });
        Schema::create('phylums_tbl', function (Blueprint $table) {
           
            $table->string('phylum_name');
            $table->integer('kingdom_id');
            $table->timestamps();            
            
        });
        Schema::create('classes_tbl', function (Blueprint $table) {
            
            $table->string('class_name');
            $table->integer('phylum_id');
            $table->timestamps();
                                  
            
        });
        
        Schema::create('orders_tbl', function (Blueprint $table) {
            
            $table->string('order_name');
            $table->integer('classes_id');
            $table->timestamps();
            
        });
        
        Schema::create('familia_tbl', function (Blueprint $table) {
           
            $table->string('familia_name');
            $table->integer('order_id');
            $table->timestamps();
            
        });
        
        Schema::create('genus_tbl', function (Blueprint $table) {
          
           $table->string('genus_name');
           $table->integer('familia_id');
           $table->timestamps();
        });
        
        Schema::create('species_tbl', function (Blueprint $table) {
           
            $table->string('species_name');
            $table->integer('genus_id');
            $table->timestamps();
            
        });
        
        Schema::create('vernacular_tbl', function (Blueprint $table) {
          
            $table->string('vernacular_name');
            $table->integer('species_id');
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
        Schema::dropIfExists('taxon_tables');
    }
}
