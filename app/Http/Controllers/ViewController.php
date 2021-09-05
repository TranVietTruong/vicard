<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index($codeTag)
    {
        $user = User::where('status', 1)->where('code_tag', $codeTag)->first();
        if(!$user) {
            return redirect('/404');
        }

        if(!$user->template_code) {
            return view('newUser');
        }

        $template = 'template'.$user->template_code;
        if(!view()->exists('view.'.$template)) {
            return redirect('/404');
        }

        $userInfo = UserInfo::where('user_id', $user->id)->get();
        if(!count($userInfo)) {
            return view('newUser');
        }

        $images = $userInfo->filter(function ($info) {
            if($info->type == 'IMAGE') {
                return $info;
            };
        });

        $avatar = $images->filter(function ($info) {
            if($info->key == 'avatar') {
                return $info;
            };
        })->first();

        $personal = $userInfo->filter(function ($info) {
            if($info->type == 'PERSONAL') {
                return $info;
            };
        });

        $name = $personal->filter(function ($info) {
            if($info->key == 'name') {
                return $info;
            };
        })->first();

        $about = $personal->filter(function ($info) {
            if($info->key == 'about') {
                return $info;
            };
        })->first();

        $contact = $userInfo->filter(function ($info) {
            if($info->type == 'CONTACT') {
                return $info;
            };
        });

        $personal = $personal->sortBy('order');
        $contact = $contact->sortBy('order');


        $data = [
            'userId'=> $user->id,
            'avatar' => $avatar,
            'name' => $name,
            'about' => $about,
            'personal' => $personal,
            'contact' => $contact
        ];
        return view('view.'. $template, $data);
    }
}
