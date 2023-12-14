<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FriendshipRequest;
use Illuminate\Http\Request;

class FriendshipRequestController extends Controller
{
  public function send(int $id) {
    $recipient = User::find($id);

    $friendshipRequest = new FriendshipRequest;

    $friendshipRequest->user_id = auth()->user()->id;
    $friendshipRequest->friend_id = $recipient->id;

    $friendshipRequest->save();
  }

  public function accept(int $id) {
 
    $solicitation = FriendshipRequest::find($id);

    $solicitation->accepted = '1';

    if($solicitation->user->friends->contains($solicitation->friend_id)) {
         return false;
    } else {



    $solicitation->user->friends()->attach($solicitation->friend_id);
    $solicitation->friend->friends()->attach($solicitation->user_id);

    $solicitation->save();
  }
  }

  public function reject(int $id) {
    $solicitation = FriendshipRequest::find($id);

    $solicitation->delete();
  }
}
