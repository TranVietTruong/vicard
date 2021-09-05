<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeInfoRequest;
use App\Models\TypeInformation;
use App\Services\Response;

class TypeInfoController extends Controller
{
    public function getTypeInfo(TypeInfoRequest $request)
    {
        $type = $request['type'];
        if($type !== 'CONTACT' && $type !== 'PERSONAL') {
            return Response::error();
        }
        $typeInfo = TypeInformation::where('type', $type)->orderBy('order')->get();
        return Response::data($typeInfo, count($typeInfo));
    }
}
