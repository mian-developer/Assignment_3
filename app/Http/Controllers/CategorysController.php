<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Setting;
use Session;

class CategorysController extends Controller
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
        $passdata= Category::all();
        return view('admin.category.index')->with('categ',$passdata)->with('setting',Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add')->with('setting',Setting::first());
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
                'image'=>'required|image'

        ]);

            $image=$request->image;
            $image_new_name=time().$image->getClientOriginalName();
            $image->move('uploads/categories/',$image_new_name);

            $category=new Category();
            $category->name=$request->name;
            $category->image='/uploads/categories/'.$image_new_name;
            $category->save();

            Session::flash('success','Category Created Successfully!');

            return redirect()->route('categories.index');
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
        $category=Category::find($id); 

        return view('admin.category.edit')->with('categ',$category)->with('setting',Setting::first());
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
        //dd($request->all());
        $this->validate($request,[

                'name'=>'required',
                'image'=>'required|image'

        ]);

        $category=Category::find($id);

        if($request->hasFile('image')){
                 $image=$request->image;

        $image_new_name=time().$image->getClientOriginalName();

        $image->move('uploads/categories/',$image_new_name);
        $category->image='/uploads/categories/'.$image_new_name;
         }
 
        $category->name=$request->name;

        $category->save();
        Session::flash('info','You Have Successfully Updated a Category.');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $category=Category::find($id); 
    foreach ($category->products as $product) {

        $product->forceDelete();
    }

        $category->delete();
        Session::flash('danger','You Have Successfully Deleted a Category.');
        return redirect()->route('categories.index');
    }
}
