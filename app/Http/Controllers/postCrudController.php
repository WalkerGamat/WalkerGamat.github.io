<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Tag;
use App\Categories;
use Session;
use Image;

class postCrudController extends Controller
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
        //create a variable and store all the blog posts in it from database
            $post= Post::orderBy('created_at','desc')->paginate(5);
        //returne a view and pass in the above variable
            return view('index')->withPost($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Categories::all();
        $tags= Tag::all();
        return view("create")->withTitle("post")->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
     // Validation Data
    $this->validate($request, array(
                       'title'=>"required|max:255",
                       'slug'=>"required|alpha_dash|max:255|unique:posts,slug",
                       
                       'tag'=>'required',
                       'description'=>"required"
    ));
     // Saving Data

    $post = new Post;
    $post->title = $request->input('title');
    $post->slug = $request->input('slug');
    $post->category_id=$request->input('category_id');
    $post->description = $request->input('description');
    
    Session::flash('success','The blog post was succssfully save!');
    
    //Save images
    if($request->hasFile('image')){
        $image = $request->file('image');
        $filename= time().'.'.$image->getClientOriginalExtension();
        $location=public_path('img/'. $filename);
        Image::make($image)->resize('800','400')->save($location);

        $post->image=$filename;
    }
    
    $post->save();
    
    $post->tags()->sync($request->tag,false);//false means add the infos to the table, true means overriding all the table association
    
    // Redirection
        return redirect()->route("post.show",$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get element by id
        $post = Post::find($id);
        $tags= DB::table('post_tag')->where('post_id', '=', $post->id)->distinct()->get();
        $category = DB::table('categories')->where('id', '=', $post->category_id)->first();
        // Redirection
        return view('show')->with('post',$post)->withCategory($category)->withTags($tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save it in a var
        $post=Post::find($id); //il y a aussi find()
        $categories = Categories::all();
        $cats = [];
        foreach ($categories as $rowCat) {
            $cats[$rowCat->category_id] = $rowCat->name_category;
        }
        $tags= Tag::all();
        $tagArray= [];
        foreach($tags as $tag){
            $tagArray[$tag->id]=$tag->name_tag;
        }
        //return the edit view with the var 
        return view('edit')->withPost($post)->withCategories($cats)->withTags($tagArray);
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
        $post = Post::find($id);
        //Validate data
 if($request->input('slug') == $post->slug)
 {
      $this->validate($request, array(
                'title'=>"required|max:255",
                'description'=>"required",
                'category_id'=> "required|integer"
            ));
        }else
        {
            $this->validate($request, array(
                'title'=>"required|max:255",
                'slug'=>"required|alpha_dash|max:255|unique:posts,slug",
                'description'=>"required",
                'category_id'=> "required|integer"
));
 }
        //Save the data to the database
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');

        $post->save();
        
        if(isset($request->tags)){
        $post->tags()->sync($request->tags);//quand il ya pas de tag la var tag == null ,mais il attend un tableau c pour sela que on a fait un else 
        }else{
            $post->tags()->sync([]);
        }

        //set flash data with success message
        Session::flash('success','The blog post was succssfully saved!');

        //redirect with flash data to post.show (post == nom du crud)
        return redirect()->route("post.show",$post->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->tags()->detach();
        
        $post->delete();

        Session::flash('success','Post Deleted Successfully');
        return redirect()->route('post.index');
    }
}
