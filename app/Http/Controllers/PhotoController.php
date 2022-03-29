<?php

namespace App\Http\Controllers;

use App\Models\BrockphotographyPhoto;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $photos = BrockphotographyPhoto::all();

        return view('photo')->with('photos', $photos);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     */
    public function show($slug)
    {
        $photo = BrockphotographyPhoto::where('id', $slug)->firstOrFail();
        return view('shop.photo')->with('photo', $photo);
    }
}
