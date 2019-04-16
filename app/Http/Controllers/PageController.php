<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Post;
use Session;

class PageController extends Controller
{
 
    public  function getIndex(){
        return view('welcome');        
    }

    public function getContact(){
        return view('contact');
    }

    public function postContact(Request $request){
        $this->validate($request, array(
            'name'=>'required|max:255|min:2',
            'email'=>'required|email',
            'body'=>'required'
        ));

        $data= array(
            'titre' => $request->name,
            'email' => $request->email,
            'sujet' => $request->body
        );

        //Mail::queue(); //pour envoyer un email en backend (quand quend la voix est libre)
        Mail::send('email.contact',$data,function($message) use($data){
            $message->from($data['email']);
            $message->to('kira.taita@gmail.com');
            $message->subject($data['sujet']);
        });
        
        Session::flash('success','Your mail have successfully be sent ');
        
        return redirect('/');
    }

    public function getAbout(){
        return view('about');
    }

    public function getAccueil(){
        $post=Post::get();
        return view('accueil')->withPost($post);        
    }
    
    public function getProfile(){
        $user=\Auth::user();
       return view('profile')->withUser($user);        
    }
}
