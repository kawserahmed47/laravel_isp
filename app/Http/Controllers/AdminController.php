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
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      
        $data=array();       
        $data['title']='Admin|Dashboard';   
        $data['products'] = DB::table('products')->get()->count();
        $data['medias'] = DB::table('media')->get()->count();
        $data['packages'] = DB::table('packages')->get()->count();
        $data['orders'] = DB::table('order')->get()->count();
        $data['latestorders'] = DB::table('order')->orderBy('created_at','desc')->take(5)->get();
        $data['results'] = DB::table('products')->orderBy('created_at','desc')->take(5)->get();
       // $data['product_count']= count($products);



       $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
            return view('admin.dashboard',$data);
        }else{
            return view('admin.dashboard',$data);
        }
       
    }

    public function adminProfile(){
        $data=array();       
        $data['title']='Admin|Dashboard';  
       $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.adminProfile',$data);

       }else{
        return view('admin.pages.adminProfile',$data);
       }

    }

    public function profileEdit($id){

        $data=array();       
        $data['title']='Admin|Dashboard';
        $data['results'] = DB::table('admins')->where('id',$id)->first();  
        $userId=Auth::id();
            if($userId){
            $data['userId'] =  $userId;
            $data['admin'] = DB::table('admins')->where('id', $userId )->first();
            return view('admin.pages.profileEdit',$data);
            }else{
            return view('admin.pages.profileEdit',$data);
            }
    }

    public function profileUpdate(Request $request, $id){

        if(!empty($request->password)){

            if($request->password==$request->confirm_password){
                $data= array();
                $time=time();
                $data['name']= $request->name;
                $data['phone']= $request->phone;
                $data['email']= $request->email;
                $data['status']=$request->status; 
                $data['updated_at']= date("Y-m-d H:i:s",$time);
        
                if(!empty($request->password)){
                     $data['password']= Hash::make($request->password);
                    $image=$request->file('img');
        
                    if($image){
                        $results = DB::table('admins')->where('id',$id)->first();
                        $del = unlink($results->img);
                        $data['img']=$request->img; 
                        $image_name= str_random(20);
                        $ext=strtolower($image->getClientOriginalExtension());
                        $image_full_name=$image_name.".".$ext;
                        $upload_path='admin/';
                        $image_url=$upload_path.$image_full_name;
                        $success=$image->move($upload_path,$image_full_name);
                        if($success){
                            $data['img']=$image_url;
                            DB::table('admins')->where('id',$id)->update($data);
                            Session::put('message', 'Profile Updated with image & with pass Successfully!');
                            return Redirect::to('/adminProfile');
                        }else{
                            Session::put('message', 'Profile Updated Error!');
                            return Redirect::to('/adminProfile');
            
                         }
                    }else{
                            DB::table('admins')->where('id',$id)->update($data);
                            Session::put('message', 'Admin Updated without image With pass');
                            return Redirect::to('/adminProfile');}
            
                }else{    
                    $image=$request->file('img');
        
                    if($image){
                        $results = DB::table('admins')->where('id',$id)->first();
                        $del = unlink($results->img);
                    $data['img']=$request->img; 
                    $image_name= str_random(20);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.".".$ext;
                    $upload_path='admin/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path,$image_full_name);
                        if($success){
                        $data['img']=$image_url;
                        DB::table('admins')->where('id',$id)->update($data);
                        Session::put('message', 'Profile Updated with image without pass Successfully!');
                        return Redirect::to('/adminProfile');
                        }else{
                        Session::put('message', 'Admin Updated Error!');
                        return Redirect::to('/adminProfile');}
                    }else{
                        DB::table('admins')->where('id',$id)->update($data);
                        Session::put('message', 'Admin Updated without image & without pass');
                        return Redirect::to('/adminProfile');}
        
                    }
               


            }else{
                Session::put('message', 'Password Does not match.');
                //return Redirect::to('/editAdmin/$id');
                return redirect()->back();
            }
        }else{
            $data= array();
            $time=time();
            $data['name']= $request->name;
            $data['phone']= $request->phone;
            $data['email']= $request->email;
            $data['status']=$request->status; 
            $data['updated_at']= date("Y-m-d H:i:s",$time);
    
            if(!empty($request->password)){
                 $data['password']= Hash::make($request->password);
                $image=$request->file('img');
    
                if($image){
                    $results = DB::table('admins')->where('id',$id)->first();
                    $del = unlink($results->img);
                    $data['img']=$request->img; 
                    $image_name= str_random(20);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.".".$ext;
                    $upload_path='admin/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path,$image_full_name);
                    if($success){
                        $data['img']=$image_url;
                        DB::table('admins')->where('id',$id)->update($data);
                        Session::put('message', 'Profile Updated with image & with pass Successfully!');
                        return Redirect::to('/adminProfile');
                    }else{
                        Session::put('message', 'Profile Updated Error!');
                        return Redirect::to('/adminProfile');
        
                     }
                }else{
                        DB::table('admins')->where('id',$id)->update($data);
                        Session::put('message', 'Admin Updated without image With pass');
                        return Redirect::to('/adminProfile');}
        
            }else{    
                $image=$request->file('img');
    
                if($image){
                    $results = DB::table('admins')->where('id',$id)->first();
                    $del = unlink($results->img);
                $data['img']=$request->img; 
                $image_name= str_random(20);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path='admin/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);
                    if($success){
                    $data['img']=$image_url;
                    DB::table('admins')->where('id',$id)->update($data);
                    Session::put('message', 'Profile Updated with image without pass Successfully!');
                    return Redirect::to('/adminProfile');
                    }else{
                    Session::put('message', 'Admin Updated Error!');
                    return Redirect::to('/adminProfile');}
                }else{
                    DB::table('admins')->where('id',$id)->update($data);
                    Session::put('message', 'Admin Updated without image & without pass');
                    return Redirect::to('/adminProfile');}
    
                }
           





        }

       
    }





    public function adminRegister(){
        $data=array();       
        $data['title']='Admin|Dashboard';  
       $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.adminRegister',$data);

       }else{
        return view('admin.pages.adminRegister',$data);
       }
        
    }
    public function adminInsert(Request $request){
if($request->password == $request->confirm_password){


        $data= array();
        $time=time();
           
        $data['name']= $request->name;
        $data['phone']= $request->phone;
        $data['email']= $request->email;
        $password = $data['password']= Hash::make($request->password);
        $data['status']=$request->status; 
        $data['img']=$request->img; 
        $data['created_at']= date("Y-m-d H:i:s",$time);

        $image=$request->file('img');

    if($image){
        $image_name= str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.".".$ext;
        $upload_path='admin/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if($success){
            $data['img']=$image_url;
            DB::table('admins')->insert($data);
            Session::put('message', 'Admin Register Successfully!');
            return Redirect::to('/adminView');
        }else{
            Session::put('message', 'Admin Register Error!');
            return Redirect::to('/adminRegister');

        }
    }else{
        Session::put('message', 'Error !!! Image not getting !');
            return Redirect::to('/adminRegister');

    }
}else{
    Session::put('message', 'Password does not match');
    return Redirect::to('/adminRegister');

}
        
    }

    public function adminView(){
        $data=array();       
        $data['title']='Admin|Dashboard';
        $data['results'] = DB::table('admins')->get();  
       $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.adminView',$data);

       }else{
        return view('admin.pages.adminView',$data);
       }     
    }

    public function adminEdit($id){
        $data=array();       
        $data['title']='Admin|Dashboard';
        $data['results'] = DB::table('admins')->where('id',$id)->first();  
       $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.adminEdit',$data);

       }else{
        return view('admin.pages.adminEdit',$data);
       }
        
    }

