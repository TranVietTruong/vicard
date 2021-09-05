<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSubscriber;
use App\Services\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserSubscriberController extends Controller
{
    public function updateUserSubscriber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|max:64',
            'subscriber' => 'required|max:64'
        ]);

        if($validator->fails()) {
            return Response::error($validator->getMessageBag(), 400);
        }
        $user = User::where('id', $request['user_id'])->where('status', 1)->first();
        if(!$user) {
            return Response::error();
        }

        $userSubscriber = UserSubscriber::where('user_id', $user->id)->first();
        if(!$userSubscriber)
        {
            $newSubscriber = new UserSubscriber();
            $newSubscriber->user_id = $user->id;
            $newSubscriber->subscriber = [$request['subscriber']];
            $newSubscriber->save();
        }
        else
        {
            $arr =  $userSubscriber->subscriber ?: [];
            if(!in_array($request['subscriber'], $arr)) {
                array_push($arr, $request['subscriber']);
                $userSubscriber->subscriber = $arr;
                $userSubscriber->save();
            }
        }
        return Response::data();
    }
}
