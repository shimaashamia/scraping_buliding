<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Home\CreateRequest;
use App\Http\Requests\Home\EditRequest;
use App\Models\Home;
use Session;


class HomeController extends Controller
{
    function index(Request $request){
            $q=$request->q;
                 $items=Home::whereRaw("true");

             if($q)
             {
                 $items->whereRaw('(city like ? or details_description like ? )',["%$q%", "%$q%"]);
             }
             
            
           // dd($active);
            
             $items=$items->paginate(10)
             ->appends([
                 'q'=>$q,
             ]);
    
        return view("admin.home.index")->with("items",$items);
    }

    function create(){
          return view("admin.home.create");
      }

      public function store(Request $request)
      {
        $request->validate([
            'image' => ['required'],
            'price' => ['required'],
            'space' => ['required'],
            'city' => ['required'],
            'bedrooms_count' => ['required'],
            'bathrooms_count' => ['required'],
            'sales_agent_name' => ['required'],
            'details_description' => ['required'],
        ]); 
        $requestData=$request->all();
        if($request->hasfile('image')){
            $requestData['image'] = $this->StoreImage($request->image,'images/image');
        }
        Home::create($requestData);
          Session::flash("msg","تم اضافة بنجاح");
    
           return redirect (route("home.index"));
      }
      

      public function edit($id)
      {
          $item=Home::find($id);
          if(!$item){
              session()->flash("msg","Invalid Id");
              return redirect(route("home.index"));
          }
          return view("admin.home.edit",compact('item'));
      }
      public function update(Request $request, $id)
      {
 
          $itemDB = Home::find($id);        
          $requestData = $request->all();
          if($request->hasfile('image')){
            $requestData['image'] = $this->StoreImage($request->image,'images/image');
        }
          $itemDB->update($requestData);
          session()->flash("msg","s:home Updated Successfully");
          return redirect(route("home.index"));
      }


      public function destroy($id)
      {
          $itemDB=Home::find($id);
          $itemDB->delete();
          session()->flash("msg","home Deleted Successfully");
          return redirect(route("home.index"));
      }


      public function StoreImage($image,$path)
      {
          $file_extention = $image->getClientOriginalExtension();
          $file_name = time().rand(0,100).'.'.$file_extention;
          $image->move($path , $file_name);
          return $file_name;
      }
  
}
