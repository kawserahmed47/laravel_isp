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
class PackageController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function addPackage(){
        $data=array();       
        $data['title']='Admin|Dashboard';   
        $userId=Auth::id();
        if($userId){
       // $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.package',$data);

       }else{
        return view('admin.pages.package',$data);
       }

       // return view('admin.pages.package');

    }
    public function insertPackage( Request $request){

        $data= array();
        $time=time();
           
        $data['pname']= $request->pname;
        $data['price']= $request->price;
        $data['bandwith']= $request->bandwith;
        $data['ytbandwith']=$request->ytbandwith;
        $data['ftp']=$request->ftp;
        $data['status']=$request->status; 

        $data['created_at']= date("Y-m-d H:i:s",$time);

        $result= DB::table('packages')->insert($data);
        if($result){
            Session::put('message', 'Packages Inserted Successfully!!');
                return Redirect::to('/viewPackage');
        }else{
            Session::put('message', 'Packages Inserted ERROR!!');
            return Redirect::to('/viewPackage');
        }

        
    }

    public function viewPackage(){
        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']= DB::table('packages')->get();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.packageView',$data);

       }else{
        return view('admin.pages.packageView',$data);
       }

        
        //$results= DB::table('packages')->get();
        //return view('admin.pages.packageView')->with('results', $results);
        

    }

    public function editPackage($id){
        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']=  DB::table('packages')->where('id', $id)->first();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.editPackage',$data);

       }else{
        return view('admin.pages.editPackage',$data);
       }

        //$results= DB::table('packages')->where('id', $id)->first();
        //return view('admin.pages.editPackage')->with('results', $results);

    }

    public function updatePackage(Request $request, $id){

        
        $data= array();
        $time=time();
           
        $data['pname']= $request->pname;
        $data['price']= $request->price;
        $data['bandwith']= $request->bandwith;
        $data['ytbandwith']=$request->ytbandwith;
        $data['ftp']=$request->ftp;
        $data['status']=$request->status; 

        $data['updated_at']= date("Y-m-d H:i:s",$time);

        $result= DB::table('packages')->where('id', $id)->update($data);
        if($result){
            Session::put('message', 'Packages Updated Successfully!!');
                return Redirect::to('/viewPackage');
        }else{
            Session::put('message', 'Packages Updated ERROR!!');
            return Redirect::to('/editPackage');
        }



    }

    public function deletePackage($id){
        $result = DB::table('packages')->where('id',$id)->delete();
        if($result){
         Session::put('message', 'Product Category Deleted Successfully!!');
         return Redirect::to('/viewPackage');
     
        }else{
         Session::put('message', 'Product Category Deleted NOT Success!!');
         return Redirect::to('/viewPackage');
        }

    }


        
public function packageActiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=1;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('packages')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Active Successfully!!');
        return Redirect::to('/viewPackage');
    }

}

public function packageInactiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=0;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('packages')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Inactive Successfully!!');
        return Redirect::to('/viewPackage');
    }

}


}
