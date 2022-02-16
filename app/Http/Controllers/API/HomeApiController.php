<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;


class HomeApiController extends Controller
{
    function search(Request $request){
        $q = $request->q;
        $query = Home::whereRaw('true');
        if($q){
            $query->whereRaw('(price like ? or city like ? or details_description like ? )',["%$q%","%$q%","%$q%"]);
        }
          
        $home = $query->paginate(10)
        ->appends([
            'q'     =>$q,
        ]);

        return $home;
    }

    function show($id){
        $item = Home::find($id);
        if(!$item){
            return response()->json(['status'=>0,'msg'=>'Invalid Product Id']);
        }
        return response()->json(['status'=>1,'item'=>$item]);
    }
}
