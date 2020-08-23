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

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addSupport(){
        $data=array();       
        $data['title']='Media Subcategory|Dashboard';   
       $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.addSupport',$data);

       }else{
        return view('admin.pages.addSupport',$data);
       }
        //return view('admin.pages.addSupport');
    }

    public function insertSupport(Request $request ){

        $data= array();
        $time=time();
           
        $data['name']= $request->name;
        $data['designation']=$request->designation;
        $data['mobile']=$request->mobile;
        $data['status']=$request->status;
        $data['img']=$request->img; 
        $data['created_at']= date("Y-m-d H:i:s",$time);


        $image=$request->file('img');

        if($image){
            $image_name= str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='support/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['img']=$image_url;
                DB::table('support')->insert($data);
                Session::put('message', 'Support Added Successfully!');
                return Redirect::to('/viewSupport');
            }else{
                Session::put('message', 'Product Insert Error!');
                return Redirect::to('/viewSupport');

            }
        }else{
            Session::put('message', 'Error !!! Image not getting !');
                return Redirect::to('/viewProduct');

        }
      



    }

    public function updateSupport(Request $request, $id){
        
        $data= array();
        $time=time();
           
        $data['name']= $request->name;
        $data['designation']=$request->designation;
        $data['mobile']=$request->mobile;
        $data['status']=$request->status;
        
        $data['updated_at']= date("Y-m-d H:i:s",$time);


        $image=$request->file('img');

        if($image){
            $results = DB::table('support')->where('id',$id)->first();
            $del = unlink($results->img);
            
            $data['img']=$request->img; 
            $image_name= str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='support/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['img']=$image_url;
                DB::table('support')->where('id',$id)->update($data);
                Session::put('message', 'Support Updated with image Successfully!');
                return Redirect::to('/viewSupport');
            }else{
                Session::put('message', 'Product Insert Error!');
                return Redirect::to('/viewSupport');

            }
        }else{
            DB::table('support')->where('id',$id)->update($data);
                Session::put('message', 'Support Updated Without image Successfully!');
                return Redirect::to('/viewSupport');

        }
      

    }

    public function editSupport($id){

        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']= DB::table('support')->where('id', $id)->first();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.editSupport',$data);

       }else{
        return view('admin.pages.editSupport',$data);
       }

       // $results = DB::table('support')->where('id', $id)->first();
        //return view('admin.pages.editSupport')->with('results', $results);

    }

    public function viewSupport(){
        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']= DB::table('support')->get();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.viewSupport',$data);

       }else{
        return view('admin.pages.viewSupport',$data);
       }

        //$results = DB::table('support')->get();
        //return view('admin.pages.viewSupport')->with('results', $results);


    }

    public function deleteSupport($id ){
        $results = DB::table('support')->where('id',$id)->first();
        $del = unlink($results->img);
        $result = DB::table('support')->where('id',$id)->delete();
        if($result){
         Session::put('message', 'Support Deleted Successfully!!');
         return Redirect::to('/viewSupport');
     
        }else{
         Session::put('message', 'Support Deleted NOT Success!!');
         return Redirect::to('/viewSupport');
        }

        return view('back.pages.viewSupport');

    }

    
public function supportActiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=1;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('support')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Active Successfully!!');
        return Redirect::to('/viewSupport');
    }

}

public function supportInactiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=0;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('support')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Inactive Successfully!!');
        return Redirect::to('/viewSupport');
    }

}





}
