<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "wmTaxon@index");

Route::get("/get_phylum_by_parent/{parent_id}", "wmTaxon@get_phylum_by_parent");
Route::get("/get_class_by_parent/{parent_id}", "wmTaxon@get_class_by_parent");
Route::get("/get_order_by_parent/{parent_id}", "wmTaxon@get_order_by_parent");
Route::get("/get_familia_by_parent/{parent_id}", "wmTaxon@get_familia_by_parent");
Route::get("/get_genus_by_parent/{parent_id}", "wmTaxon@get_genus_by_parent");
Route::get("/get_species_by_parent/{parent_id}", "wmTaxon@get_species_by_parent");