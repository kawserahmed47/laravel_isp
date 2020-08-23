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

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addPsubcategory(){
        $data=array();       
        $data['title']='Media Subcategory|Dashboard';   
       $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.addPsubcategory',$data);

       }else{
        return view('admin.pages.addPsubcategory',$data);
       }
      //  return view('admin.pages.addPsubcategory');

    }
    public function insertPsubcategory( Request $request){
        $data= array();
        $time=time();
           
        $data['prductCategoryName']= $request->prductCategoryName;
        $data['status']=$request->status; 

        $data['created_at']= date("Y-m-d H:i:s",$time);

        $result= DB::table('product_category')->insert($data);
        if($result){
            Session::put('message', 'Product Category Inserted Successfully!!');
                return Redirect::to('/viewPsubcategory');
        }else{
            Session::put('message', 'Product Inserted ERROR!!');
            return Redirect::to('/addPsubcategory');
        }

        
    }

    public function viewPsubcategory(Request $request){
        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']=DB::table('product_category')->get();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.viewPsubcategory',$data);

       }else{
        return view('admin.pages.viewPsubcategory',$data);
       }

      //  $results= DB::table('product_category')->get();
        //return view('admin.pages.viewPsubcategory')->with('results', $results);
       
    }

    public function editPsubcategory($id){
        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']= DB::table('product_category')->where('id', $id)->first();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.editPsubcategory',$data);

       }else{
        return view('admin.pages.editPsubcategory',$data);
       }


       // $results= DB::table('product_category')->where('id', $id)->first();
        //return view('admin.pages.editPsubcategory')->with('results', $results);

    }

    public function updatePsubcategory(Request $request, $id){
        $data= array();
        $time=time();
           
        $data['prductCategoryName']= $request->prductCategoryName;
        $data['status']=$request->status; 

        $data['updated_at']= date("Y-m-d H:i:s",$time);

        $result= DB::table('product_category')->where('id', $id)->update($data);
        if($result){
            Session::put('message', 'Product Category Updated Successfully!!');
                return Redirect::to('/viewPsubcategory');
        }else{
            Session::put('message', 'Product Updated ERROR!!');
            return Redirect::to('/editPsubcategory/$id');
        }


    }

    public function deletePsubcategory($id){
        
        $result = DB::table('product_category')->where('id',$id)->delete();
        if($result){
         Session::put('message', 'Product Category Deleted Successfully!!');
         return Redirect::to('/viewPsubcategory');
     
        }else{
         Session::put('message', 'Product Category Deleted NOT Success!!');
         return Redirect::to('/viewPsubcategory');
        }

    } 



    
public function pSubActiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=1;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('product_category')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Active Successfully!!');
        return Redirect::to('/viewPsubcategory');
    }

}

