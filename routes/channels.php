<?php

use App\Models\Chat;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Broadcasting\PrivateChannel;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });


// Broadcast::channel('chat.{id}', function ($id) {
//     // $chat = Chat::find($id);
//     // if($chat->isParticipant($user->id)){
//     //    $user = $chat->users;
//     //    return new PrivateChannel('chat.' . $id);
//         // return ['id' => $user->id, 'name' => $user->first_name];
//     // }
// });


Broadcast::channel('chat');


// Broadcast::channel('chat', function ($user,$id) {

//     // $chat = Chat::find($id);
//     // if($chat->isParticipant($user->id)){
//     //    $user = $chat->users;
//     //    return new PrivateChannel('chat.' . $id);
//         // return ['id' => $user->id, 'name' => $user->first_name];
//     // }
// });
