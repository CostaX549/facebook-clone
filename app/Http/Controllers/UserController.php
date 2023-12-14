<?php

namespace App\Http\Controllers;

use App\Models\FriendshipRequest;
use App\Http\Resources\AllPostsCollection;
use App\Http\Resources\AllFriendshipRequestsCollection;
use App\Models\Post;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $posts = Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
       return Inertia::render('User',[
        'posts' => new AllPostsCollection($posts)
       ]);
    }

  

   
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        $friends =  $user->friends;
        $authUser = auth()->user(); 

        $friendshipRequest = FriendshipRequest::where(function ($query) use ($authUser, $user) {
            $query->where('user_id', $authUser->id)->where('friend_id', $user->id);
        })->orWhere(function ($query) use ($authUser, $user) {
            $query->where('user_id', $user->id)->where('friend_id', $authUser->id);
        })->first();
      
        
        
        
        
        

        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();

        return Inertia::render('User',[
            'user' => User::find($id),
            'posts' => new AllPostsCollection($posts),
            'friendshipRequest' =>$friendshipRequest,
            'friends' => $friends,
            
           ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateImage(Request $request)
    {
        $request->validate(['image' => 'required|mimes:jpg,jpeg,png']);
        $user  = (new ImageService)->updateImage(auth()->user(), $request);
        $user->save();
    }

   
}
