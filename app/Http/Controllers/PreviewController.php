<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function preview($name)
    {
        if(!view()->exists('preview.'.$name)) {
            return redirect('/404');
        }
        return view('preview.'.$name);
    }
}
