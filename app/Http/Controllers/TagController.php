<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
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
       $tag=Tag::all();
       return view('tag.index')->withTags($tag);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name_tag' => 'required|max:255'
        ));

        $tag=new Tag;
        $tag->name_tag=$request->name_tag;
        $tag->save();

        Session::flash('success','the Tag is correctly added');

        return redirect()->route('tag.index');


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag= Tag::find($id);
        return view('tag.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag=Tag::find($id);
        return view('tag.edit')->withTag($tag);
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
        $this->validate($request, array(
        'name_tag' => 'required|max:255'
    ));
    
    $tag = Tag::find($id);
    $tag->name_tag = $request->input('name_tag');
    $tag->save();
    
        Session::flash('success','the tag is correctly updated');
    
     //   $this->posts()->sync($request->posts);
    
        return redirect()->route('tag.index');
    }
   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag=Tag::find($id);
        $tag->posts()->detach();//delete all the posts related to the tag in pivot table(post_tag)
        //le meme doit etre dans post controller qui est postCrudController

        Session::flash('success','Tag Deleted Successfully');
        return redirect()->route('tag.index');
    
    }
}
