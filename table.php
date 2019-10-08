public function filterTaxon() {


Schema::create('kingdoms_tbl', function (Blueprint $table) {
    $table->increments('id');
    $table->string('kingdom_name');
    $table->timestamps();
    
});
Schema::create('phylums_tbl', function (Blueprint $table) {
    $table->increments('id');
    $table->string('phylum_name');
    $table->integer('kingdom_id');
    $table->timestamps();            
    
});
Schema::create('classes_tbl', function (Blueprint $table) {
    $table->increments('id');
    $table->string('class_name');
    $table->integer('phylum_id');
    $table->timestamps();
                          
    
});

Schema::create('orders_tbl', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('order_name');
    $table->integer('classes_id');
    $table->timestamps();
    
});

Schema::create('familia_tbl', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('familia_name');
    $table->integer('order_id');
    $table->timestamps();
    
});

Schema::create('genus_tbl', function (Blueprint $table) {
   $table->bigIncrements('id');
   $table->string('genus_name');
   $table->integer('familia_id');
   $table->timestamps();
});

Schema::create('species_tbl)', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string('species_name');
    $table->integer('genus_id');
    $table->timestamps();
    
});

Schema::create('vernacular_tbl', function (Blueprint $table) {
    $table->bigIncrements('id');
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
Schema::drop('kingdoms_tbl');
Schema::drop('phylums_tbl');
Schema::drop('classes_tbl');
Schema::drop('orders_tbl');
Schema::drop('familia_tbl');
Schema::drop('genus_tbl');
Schema::drop('species_tbl');
Schema::drop('vernacular_tbl');
}
}