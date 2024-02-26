<?php

namespace App\Http\Controllers\Api\Chat;

use Carbon\Carbon;
use App\Models\Chat;
use App\Models\User;
use App\Models\Message;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Events\ChatMessageSent;
use App\Events\ChatMessageStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Chat\ChatResource;
use App\Http\Resources\Api\Chat\ChatsResource;
use App\Http\Resources\Api\Chat\MassageResource;
use App\Http\Requests\Api\Chat\CreateChatRequest;
use App\Http\Requests\Api\Chat\SendTextMessageRequest;

class ChatController extends Controller
{
    public function createChat(CreateChatRequest $request)
    {
        // Include the current user's ID in the users array
        $users = array_unique(array_merge($request->users, [$request->user()->id]));

        // check if they had a chat before
        $chat =  $request->user()->chats()->whereHas('users', function ($q) use ($users) {
            $q->whereIn('user_id', $users);
        })->first();

        // if not, create a new one
        if (empty($chat)) {
            $chat = Chat::create()->makePrivate($request->isPrivate);
        }

        // Sync users to the chat
        $chat->users()->sync($users);

        $success = true;
        return response()->json([
            'chat' => new ChatResource($chat),
            'success' => $success
        ], 200);
    }

    public function getChats(Request $request)
    {
        $user = $request->user();
        $chats = $user->chats()->with('users')->get();
        $success = true;
        return response()->json([
            'chats' => ChatsResource::collection($chats),
            'success' => $success
        ], 200);
    }

    public function sendTextMessage(SendTextMessageRequest $request)
    {
        $chat = Chat::find($request->chat_id);
        // $currentTimestamp = Carbon::now()->toIso8601String(); // Generate current timestamp in ISO 8601 format
        if ($chat->isUser($request->user()->id)) {
            $message = ChatMessage::create([
                'message' => $request->message,
                'chat_id' => $request->chat_id,
                'user_id' => $request->user()->id,
                'data' => json_encode(['seenBy' => [], 'status' => 'sent']) //sent, delivered,seen
            ]);
            $message =  new MassageResource($message);
            broadcast(new ChatMessageSent($message))->toOthers();

            $success = true;
            // broadcast the message to all users

            // foreach ($chat->users as $participant) {
            //     if ($participant->id != $request->user()->id) {
            //         $participant->notify(new NewMessage($message));
            //     }
            // }

            return response()->json([
                "message" => $message,
                "success" => $success
            ], 200);
        } else {
            return response()->json([
                'message' => 'not found'
            ], 404);
        }
    }

    // public function messageStatus(Request $request,ChatMessage $message){
    //     if($message->chat->isUser($request->user()->id)){
    //         $messageData = json_decode($message->data);
    //         array_push($messageData->seenBy,$request->user()->id);
    //         $messageData->seenBy = array_unique($messageData->seenBy);
    //         if(count($message->chat->users)-1 < count( $messageData->seenBy)){
    //             $messageData->status = 'delivered';
    //         }else{
    //             $messageData->status = 'seen';
    //         }
    //         $message->data = json_encode($messageData);
    //         $message->save();
    //         $message =  new MassageResource($message);

    //         //triggering the event
    //         broadcast(new ChatMessageStatus($message));

    //         return response()->json([
    //             'message' =>  $message,
    //             'success' => true
    //         ], 200);
    //     }else{
    //         return response()->json([
    //             'message' => 'Not found',
    //             'success' => false
    //         ], 404);
    //     }
    // }

    public function getChatById(Chat $chat, Request $request)
    {
        if ($chat->isUser($request->user()->id)) {
            return response()->json([
                'chat' => ChatResource::make($chat),
            ], 200);
        } else {
            return response()->json([
                'message' => 'not found'
            ], 404);
        }
    }

    public function searchUsers($phone)
    {
        $users = User::where('phone', 'like', "%{$phone}%")->limit(3)->get();
        return response()->json([
            'users' => $users,
        ], 200);
    }
}
