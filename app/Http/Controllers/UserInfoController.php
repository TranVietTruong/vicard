<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserInfoRequest;
use App\Models\UserInfo;
use App\Services\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class UserInfoController extends Controller
{
    public function getUserInfo()
    {
        $user = auth()->user();
        $infoImages = UserInfo::where('user_id', $user->id)->where('type', 'IMAGE')->orderBy('order')->get();
        $infoPersonal = UserInfo::where('user_id', $user->id)->where('type', 'PERSONAL')->orderBy('order')->get();
        $infoContact = UserInfo::where('user_id', $user->id)->where('type', 'CONTACT')->orderBy('order')->get();

//        $userInfo = UserInfo::where('user_id', $user->id)->get();
//
//        $infoImages = $userInfo->filter(function ($info) {
//            if($info->type == 'IMAGE') {
//                return $info;
//            };
//        });
//
//        $infoPersonal = $userInfo->filter(function ($info) {
//            if($info->type == 'PERSONAL') {
//                return $info;
//            };
//        });
//
//        $infoContact = $userInfo->filter(function ($info) {
//            if($info->type == 'CONTACT') {
//                return $info;
//            };
//        });
//
//        $infoPersonal = $infoPersonal->sortBy('order');
//        $infoContact = $infoContact->sortBy('order');
//
//        $infoImages = array_values($infoImages->toArray());
//        $infoPersonal = array_values($infoPersonal->toArray());
//        $infoContact = array_values($infoContact->toArray());

        $data = [
            'infoImages' => $infoImages,
            'infoPersonal' => $infoPersonal,
            'infoContact' => $infoContact
        ];

        return Response::data($data,1);
    }

    public function createUserInfo(CreateUserInfoRequest $request)
    {
//        if($request->type === 'IMAGE') {
//            $checkExistImage = UserInfo::where('type', 'IMAGE')
//                ->where('key', $request->key)
//                ->where('user_id', auth()->user()->id)
//                ->first();
//            if($checkExistImage) {
//                $checkExistImage->info = $request->info;
//                $checkExistImage->save();
//                return Response::data($checkExistImage, 1);
//            }
//        }

        $numberInfo = UserInfo::where('type', $request['type'])
                                ->where('user_id', auth()->user()->id)
                                ->count();
        if($numberInfo > 50) {
            return Response::error();
        }

        $userInfo = new UserInfo();
        $userInfo->user_id = auth()->user()->id;
        $userInfo->type = $request->type;
        $userInfo->key = $request->key;
        $userInfo->info = $request->info;
        $userInfo->info1 = $request->info1;
        $userInfo->info2 = $request->info2;
        $userInfo->save();

        return Response::data($userInfo, 1);
    }

    public function updateUserInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'info' => 'required|max:255',
            'info1' => 'max:255',
            'info2' => 'max:255',
        ]);

        if($validator->fails()) {
            return Response::error($validator->getMessageBag()->first(), 400);
        }

        $userInfo = UserInfo::where('id', $request->id)->where('user_id', auth()->user()->id)->first();
        if(!$userInfo) {
            return Response::error('Thông tin không tồn tại', 404);
        }

        $userInfo->info = $request->info;
        $userInfo->info1 = $request->info1;
        $userInfo->info2 = $request->info2;
        $userInfo->save();
        return Response::data($userInfo, 1);
    }

    public function deleteUserInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required|integer'
        ]);

        if($validator->fails()) {
            return Response::error($validator->getMessageBag()->first(), 400);
        }

        $userInfo = UserInfo::where('id', $request->id)->where('user_id', auth()->user()->id)->first();
        if(!$userInfo) {
            return Response::error('Not found', 404);
        }
        $userInfo->delete();
        return Response::data($userInfo, 1);
    }

    public function updateOrderUserInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ids' => 'required|array',
        ]);

        if($validator->fails()) {
            return Response::error($validator->getMessageBag(), 400);
        }

        $ids = $request->ids;
        foreach ($ids as $key => $value) {
            $userInfo = UserInfo::where('id', $value)->where('user_id', auth()->user()->id)->first();
            if($userInfo) {
                $userInfo->order = $key;
                $userInfo->save();
            }
        }
        return Response::data();
    }
}