public function editAdmin($id){
    $data=array();       
    $data['title']='Admin|Dashboard';
    $data['results'] = DB::table('admins')->where('id',$id)->first();  
   $userId=Auth::id();
   if($userId){
    $data['userId'] =  $userId;
    $data['admin'] = DB::table('admins')->where('id', $userId )->first();
    return view('admin.pages.editAdmin',$data);

   }else{
    return view('admin.pages.editAdmin',$data);
   }


}

    public function adminUpdate(Request $request, $id){
   if(!empty($request->password)){
       if($request->password==$request->confirm_password){
        $data= array();
        $time=time();
           
        $data['name']= $request->name;
        $data['phone']= $request->phone;
        $data['email']= $request->email;
        $password = $data['password']= Hash::make($request->password);
        $data['status']=$request->status; 
       
        $data['updated_at']= date("Y-m-d H:i:s",$time);

        $image=$request->file('img');

    if($image){
        $results = DB::table('admins')->where('id',$id)->first();
        $del = unlink($results->img);
        $data['img']=$request->img; 
        $image_name= str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.".".$ext;
        $upload_path='admin/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if($success){
            $data['img']=$image_url;
            DB::table('admins')->where('id',$id)->update($data);
            Session::put('message', 'Admin Updated with image Successfully!');
            return Redirect::to('/adminView');
        }else{
            Session::put('message', 'Admin Updated Error!');
            return Redirect::to('/editAdmin/$id');

        }
    }else{
        DB::table('admins')->where('id',$id)->update($data);
        Session::put('message', 'Admin Updated without image');
        return Redirect::to('/adminView');

    }

       }else{
        Session::put('message', 'Password Does not match.');
        //return Redirect::to('/editAdmin/$id');
        return redirect()->back();
       }
   

}else{


        $data= array();
        $time=time();
           
        $data['name']= $request->name;
        $data['phone']= $request->phone;
        $data['email']= $request->email;
      //  $password = $data['password']= Hash::make($request->password);
        $data['status']=$request->status; 
       
        $data['updated_at']= date("Y-m-d H:i:s",$time);

        $image=$request->file('img');

    if($image){
        $results = DB::table('admins')->where('id',$id)->first();
        $del = unlink($results->img);
        $data['img']=$request->img; 
        $image_name= str_random(20);
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.".".$ext;
        $upload_path='admin/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        if($success){
            $data['img']=$image_url;
            DB::table('admins')->where('id',$id)->update($data);
            Session::put('message', 'Admin Updated with image Successfully!');
            return Redirect::to('/adminView');
        }else{
            Session::put('message', 'Admin Updated Error!');
            return Redirect::to('/editAdmin/$id');

        }
    }else{
        DB::table('admins')->where('id',$id)->update($data);
        Session::put('message', 'Admin Updated without image');
        return Redirect::to('/adminView');

    }


}
        
        
    }
    public function adminDelete($id){
        $admin = DB::table('admins')->where('id', $id)->first();
        if($admin->level==1){
            Session::put('message', 'Super User not Delete');
            return Redirect::to('/adminView');

        }else{

            $results = DB::table('admins')->where('id',$id)->first();
            $del = unlink($results->img);

        $result = DB::table('admins')->where('id',$id)->delete();
        if($result){
         Session::put('message', 'Admin Deleted Successfully!!');
         return Redirect::to('/adminView');
     
        }else{
         Session::put('message', 'Admin Deleted NOT Success!!');
         return Redirect::to('/adminView');
        }

    }
        
    }

    public function adminInactiveStatus($id){
        $admin = DB::table('admins')->where('id', $id)->first();
        if($admin->level==1){
            Session::put('message', 'Super User not Inactiveable');
            return Redirect::to('/adminView');

        }else{

       $data = array();
       $time = time();
        $data['status']=0;
        $data['updated_at']= date("Y-m-d H:i:s",$time);
        $result = DB::table('admins')->where('id',$id)->update($data);
        if($result){
         Session::put('message', 'Admin Inactivaed Successfully!!');
         return Redirect::to('/adminView');
     
        }else{
         Session::put('message', 'Admin Inactivaed NOT Success!!');
         return Redirect::to('/adminView');
        }

    }

    }

    public function adminActiveStatus($id){
        $admin = DB::table('admins')->where('id', $id)->first();
        if($admin->level==1){
            Session::put('message', 'Super User Always Active');
            return Redirect::to('/adminView');

        }else{

       $data = array();
       $time = time();
        $data['status']=1;
        $data['updated_at']= date("Y-m-d H:i:s",$time);
        $result = DB::table('admins')->where('id',$id)->update($data);
        if($result){
         Session::put('message', 'Admin Activated Successfully!!');
         return Redirect::to('/adminView');
     
        }else{
         Session::put('message', 'Admin Activated NOT Success!!');
         return Redirect::to('/adminView');
        }

    }

    }





}
