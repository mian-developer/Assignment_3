<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Mail;
use App\Product;
use App\Category;
use App\Setting;
use Session;
use Stripe\Stripe;
use Stripe\Charge;

class ShoppingController extends Controller
{
    public function add_to_cart(){
    	//dd(Request()->all());
    	$p=Product::find(Request()->p_id);
    	$cartitem=Cart::add([
    		'id'=>$p->id,
    		'name'=>$p->name,
    		'qty'=>Request()->quantity,
    		'price'=>$p->price
    	]);
    	Cart::associate($cartitem->rowId,'App\Product');
    	Session::flash('success','Item Added to Your Cart Successfully!');
    	return redirect()->route('cart');
    }

    public function cart(){
    	//Cart::destroy();
    	return view('front.cart')->with('prod',Product::all())->with('setting',Setting::first())
    	->with('categ',Category::all());
    }

    public function cart_delete($id){
    	Cart::remove($id);
    	Session::flash('info','Item Removed from your Cart Successfully!');
    	return redirect()->back();
    }
    public function checkout(){
    	return view('front.checkout')->with('prodall',Product::all())->with('setting',Setting::first())
    	->with('categ',Category::all());
    }

    public function pay(){
    	//dd(Request()->all());
    	Stripe::setApiKey("sk_test_kSALyJkyrKsQZ9tmbAiqPfg8");
    	$charge=Charge::create([

    		    'amount' => Cart::total()*100,
   				'currency' => 'usd',
    			'description' => 'Mobile Shop',
    			'source' => Request()->stripeToken

    	]);
    	Session::flash('success','You Card was Charged Successfully.Wait for our email!');
    	Cart::destroy();

    	Mail::to(Request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);
    	return redirect('/');
    }
}
