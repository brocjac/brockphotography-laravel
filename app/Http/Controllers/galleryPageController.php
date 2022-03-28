<?php

namespace App\Http\Controllers;

use App\Models\BrockphotographyPhoto;
use Illuminate\Http\Request;

class galleryPageController extends Controller
{
    public function index(){
        $photos = BrockphotographyPhoto::all();

        return view('landscapes')->with('photos', $photos);
    }
}
