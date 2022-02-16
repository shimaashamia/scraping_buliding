<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilitie;
use App\Models\Home;
use Session;

class FacilitieController extends Controller
{
    function index(){

        $items=Facilitie::all();

   return view("admin.facilitie.index")->with("items",$items);
}

function create(){
     $homes = Home::all();
     return view("admin.facilitie.create")->with("homes",$homes);
 }

 public function store(Request $request)
 {
     $data=$request->all();
    
     facilitie::create($data);
     Session::flash("msg","تم اضافة التصنيف بنجاح");

      return redirect (route("facilitie.index"));
 }


}


