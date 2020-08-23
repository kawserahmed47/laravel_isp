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

class MediaController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function addMsubcategory(){
        $data=array();       
        $data['title']='Media Subcategory|Dashboard';   
       $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.addMsubcategory',$data);

       }else{
        return view('admin.pages.addMsubcategory',$data);
       }

    }
    public function insertMsubcategory( Request $request){
        $data= array();
        $time=time();
           
        $data['mediaCategoryName']= $request->mediaCategoryName;
        $data['status']=$request->status; 

        $data['created_at']= date("Y-m-d H:i:s",$time);

        $result= DB::table('media_category')->insert($data);
        if($result){
            Session::put('message', 'Media Category Inserted Successfully!!');
                return Redirect::to('/viewMsubcategory');
        }else{
            Session::put('message', 'Brand Inserted ERROR!!');
            return Redirect::to('/addMsubcategory');
        }

        
    }

    public function viewMsubcategory(){
        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']= DB::table('media_category')->get();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.viewMsubcategory',$data);

       }else{
        return view('admin.pages.viewMsubcategory',$data);
       }

       // $results= DB::table('media_category')->get();
        //return view('admin.pages.viewMsubcategory')->with('results', $results);

    }

    public function editMsubcategory($id){
        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']=  DB::table('media_category')->where('id',$id)->first();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.editMsubcategory',$data);

       }else{
        return view('admin.pages.editMsubcategory',$data);
       }



        //$results= DB::table('media_category')->where('id',$id)->first();
        //return view('admin.pages.editMsubcategory')->with('results', $results);

    }

    public function updateMsubcategory(Request $request, $id){
        $data= array();
        $time=time();
           
        $data['mediaCategoryName']= $request->mediaCategoryName;
        $data['status']=$request->status; 

        $data['updated_at']= date("Y-m-d H:i:s",$time);

        $result= DB::table('media_category')->where('id',$id)->update($data);
        if($result){
            Session::put('message', 'Media Category Updated Successfully!!');
                return Redirect::to('/viewMsubcategory');
        }else{
            Session::put('message', 'Brand Updated ERROR!!');
            return Redirect::to('/editMsubcategory/$id');
        }


    }

    public function deleteMsubcategory( $id){
        $result = DB::table('media_category')->where('id',$id)->delete();
        if($result){
         Session::put('message', 'Media Category Deleted Successfully!!');
         return Redirect::to('/viewMsubcategory');
     
        }else{
         Session::put('message', 'Media Category Deleted NOT Success!!');
         return Redirect::to('/viewMsubcategory');
        }

    } 

        
public function subMActiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=1;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('media_category')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Active Successfully!!');
        return Redirect::to('/viewMsubcategory');
    }

}

public function subMInactiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=0;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('media_category')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Inactive Successfully!!');
        return Redirect::to('/viewMsubcategory');
    }

}








    public function addMedia(){
        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']= DB::table('media_category')->where('status', 1)->get();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.media',$data);

       }else{
        return view('admin.pages.media',$data);
       }
       
      //  $results= DB::table('media_category')->where('status', 1)->get();
        //return view('admin.pages.media')->with('results', $results);
        

    }
    public function insertMedia( Request $request){
        $data= array();
        $time=time();
           
        $data['category_name']= $request->category_name;
        $data['name']=$request->name;
        $data['link']=$request->link;
        $data['status']=$request->status; 
        $data['created_at']= date("Y-m-d H:i:s",$time);

        $result= DB::table('media')->insert($data);
        if($result){
            Session::put('message', 'Media Inserted Successfully!!');
                return Redirect::to('/viewMedia');
        }else{
            Session::put('message', 'Media Inserted ERROR!!');
            return Redirect::to('/addMedia');
        }

        
    }

    public function viewMedia(){
        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']= DB::table('media')
                            ->join('media_category', 'media.category_name', '=', 'media_category.id')
                            ->select('media.*', 'media_category.mediaCategoryName')
                            ->get();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.mediaView',$data);

       }else{
        return view('admin.pages.mediaView',$data);
       }


       // $results = DB::table('media')
        //->join('media_category', 'media.category_name', '=', 'media_category.id')
        //->select('media.*', 'media_category.mediaCategoryName')
        //->get();
        //return view('admin.pages.mediaView')->with('results', $results);

    }

    public function editMedia($id){

        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']= DB::table('media')
        ->join('media_category', 'media.category_name', '=', 'media_category.id')
        ->select('media.*', 'media_category.mediaCategoryName')
        ->where('media.id', $id)
        ->first();
        $data['categories']= DB::table('media_category')->get();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.editMedia',$data);

       }else{
        return view('admin.pages.editMedia',$data);
       }
       
        



        // $categories= DB::table('media_category')->get();

        // $results = DB::table('media')
        // ->join('media_category', 'media.category_name', '=', 'media_category.id')
        // ->select('media.*', 'media_category.mediaCategoryName')
        // ->where('media.id', $id)
        // ->first();
        // return view('admin.pages.editMedia')->with(['results'=> $results, 'categories'=> $categories]);

    }

    public function updateMedia(Request $request, $id){

        $data= array();
        $time=time();
           
        $data['category_name']= $request->category_name;
        $data['name']=$request->name;
        $data['link']=$request->link;
        $data['status']=$request->status; 
        $data['updated_at']= date("Y-m-d H:i:s",$time);

        $result= DB::table('media')->where('id', $id)->update($data);
        if($result){
            Session::put('message', 'Media Updated Successfully!!');
                return Redirect::to('/viewMedia');
        }else{
            Session::put('message', 'Media Updated ERROR!!');
            return Redirect::to('/editMedia');
        }


    }

    public function deleteMedia($id){
        $result = DB::table('media')->where('id',$id)->delete();
        if($result){
         Session::put('message', 'Media  Deleted Successfully!!');
         return Redirect::to('/viewMedia');
     
        }else{
         Session::put('message', 'Media  Deleted NOT Success!!');
         return Redirect::to('/viewMedia');
        }

    }

        
public function mediaActiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=1;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('media')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Active Successfully!!');
        return Redirect::to('/viewMedia');
    }

}

public function mediaInactiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=0;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('media')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Inactive Successfully!!');
        return Redirect::to('/viewMedia');
    }

}

}
