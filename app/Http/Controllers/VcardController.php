<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use App\Services\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use JeroenDesloovere\VCard\VCard;

class VcardController extends Controller
{
    public function saveContact($userId)
    {
        try {
            $userInfo = UserInfo::where('user_id', $userId)
                ->whereIn('key', ['name','about','mobilephone','email','avatar','facebook'])
                ->get()
                ->toArray();
            if(!count($userInfo)) {
                return Response::error('Không có dữ liệu', 404);
            }

            $data = [];
            foreach ($userInfo as $value)
            {
                $data[$value['key']] = $value;
            }

            $vCard = new VCard();
            if(isset($data['name'])) {
                $vCard->addName($data['name']['info']);
            }
            if(isset($data['about'])) {
                $vCard->addNote($data['about']['info']);
            }
            if(isset($data['email'])) {
                $vCard->addEmail($data['email']['info']);
            }
            if(isset($data['mobilephone'])) {
                $vCard->addPhoneNumber($data['mobilephone']['info'], 'CELL');
            }
            if(isset($data['facebook'])) {
                $vCard->addURL($data['facebook']['info']);
            }
            if(isset($data['avatar'])) {
                $vCard->addPhoto($data['avatar']['info'], false);
            }
            echo  $vCard->download();
        }
        catch (\Exception $e)
        {
            Log::error('Download VCARD failed: '. $e->getMessage());
        }
    }
}
