<?php
 
namespace App\Http\Controllers;
 
use App\Publisher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
 
class PublisherController extends Controller{
	public function index(){
 
        $publishers  = Publisher::all();
 
        return response()->json($publishers);
 
    }

    public function getPublisher($id){
 
        $publisher  = Publisher::find($id);
 
        return response()->json($publisher);
    }

    public function savePublisher(Request $request){
    	$publisher = Publisher::create($request->all());

    	return response()->json($publisher);	
    }
}