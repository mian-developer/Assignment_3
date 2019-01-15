<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingController extends Controller
{
    public function setting(){

    	return view('admin.setting')->with('setting',Setting::first());
    }

    public function update(Request $request){
			 $this->validate($request,[
			'name'=>'required',
			      ]);
			$site=Setting::first();
			$site->name=$request->name;
      		$site->save();

			Session::flash('success','Your Site Settings Updated Succesfully!');

			return redirect()->route('settings');
    }
}
