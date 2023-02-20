<?php

namespace App\Http\Controllers;

use App\Models\BrockphotographyPhoto;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpMyAdmin\Session;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'required|min:3',
            'description' => 'required',
            'image' => 'required',
            'imageLarge' => 'required',
            'price' => 'required',
            'CategoryId' => 'required|integer|min:1'
        ]);
        $fields['name'] = strip_tags($fields['name']);
        // Open the file, this should be in binary mode
        $fp = fopen($fields['imageLarge']->path(), 'rb');

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
//        foreach ($headers as $key => $section) {
//            if (is_array($section)){
//                echo "$key: $section<br/>\n";
//            } else {
//                foreach ($section as $name => $val) {
//                    echo "$key.$name: $val<br />\n";
//                }
//            }
//        }
        //dd($fields);
        $fields['image'] = file_get_contents($fields['image']->path());
        $fields['imageLarge'] = file_get_contents($fields['imageLarge']->path());
        $fields['Height'] = $headers['COMPUTED']['Height'] ?? '';
        $fields['Width'] = $headers['COMPUTED']['Width'] ?? '';
        $fields['Aperture'] = $headers['COMPUTED']['ApertureFNumber'] ?? '';
        $fields['Exposer'] = $headers['EXIF']['ExposureTime'] ?? '';
        $fields['ISO'] = $headers['EXIF']['ISOSpeedRatings'] ?? '';
        $fields['FocalLength'] = $headers['EXIF']['FocalLength'] ?? '';
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
        $ImageId->name = $request->name;
        $ImageId->description = $request->description;
        // for keeping the small and large blob image or file if nothing is in the update field
        if($request->has('image')) {
            $ImageId->image = file_get_contents($request->image->path());
        }
        if($request->has('imageLarge')) {
            $ImageId->imageLarge = file_get_contents($request->imageLarge->path());
        }
        $ImageId->price = $request->price;
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
    public function cartAdd(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
        }
        //generate session Id is not exist
//        $session_id = Session::get('session_id');
//        if(empty($session_id)){
//            $session_id = Session::getId();
//            Session::put('session_id', $session_id);
//        }
        if(Auth::check()){
            //user logged in
            $user_id = Auth::user()->id;
            //dd($user_id);
            //$countProducts = Cart::where(['user_id'=>$data['user_id']]);
        } else {
            //user not logged in
            $user_id = 0;
            //$countProducts = Cart::where([])->count();
        }

        //save product in carts table
        $item = new Cart;
//        $item->session_id = $session_id;
        $item->user_id = $user_id;
        $item->image_id = $data['image_id'];
        $item->name = $data['name'];
        $item->description = $data['description'];
        $item->price = $data['price'];
        $item->quantity = $data['quantity'];
        $item->save();
        return redirect()->back()->with('success_message', 'Product has been added to cart');
    }
    public function cart(){
        $getCartItems = Cart::getCartItems();
        //dd($getCartItems);
        return view('cart')->with(compact('getCartItems'));
    }
}
