<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use \App\Mail\SendMail;
use App\Admin;
use App\About;
use App\Package;
use Illuminate\Http\Request;

use Auth;
use Hash;
use Redirect;
use Session;
use DB;



class HomeController extends Controller
{
    public function getHomePage(){
      
      $data=array();
      $data['title']='Home|A1 Network';
      $data['about']=About::all();

      $data['sliders']= DB::table('slider')->where('status',1)->get();
      $data['packages']= DB::table('packages')->where('status',1)->get();
      $data['mCategories']= DB::table('media_category')->where('status',1)->get();
      $data['pCategories']= DB::table('product_category')->where('status',1)->get();
      return view('user.pages.home',$data);
    }
     public function getPackagePage(){
      $data=array();
      $data['title']='Package|A1 Network';
      $data['packages']=Package::where('status',1)->get();
      return view('user.pages.package',$data);
    }

    public function productPage($id){
      $data=array();
      $data['title']='Product|A1 Network';
      $data['about']=About::all();
      $data['products'] = DB::table('products')
      ->where('products.product_type', $id)
      ->get();
      $data['pcs']=DB::table('product_category')->where('id',$id)->first();
      $data['packages']=Package::where('status',1)->get();
      $data['mCategories']= DB::table('media_category')->where('status',1)->get();
      $data['pCategories']= DB::table('product_category')->where('status',1)->get();
      return view('user.pages.products',$data);
    }

    public function mediaPage($id){
      $data=array();
      $data['title']='Media|A1 Network';
      $data['about']=About::all();
      $data['medias'] = DB::table('media')
      ->where('media.category_name', $id)
      ->get();
      $data['mediasCat']=DB::table('media_category')->where('id',$id)->first();
      $data['packages']=Package::where('status',1)->get();
      $data['mCategories']= DB::table('media_category')->where('status',1)->get();
      $data['pCategories']= DB::table('product_category')->where('status',1)->get();
      return view('user.pages.media',$data);


    }

    public function supportPage(){
      $data=array();
      $data['title']='Support|A1 Network';
      $data['about']=About::all();
      $data['packages']=Package::where('status',1)->get();
      $data['supports']= DB::table('support')->where('status',1)->get();
      $data['mCategories']= DB::table('media_category')->where('status',1)->get();
      $data['pCategories']= DB::table('product_category')->where('status',1)->get();
      return view('user.pages.support',$data);
    }

    public function contactPage(){
      $data=array();
      $data['title']='Contact|A1 Network';
      $data['about']=About::all();
      $data['packages']=Package::where('status',1)->get();
      $data['mCategories']= DB::table('media_category')->where('status',1)->get();
      $data['pCategories']= DB::table('product_category')->where('status',1)->get();
      return view('user.pages.contact',$data);
    }
    
    public function insertContactMessage(Request $request){

      $data= array();
      $time=time();
         
      $data['fname']= $request->fname;
      $data['lname']=$request->lname; 
      $data['mobile']=$request->mobile; 
      $data['email']=$request->email;
      $data['message']=$request->message;

      $data['created_at']= date("Y-m-d H:i:s",$time);

      $result= DB::table('contact')->insert($data);
      if($result){
          Session::put('message', 'Message Sent Successfully!!');
              return Redirect::to('/contact');
      }else{
          Session::put('message', 'Message Sent ERROR!!Try Again properly');
          return Redirect::to('/contact');
      }

    }
    public function viewContact(){
      $data=array();       
      $data['title']='Admin|Dashboard';  
      $data['results']= DB::table('contact')->get();
      $userId=Auth::id();
     if($userId){
      $data['userId'] =  $userId;
      $data['admin'] = DB::table('admins')->where('id', $userId )->first();
      return view('admin.pages.viewContact',$data);

     }else{
      return view('admin.pages.viewContact',$data);
     }
     
    
     // $results= DB::table('contact')->get();
      //return view('admin.pages.viewContact')->with('results', $results);
     }
     public function replyContact($id){
      $data=array();       
      $data['title']='Admin|Dashboard';  
      $data['result']= DB::table('contact')->where('id',$id)->first();
      $userId=Auth::id();
     if($userId){
      $data['userId'] =  $userId;
      $data['admin'] = DB::table('admins')->where('id', $userId )->first();
      return view('admin.pages.replymessage',$data);

     }else{
      return view('admin.pages.replymessage',$data);
     }

     // return view('admin.pages.replymessage');
  
     }
  
     public function deleteContact($id){
       $result = DB::table('contact')->where('id', $id)->delete();
       if($result){
        Session::put('message', 'Contact deleted successfully!!!');
        return Redirect::to('/viewcontact');
       }
     }

    
  

    public function complainPage(){
      $data=array();
      $data['title']='Complain|A1 Network';
      $data['about']=About::all();
      $data['packages']=Package::where('status',1)->get();
      $data['mCategories']= DB::table('media_category')->where('status',1)->get();
      $data['pCategories']= DB::table('product_category')->where('status',1)->get();
      return view('user.pages.complain',$data);

    }

    public function insertComplain(Request $request){

      $data= array();
      $time=time();
         
      $data['fname']= $request->fname;
      $data['lname']=$request->lname; 
      $data['mobile']=$request->mobile; 
      $data['email']=$request->email;
      $data['description']=$request->description;

      $data['created_at']= date("Y-m-d H:i:s",$time);

      $result= DB::table('complain')->insert($data);
      if($result){
          Session::put('message', 'Compain recored Successfully!! Thanks for your query!!!');
              return Redirect::to('/complain');
      }else{
          Session::put('message', 'Compain recored ERROR!!Try Again properly');
          return Redirect::to('/complain');
      }

    }

