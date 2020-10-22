<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

 

class SliderController extends Controller
{
    public function index()
    {
    	return view('admin.add_slider');
    }
function all_slider(){
    $all_slider_info=DB::table('tbl_slider')->get();
    	$manage_slider=view('admin.all_slider')
    	    ->with('all_slider_info',$all_slider_info);
    	return view('admin_layout')
    		->with('admin.all_slider',$manage_slider);
}

     public function save_slider(Request $request)
    {
        $this->AdminAuthCheck();
    	 $data=array ();
         
        $data['publication_status'] = $request->publication_status;
         
        $image=$request->file('slider_image');

        if($image){

            $image_name=str::random(20);

            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='slider/';

            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path, $image_full_name);
           
            if($success){

                $data['slider_image']=$image_url;

                   DB::table('tbl_slider')->insert($data);
                    Session::put('message', 'Slider Successfully Added');
 return  Redirect::to ('/add-slider');
                   // print_r( $data);slider
        	 
             
            }

        }
        


    }

       public function unactive_slider($slider_id)
    {
        $this->AdminAuthCheck();
		DB::table('tbl_slider')
			->where('slider_id',$slider_id)
			->update(['publication_status'=> 0]);
			Session::put('message','slider unactive successully!!');
			return Redirect::to('/all-slider');

    }

     public function active_slider($slider_id)
    {
        $this->AdminAuthCheck();
		DB::table('tbl_slider')
			->where('slider_id',$slider_id)
			->update(['publication_status'=> 1]);
			Session::put('message','slider active successully!!');
			return Redirect::to('/all-slider');

    }

     

 


public function delete_slider($slider_id)

    {  $this->AdminAuthCheck();

        DB::table('tbl_slider')
    		->where('slider_id',$slider_id)
    		->delete();
    		Session::get('message','Category Deleted successfuly!');
    		return Redirect::to('/all-slider');
    	 
    	 
    }

     public function AdminAuthCheck(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return;
        }
        else{
            return Redirect::to('/admin')->send();
        }
    }
 
}
