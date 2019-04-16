<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
use Session;
use App\Post;
use App\Comment;
use App\User;

class CommentController extends Controller
{
    public function __construct(){

        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'comment'=>'required'
        ));

        $post=Post::find($request->id);
        $user= User::find($request->user);

        $comment = new Comment();
        
        $comment->comment = $request->comment;
        $comment->name = $user->name;
        
        $comment->email = $user->email;
        $comment->approuved = true;
        $comment->post()->associate($post);

        Session::flash('success','votre commentaire a bien été ajouter');

        $comment->save();

        return redirect()->route('comment.show',[$post->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment= Post::find($id);
        return view('blog.comment')->withPost($comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment=Comment::find($id);
        return view('comment.edit')->withComment($comment);
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
        $comment=Comment::find($id);

        $this->validate($request, array(
            'comment'=>'required'
        ));

        $comment->comment=$request->input('comment');
/** en cas d'erreur de no message ou problème de routage alors c'est du a un probleme dans la vue (erreur html)**/
        $comment->save();

        Session::flash('Session','Comment succefuly edited');

        return redirect()->route('post.show',[$comment->post->id]);
    }

    public function delete($id)
    {
        $post=$this->destroy($id);
        //meme si ce n'est pas necessaire de le faire (j'ai completement changer l'url donc pas de confusion)
        if($post==0){
            return redirect()->route('accueil');
        }
        return redirect()->route('post.show',$post);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::find($id);

        if($comment!=null){
            $post=$comment->post->id;
            $comment->delete();
            Session::flash('success','comment succefully deleted');
            return $post;
        }
        
        return 0;
    }
}