   public function viewComplain(){
    $data=array();       
    $data['title']='Admin|Dashboard';  
    $data['results']= DB::table('complain')->get();
    $userId=Auth::id();
   if($userId){
    $data['userId'] =  $userId;
    $data['admin'] = DB::table('admins')->where('id', $userId )->first();
    return view('admin.pages.viewComplain',$data);

   }else{
    return view('admin.pages.viewComplain',$data);
   }
   // $results= DB::table('complain')->get();
    //return view('admin.pages.viewComplain')->with('results', $results);
   }

   public function replyComplain($id){

    $data=array();       
    $data['title']='Admin|Dashboard';  
    $data['result']= DB::table('complain')->where('id',$id)->first();
    $userId=Auth::id();
   if($userId){
    $data['userId'] =  $userId;
    $data['admin'] = DB::table('admins')->where('id', $userId )->first();
    return view('admin.pages.replymessage',$data);

   }else{
    return view('admin.pages.replymessage',$data);
   }
    //return view('admin.pages.replymessage');

   }

   public function viewpackageOrder(){
    $data=array();       
    $data['title']='Admin|Dashboard';  
    $data['results']= DB::table('order')->get();
    $userId=Auth::id();
   if($userId){
    $data['userId'] =  $userId;
    $data['admin'] = DB::table('admins')->where('id', $userId )->first();
    return view('admin.pages.viewpackageOrder',$data);

   }else{
    return view('admin.pages.viewpackageOrder',$data);
   }
   // $results= DB::table('order')->get();
    //return view('admin.pages.viewpackageOrder')->with('results', $results);
   }
   public function packagePending($id){
    $data= array();
    $time=time();      
    $data['status']=0;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('order')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Pending Successfully!!');
        return Redirect::to('/viewpackageOrder');
    }
   }
   public function packageDone($id){
    $data= array();
    $time=time();      
    $data['status']=1;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('order')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Response Successfully!!');
        return Redirect::to('/viewpackageOrder');
    }
  }
   


   public function delPackOrder($id){
    $result = DB::table('order')->where('id', $id)->delete();
    if($result){
     Session::put('message', 'Package order deleted successfully!!!');
     return Redirect::to('/viewpackageOrder');
    }

   }
   
   public function viewproductOrder(){
    $data=array();       
    $data['title']='Admin|Dashboard';  
    $data['results']=  DB::table('productorder')->get();
    $userId=Auth::id();
   if($userId){
    $data['userId'] =  $userId;
    $data['admin'] = DB::table('admins')->where('id', $userId )->first();
    return view('admin.pages.viewproductOrder',$data);

   }else{
    return view('admin.pages.viewproductOrder',$data);
   }

    //$results= DB::table('productorder')->get();
   // return view('admin.pages.viewproductOrder')->with('results', $results);
   }

   public function productPending($id){
    $data= array();
    $time=time();      
    $data['status']=0;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('productorder')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Pending Successfully!!');
        return Redirect::to('/viewproductOrder');
    }
   }
   public function productDone($id){
    $data= array();
    $time=time();      
    $data['status']=1;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('productorder')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Response Successfully!!');
        return Redirect::to('/viewproductOrder');
    }
  }

   public function delProOrder($id){
    $result = DB::table('productorder')->where('id', $id)->delete();
    if($result){
     Session::put('message', 'Product order deleted successfully!!!');
     return Redirect::to('/viewproductOrder');
    }

   }

   public function deleteComplain($id){
     $result = DB::table('complain')->where('id', $id)->delete();
     if($result){
      Session::put('message', 'Compain deleted successfully!!!');
      return Redirect::to('/viewcomplain');
     }
   }

   public function packageOrder(Request $request){
    
    $data= array();
    $time=time();
       
    $data['product_id']= $request->product_id;
    $data['product_name']=$request->product_name; 
    $data['product_price']=$request->product_price; 
    $data['full_name']=$request->full_name;
    $data['email']=$request->email;
    $data['mobile']=$request->mobile;
    $data['address']=$request->address;
    $data['created_at']= date("Y-m-d H:i:s",$time);

    $result= DB::table('order')->insert($data);
    if($result){
        Session::put('message', 'Order Successfully.We will contact you soon!!!');
            return Redirect::to('/#package');
    }else{
        Session::put('message', 'Order  ERROR!!Try Again properly');
        return Redirect::to('/#package');
    }

   }

  public function productOrder(Request $request ){
     $id=$request->product_type;
    $data= array();
    $time=time();
       
    $data['product_id']= $request->product_id;
    $data['product_name']=$request->product_name; 
    $data['product_price']=$request->product_price; 
    $data['full_name']=$request->full_name;
    $data['email']=$request->email;
    $data['mobile']=$request->mobile;
    $data['address']=$request->address;
    $data['created_at']= date("Y-m-d H:i:s",$time);

    $result= DB::table('productorder')->insert($data);
    if($result){
        Session::put('message', 'Order Successfully.We will contact you soon!!!');
             return redirect()->route('products', [$id]);
    }else{
        Session::put('message', 'Order ERROR!!Try Again properly');
        return Redirect::to('/products/$id');
    }



  }

//reply message

public function insertReply(Request $request){

// echo "Reply Message";
    // $details = [
    //     'title' => 'Title: Mail from Test',
    //     'body' => 'Body: This is for testing email using smtp'
    // ];

    // \Mail::to('kawserahmed47@gmail.com')->send(new SendMail($details));
    // return Redirect::to('/viewcomplain');
    $details = [

      'title' => 'Mail from A1Network',

      'body' => $request->replymessage,

  ];

 

  \Mail::to('kawserahmed47@gmail.com')->send(new SendMail($details));


  Session::flash('message', 'Mail sent Succeffully');
  return Redirect::to('/dashboard');



}

}
