<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Auth;
use Session;

class ProfileController extends Controller
{
    public function profile(){

    	return view('admin.profile')->with('user',Auth::user())->with('setting',Setting::first());
    }

    public function update(Request $request){
			 $this->validate($request,[
			'name'=>'required',
			'email'=>'required|email',
			'password'=>'required',
			      ]);
			$user=Auth::user();
			$user->name=$request->name;
      		$user->email=$request->email;
      		$user->save();

      		if($request->has('password')){

            $user->password=bcrypt($request->password);
			}

			Session::flash('success','Your Profile Updated Succesfully!');

			return redirect()->route('user.profile');
    }
}
