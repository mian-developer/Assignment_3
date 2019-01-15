<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Setting;
use Session;

class ProductsController extends Controller
{
    
    public function __construct(){

            $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passdata= Product::all();
        return view('admin.home')->with('prod',$passdata)->with('setting',Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add')->with('categ',Category::all())->with('setting',Setting::first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[

                'name'=>'required',
                'price'=>'required',
                'description'=>'required',
                'image'=>'required',
                'category_id'=>'required'

        ]);

            $image = $request->image;
            $image_new_name=time().$image->getClientOriginalName();
            $image->move('uploads/products/',$image_new_name);

            $product=new Product();
            $product->name=$request->name;
            $product->price=$request->price;
            $product->image='/uploads/products/'.$image_new_name;
            $product->detail=$request->description;
            $product->category_id=$request->category_id;
            
            $product->save();

            Session::flash('success','Product Created Successfully!');

            return redirect()->route('products.index');
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
        $product=Product::find($id);
        $categories=Category::all();  

        return view('admin.edit')->with('prod',$product)->with('categ',$categories)->with('setting',Setting::first());
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
        $this->validate($request,[

                'name'=>'required',
                'price'=>'required',
                'description'=>'required',
                'image'=>'required',
                'category_id'=>'required'

        ]);

        $product=Product::find($id);

        if($request->hasFile('image')){
                 $image=$request->image;

        $image_new_name=time().$image->getClientOriginalName();

        $image->move('uploads/products/',$image_new_name);
        $product->image='/uploads/products/'.$image_new_name;
         }
 
        $product->name=$request->name;
        $product->price=$request->price;
        $product->detail=$request->description;
        $product->category_id=$request->category_id;

        $product->save();
        Session::flash('info','You Have Successfully Updated a Product.');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);

        $product->delete();
        Session::flash('danger','You Have Successfully Deleted a Product.');
        return redirect()->route('products.index');
    }
}
