<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
 
use DB;

 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
 

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
    	$qty=$request->qty;
    	$product_id=$request->product_id;
    	$product_info=DB::table('tbl_products')

    					->where('product_id',$product_id)
    					->first();
    					$data['quantity']=$qty;
    					 $data['id']=$product_info->product_id;
    					 $data['name']=$product_info->product_name;
    					  $data['price']=$product_info->product_prise;
    					   $data['attributes']['image']=$product_info->product_image;
                          Cart::add($data);
                           

    				 
    				 return Redirect::to('/show-cart');

    }

    public function show_cart()
    {

    	$all_published_category=DB::table('tbl_category')
    				->where('publication_status',1)
    				->get();


    	 $manage_published_category=view('pages.add_to_cart')
    	    ->with('all_published_category',$all_published_category);
    	return view('layout')
    		->with('pages.add_to_cart',$manage_published_category);

    }

    public function delete_to_cart($rowId)
    {

     Cart::remove($rowId,0);

                     return Redirect::to('/show-cart');

    }


}
