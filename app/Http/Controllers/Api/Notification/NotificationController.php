<?php

namespace App\Http\Controllers\Api\Notification;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Notification\NotificationResource;

class NotificationController extends Controller
{
    public function notify(){

        $notifications = Notification::where('user_id', auth()->user()->id)->get();
        return responseSuccessData(NotificationResource::collection($notifications));
    }
}
