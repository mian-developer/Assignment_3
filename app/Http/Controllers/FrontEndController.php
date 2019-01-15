<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Product;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome')->with('setting',Setting::first())->with('categ',Category::all())->with('prod',Product::all())->with('categorys',Category::take(4)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function mobiles(){
        return view('front.mobiles',['prodp'=>Product::paginate(4)])->with('setting',Setting::first())->with('categ',Category::all());
    }

       public function category(){
        return view('front.categories',['categ'=>Category::paginate(4)])->with('setting',Setting::first())->with('prod',Product::all());
    }

    public function mobilesingle($id)
    {
        $product=Product::find($id);
        return view('front.single')->with('setting',Setting::first())->with('categ',Category::all())->with('prod',$product)->with('prodall',Product::all());
    }

    public function categorysingle($id)
    {
        $category=Category::find($id);
        return view('front.singlecategory')->with('setting',Setting::first())->with('categs',$category)->with('categ',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
