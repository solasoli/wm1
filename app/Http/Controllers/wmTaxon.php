<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Form;
use App\Kingdom;
use App\Phylum;
use App\Classes;
use App\Order;
use App\Family;
use App\Genus;
use App\Species;

class wmTaxon extends Controller
{

    public function index() {
        $kingdoms = Kingdom::all();
        return view('filter',[
            'kingdom' => $kingdoms
        ]);
    }

    public function kingdoms() 
    {
        $kingdoms = DB::table('kingdom_tbl')->pluck("kingdom_name", "id");
        return view('kingdoms',compact('kingdom_tbl'));
    }

    public function get_phylum_by_parent( Request $request, $parent_id) 
    {

        $phylums = [];
        if($parent_id > 0){
            $phylums = Phylum::select(DB::raw("id, phylum_name as name"))->where("kingdom_id", $parent_id)->get();
        }

        return response()->json(['data'=>$phylums]);
    }

    public function getPhylums( Request $request) 
    {
        $phylums = DB::table('phylums_tbl')
        ->where("kingdom_id", $request->kingdom_id)
        ->pluck("phylum_name", "id");
        return response()->json($phylums);
    }

    public function get_class_by_parent( Request $request, $parent_id) 
    {
        $classes = Classes::select(DB::raw("id, class_name as name"))->where("phylum_id", $parent_id)->get();
        return response()->json(['data'=>$classes]);
    }

    public function getClasses( Request $request) 
    {
        $classes = DB::table('classes_tbl')
        ->where("phylum_id", $request->phylum_id)
        ->pluck("class_name", "id");
        return response()->json($classes);
    }

    public function get_order_by_parent( Request $request, $parent_id) 
    {
        $order = [];
        if($parent_id > 0){
            $order = Order::select(DB::raw("id, order_name as name"))->where("classes_id", $parent_id)->get();
        }
        return response()->json(['data'=>$order]);
    }

    public function getOrders( Request $request) 
    {
        $orders = DB::table('orders_tbl')
        ->where("classes_id", $request->classes_id)
        ->pluck("orders_name", "id");
        return response()->json($orders);
    }

    public function get_familia_by_parent( Request $request, $parent_id) 
    {
        $familia = [];
        if($parent_id > 0){
            $familia = Family::select(DB::raw("id, familia_name as name"))->where("order_id", $parent_id)->get();
        }
        return response()->json(['data'=>$familia]);
    }

    public function getFamilia( Request $request) 
    {
        $orders = DB::table('familia_tbl')
        ->where("order_id", $request->order_id)
        ->pluck("familia_name", "id");
        return response()->json($orders);
    }

    public function get_genus_by_parent( Request $request, $parent_id) 
    {
        $genus = [];
        if($parent_id > 0){
            $genus = Genus::select(DB::raw("id, genus_name as name"))->where("familia_id", $parent_id)->get();
        }
        return response()->json(['data'=>$genus]);
    }

    public function getGenus( Request $request) 
    {
        $orders = DB::table('genus_tbl')
        ->where("familia_id", $request->familia_id)
        ->pluck("genus_name", "id");
        return response()->json($orders);
    }

    public function get_species_by_parent( Request $request, $parent_id) 
    {
        $species = [];
        if($parent_id > 0){
            $species = Species::select(DB::raw("id, species_name as name"))->where("genus_id", $parent_id)->get();
        }
        return response()->json(['data'=>$species]);
    }

    public function getSpecies( Request $request) 
    {
        $orders = DB::table('species_tbl')
        ->where("genus_id", $request->genus_id)
        ->pluck("species_name", "id");
        return response()->json($orders);
    }
}
