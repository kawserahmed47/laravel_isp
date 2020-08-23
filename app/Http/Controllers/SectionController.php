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

class SectionController extends Controller
{
    public function showAbout(){
    	$data=array();
    	$data['title']='About|A1 Network';
        $about= About::find(1);
        $data['about']=$about;
    	return view('admin.pages.about',$data);
    }
    public function postAbout(Request $request){

          $this->validate($request,[
            'details' => 'required',
           
        ]);

         $about=About::find(1);
         if($about){         
         $about->details=$request->details;
         $about->update();
         session()->flash('success', 'Successfully Updated!');
         }

         // dd($about);
         
         return redirect()->route('aboutadmin');
    }

    public function aboutView(){
        $data=array();
        $data['title']='About|A1 Network';
        return view('admin.pages.aboutView',$data);
    }

    public function showPackage(){
        $data=array();
        $data['title']='Packages|A1 Network';
        return view('admin.pages.package',$data);
    }

    public function postPackage(Request $request){
        // dd($request->all());
          $this->validate($request,[
            'pname' => 'required',
            'price' => 'required',
            'support'=>'required'
        ]);

         $packages=new Package;
                
         $packages->pname=$request->pname;
         $packages->price=$request->price;
         $packages->bandwith=$request->bandwith;
         $packages->ytbandwith=$request->ytbandwith;
         $packages->ftp=$request->ftp;
         $packages->support=$request->support;
         $request->status? $packages->status=1 :  $packages->status=0;
         $packages->save();
         session()->flash('success', 'Successfully Saved!');
         // dd($about);
         return redirect()->back();
    }

    public function viewPackage(){
        $data=array();
        $data['title']='View Packages|A1 Network';
        $data['packages']=Package::where('status',1)->get();
        // dd($data['packages']);
        return view('admin.pages.packageView',$data);
    }

        public function showMedia(){
        $data=array();
        $data['title']='Media|A1 Network';
        return view('admin.pages.media',$data);
    }

        public function postMedia(Request $request){
        // dd($request->all());
          $this->validate($request,[
            'pname' => 'required',
            'price' => 'required',
            'support'=>'required'
        ]);

         $packages=new Package;
                
         $packages->pname=$request->pname;
         $packages->price=$request->price;
         $packages->bandwith=$request->bandwith;
         $packages->ytbandwith=$request->ytbandwith;
         $packages->ftp=$request->ftp;
         $packages->support=$request->support;
         $request->status? $packages->status=1 :  $packages->status=0;
         $packages->save();
         session()->flash('success', 'Successfully Saved!');
         // dd($about);
         return redirect()->back();
    }

        public function viewMedia(){
        $data=array();
        $data['title']='View Media|A1 Network';
        
        // dd($data['packages']);
        return view('admin.pages.mediaView',$data);
    }


}
