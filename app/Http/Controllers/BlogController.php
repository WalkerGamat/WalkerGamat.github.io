<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class BlogController extends Controller
{
    public function getSingle($slug){
        // fetch from BD    
        $post= Post::where('slug','=',$slug)->first();
        //return view 
        return view('blog.slug')->withPost($post);
    }

    /**Read Update Profile */

    public function editProfile()
    {
        $user=Auth::user();
        return view('profile.edit')->withUser($user);
    }
    public function updateProfile(Request $request){
    
       // $user=User::find($request->id);
        $user=$this->Auth->user();
        //Save images
    if($request->hasFile('image')){
        $image = $request->file('image');
        $filename= time().'.'.$image->getClientOriginalExtension();
        $location=public_path('img/'. $filename);
        Image::make($image)->resize('200','100')->save($location);

        $post->image=$filename;
    }

    return view('profile')->withUser($user);        
   }

}
