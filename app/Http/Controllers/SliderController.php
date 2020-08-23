<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use App\Admin;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Redirect;
use Session;
use DB;
class SliderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
//add Slider

public function addSlider(){
    $data=array();       
    $data['title']='Add Slider|Dashboard';   
   $userId=Auth::id();
   if($userId){
    $data['userId'] =  $userId;
    $data['admin'] = DB::table('admins')->where('id', $userId )->first();
    return view('admin.pages.addSlider',$data);

   }else{
    return view('admin.pages.addSlider',$data);
   }

}

//Insert Slider

public function insertSlider(Request $request){
    $data= array();
    $time=time();
       
    $data['heading']= $request->heading;
    $data['subheading']=$request->subheading;
    $data['status']=$request->status;
    $data['img']=$request->img; 
    $data['created_at']= date("Y-m-d H:i:s",$time);
    $image=$request->file('img');

    if($image){
        $image_name= str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.".".$ext;
        $upload_path='slider/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if($success){
            $data['img']=$image_url;
            DB::table('slider')->insert($data);
            Session::put('message', 'Slider Added Successfully!');
            return Redirect::to('/viewSlider');
        }else{
            Session::put('message', 'Slider Insert Error!');
            return Redirect::to('/addSlider');

        }
    }else{
        Session::put('message', 'Error !!! Image not getting !');
            return Redirect::to('/addSlider');

    }


}

//View Slider

public function viewSlider(){

    $data=array();       
    $data['title']='Admin|Dashboard';  
    $data['results']=DB::table('slider')->get();
    $userId=Auth::id();
    if($userId){
    $data['userId'] =  $userId;
    $data['admin'] = DB::table('admins')->where('id', $userId )->first();
    return view('admin.pages.viewSlider',$data);

   }else{
    return view('admin.pages.viewSlider',$data);
   }

}
//edit Slider
public function editSlider($id){
    $data=array();       
    $data['title']='Admin|Dashboard';  
    $data['result']=DB::table('slider')->where('id', $id)->first();
    $userId=Auth::id();
    if($userId){
    $data['userId'] =  $userId;
    $data['admin'] = DB::table('admins')->where('id', $userId )->first();
    return view('admin.pages.editSlider',$data);

   }else{
    return view('admin.pages.editSlider',$data);
   }



}

//update Slider
public function updateSlider(Request $request, $id){
    $data= array();
    $time=time();
       
    $data['heading']= $request->heading;
    $data['subheading']=$request->subheading;
    $data['status']=$request->status;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $image=$request->file('img');

    if($image){
        $results = DB::table('slider')->where('id',$id)->first();
        $del = unlink($results->img);
        
        $data['img']=$request->img; 
        $image_name= str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.".".$ext;
        $upload_path='slider/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if($success){
            $data['img']=$image_url;
            DB::table('slider')->where('id',$id)->update($data);
            Session::put('message', 'Slider Updated with Image Successfully!');
            return Redirect::to('/viewSlider');
        }else{
            Session::put('message', 'Slider Updated Error!');
            return Redirect::to('/editSlider/$id');

        }
    }else{
        DB::table('slider')->where('id',$id)->update($data);
        Session::put('message', 'Slider Updated without image');
        return Redirect::to('/viewSlider');

    }

}

//delete Slider

 public function deleteSlider($id){
    $results = DB::table('slider')->where('id',$id)->first();
    $del = unlink($results->img);

    $result = DB::table('slider')->where('id',$id)->delete();
    if($result){
     Session::put('message', 'Slider Deleted Successfully!!');
     return Redirect::to('/viewSlider');
 
    }else{
     Session::put('message', 'Product Deleted NOT Success!!');
     return Redirect::to('/viewSlider');
    }
    

}

public function sliderActiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=1;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('slider')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Active Successfully!!');
        return Redirect::to('/viewSlider');
    }

}

public function sliderInactiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=0;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('slider')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Inactive Successfully!!');
        return Redirect::to('/viewSlider');
    }

}




}
