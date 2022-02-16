<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Home;
use Session;


class ImageController extends Controller
{
    function index(){

         $items=Image::all();

    return view("admin.image.index")->with("items",$items);
}

function create(){
      $homes = Home::all();
      return view("admin.image.create")->with("homes",$homes);
  }

  public function store(Request $request)
  {
      $data=$request->all();
      if($request->hasfile('image')){
        $requestData['image'] = $this->StoreImage($request->image,'images/image');
    }
      Image::create($data);
      Session::flash("msg","تم اضافة التصنيف بنجاح");

       return redirect (route("image.index"));
  }

  public function StoreImage($image,$path)
  {
      $file_extention = $image->getClientOriginalExtension();
      $file_name = time().rand(0,100).'.'.$file_extention;
      $image->move($path , $file_name);
      return $file_name;
  }
}