public function pSubInactiveStatus($id){
    $data= array();
    $time=time();      
    $data['status']=0;
    $data['updated_at']= date("Y-m-d H:i:s",$time);
    $result = DB::table('product_category')->where('id',$id)->update($data);
    if($result){
        Session::flash('message', 'Inactive Successfully!!');
        return Redirect::to('/viewPsubcategory');
    }

}







    public function addProduct(){
        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']= DB::table('product_category')->where('status', 1)->get();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.addProduct',$data);

       }else{
        return view('admin.pages.addProduct',$data);
       }

       // $results= DB::table('product_category')->where('status', 1)->get();
        //return view('admin.pages.addProduct')->with('results', $results);

    }
    public function insertProduct( Request $request){

        $data= array();
        $time=time();
           
        $data['product_type']= $request->product_type;
        $data['product_name']=$request->product_name;
        $data['price']=$request->price;
        $data['description']=$request->description;
        $data['status']=$request->status;
        $data['img']=$request->img; 
        $data['created_at']= date("Y-m-d H:i:s",$time);


        $image=$request->file('img');

        if($image){
            $image_name= str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['img']=$image_url;
                DB::table('products')->insert($data);
                Session::put('message', 'Product Added Successfully!');
                return Redirect::to('/addProduct');
            }else{
                Session::put('message', 'Product Insert Error!');
                return Redirect::to('/addProduct');

            }
        }else{
            Session::put('message', 'Error !!! Image not getting !');
                return Redirect::to('/addProduct');

        }
      

        
    }

    public function viewProduct(Request $request){

        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']=DB::table('products')
        ->join('product_category', 'products.product_type', '=', 'product_category.id')
        ->select('products.*', 'product_category.prductCategoryName')
        ->get();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.viewProduct',$data);

       }else{
        return view('admin.pages.viewProduct',$data);
       }

        // $results = DB::table('products')
        // ->join('product_category', 'products.product_type', '=', 'product_category.id')
        // ->select('products.*', 'product_category.prductCategoryName')
        // ->get();
        // return view('admin.pages.viewProduct')->with('results', $results);

    }

    public function editProduct($id){

        $data=array();       
        $data['title']='Admin|Dashboard';  
        $data['results']=DB::table('products')
        ->join('product_category', 'products.product_type', '=', 'product_category.id')
        ->select('products.*', 'product_category.prductCategoryName')
        ->where('products.id', $id)
        ->first();
        $data['categories']=  DB::table('product_category')->get();
        $userId=Auth::id();
       if($userId){
        $data['userId'] =  $userId;
        $data['admin'] = DB::table('admins')->where('id', $userId )->first();
        return view('admin.pages.editProduct',$data);

       }else{
        return view('admin.pages.editProduct',$data);
       }



        // //$data = array();
        // $categories= DB::table('product_category')->get();
        // // $data["categories"] = DB::table('product_category')->get();
        // $results = DB::table('products')
        // ->join('product_category', 'products.product_type', '=', 'product_category.id')
        // ->select('products.*', 'product_category.prductCategoryName')
        // ->where('products.id', $id)
        // ->first();
        // return view('admin.pages.editProduct')
        // ->with(['results'=> $results, 'categories'=> $categories]);

    }

    public function updateProduct(Request $request, $id){

        $data= array();
        $time=time();
           
        $data['product_type']= $request->product_type;
        $data['product_name']=$request->product_name;
        $data['price']=$request->price;
        $data['description']=$request->description;
        $data['status']=$request->status;
        $data['updated_at']= date("Y-m-d H:i:s",$time);


        $image=$request->file('img');

        if($image){
            $results = DB::table('products')->where('id',$id)->first();
            $del = unlink($results->img);
            
            $data['img']=$request->img; 
            $image_name= str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['img']=$image_url;
                DB::table('products')->where('id',$id)->update($data);
                Session::put('message', 'Product Updated Successfully!');
                return Redirect::to('/viewProduct');
            }else{
                Session::put('message', 'Product Updated Error!');
                return Redirect::to('/editProduct/$id');

            }
        }else{
            DB::table('products')->where('id',$id)->update($data);
            Session::put('message', 'Product Updated without image');
                return Redirect::to('/viewProduct');

        }
      



    }

    public function deleteProduct($id){
        $results = DB::table('products')->where('id',$id)->first();
        $del = unlink($results->img);
        $result = DB::table('products')->where('id',$id)->delete();
        if($result){
         Session::put('message', 'Product  Deleted Successfully!!');
         return Redirect::to('/viewProduct');
     
        }else{
         Session::put('message', 'Product Deleted NOT Success!!');
         return Redirect::to('/viewProduct');
        }


    }



    public function productActiveStatus($id){
        $data= array();
        $time=time();      
        $data['status']=1;
        $data['updated_at']= date("Y-m-d H:i:s",$time);
        $result = DB::table('products')->where('id',$id)->update($data);
        if($result){
            Session::flash('message', 'Active Successfully!!');
            return Redirect::to('/viewProduct');
        }
    
    }
    
    public function productInactiveStatus($id){
        $data= array();
        $time=time();      
        $data['status']=0;
        $data['updated_at']= date("Y-m-d H:i:s",$time);
        $result = DB::table('products')->where('id',$id)->update($data);
        if($result){
            Session::flash('message', 'Inactive Successfully!!');
            return Redirect::to('/viewProduct');
        }
    
    }

}
