<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Session;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, array(
            'name_category' => 'required|max:255'
        ));
        //saving data
        $category= new Categories;
        $category->name_category = $request->name_category;
        
        $category->save();
        
        Session::flash('success','Category successfully added');
        
        //redirection
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
        $categories=Categories::all();
        $cat= DB::table('categories')->where('category_id', '=', $id)->delete();
        
        Session::flash('success','Category Deleted Successfully');
        return redirect()->route('categories.index')->withCategories($categories);
    }
}
