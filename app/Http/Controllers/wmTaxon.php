<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class wmTaxon extends Controller
{
    public function kingdoms() 
    {
        $kingdoms = DB::table('kingdom_tbl')->pluck("kingdom_name", "id");
        return view('kingdoms',compact('kingdom_tbl'));
    }


    public function getPhylums( Request $request) 
    {
        $phylums = DB::table('phylums_tbl')
        ->where("kingdom_id", $request->kingdom_id)
        ->pluck("phylum_name", "id");
        return response()->json($phylums);
    }

    public function getClasses( Request $request) 
    {
        $classes = DB::table('classes_tbl')
        ->where("phylum_id", $request->phylum_id)
        ->pluck("class_name", "id");
        return response()->json($classes);
    }

    public function getOrders( Request $request) 
    {
        $orders = DB::table('orders_tbl')
        ->where("classes_id", $request->classes_id)
        ->pluck("orders_name", "id");
        return response()->json($orders);
    }

    public function getFamilia( Request $request) 
    {
        $orders = DB::table('familia_tbl')
        ->where("order_id", $request->order_id)
        ->pluck("familia_name", "id");
        return response()->json($orders);
    }

    public function getGenus( Request $request) 
    {
        $orders = DB::table('genus_tbl')
        ->where("familia_id", $request->familia_id)
        ->pluck("genus_name", "id");
        return response()->json($orders);
    }

    public function getSpecies( Request $request) 
    {
        $orders = DB::table('species_tbl')
        ->where("genus_id", $request->genus_id)
        ->pluck("species_name", "id");
        return response()->json($orders);
    }
}
