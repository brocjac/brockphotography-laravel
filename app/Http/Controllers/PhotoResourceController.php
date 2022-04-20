<?php

namespace App\Http\Controllers;

use App\Models\BrockphotographyPhoto;
use Illuminate\Http\Request;

class PhotoResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'Title' => 'required|min:3',
            'Alt' => 'required',
            'ImgSrc' => 'required',
            'LargeImgSrc' => 'required',
            'PhotoValuePrice' => 'required',
            'CategoryId' => 'required|integer|min:1'
        ]);
        $fields['Title'] = strip_tags($fields['Title']);
        // Open a the file, this should be in binary mode
        $fp = fopen($fields['ImgSrc']->path(), 'rb');

        if (!$fp) {
            echo 'Error: Unable to open image for reading';
            exit;
        }

        // Attempt to read the exif headers
        $headers = exif_read_data($fp);

        if (!$headers) {
            echo 'Error: Unable to read exif headers';
            exit;
        }

        // Print the 'COMPUTED' headers
        echo 'EXIF Headers:' . PHP_EOL;

        foreach ($headers['COMPUTED'] as $header => $value) {
            printf(' %s => %s%s', $header, $value, PHP_EOL);
        }
        //dd($fields, $data);
        $fields['ImgSrc'] = file_get_contents($fields['ImgSrc']->path());
        $fields['LargeImgSrc'] = file_get_contents($fields['LargeImgSrc']->path());
        BrockphotographyPhoto::create($fields);
        return redirect('/landscapes')->with('success', 'Photo was uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BrockphotographyPhoto  $image
     */
    public function edit($id)
    {

//        dd(BrockphotographyPhotos::query()->select( 'ImageId',
//            'Title',
//            'Alt',
//            'PhotoValuePrice',
//            'CategoryId')->where('ImageId', '=', $id)->first());

        return view('photos.update', ['image' => BrockphotographyPhoto::query()->where('id', '=', $id)->first()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\BrockphotographyPhoto $ImageId
     */
    public function update(Request $request, $ImageId)
    {
        $ImageId = BrockphotographyPhoto::findOrFail($ImageId);
        //dd($ImageId);
        $ImageId->Title = $request->Title;
        $ImageId->Alt = $request->Alt;
        // for keeping the small and large blob image or file if nothing is in the update field
        if($request->has('ImgSrc')) {
            $ImageId->ImgSrc = file_get_contents($request->ImgSrc->path());
        }
        if($request->has('LargeImgSrc')) {
            $ImageId->LargeImgSrc = file_get_contents($request->LargeImgSrc->path());
        }
        $ImageId->PhotoValuePrice = $request->PhotoValuePrice;
        $ImageId->CategoryId = $request->CategoryId;
        if($ImageId->save()){
            return redirect('/landscapes');
        } else {
            abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param
     * @param  BrockphotographyPhoto $ImageId
     */
    public function destroy($ImageId)
    {
        $id = BrockphotographyPhoto::findOrFail($ImageId);
        //dd($id);
        $id->delete();
        return redirect('/landscapes')->with('success', 'Product have been removed');
    }
}
