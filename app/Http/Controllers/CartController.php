<?php

namespace App\Http\Controllers;

//use Gloudemans\Shoppingcart\Cart;
use App\Models\BrockphotographyPhoto;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
        ]);
        $quantity = request('quantity');


        Cart::add([
            'id' => $request->id,
            'image_id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $quantity,
            //dd($request)
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('cart.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $item = Cart::find($id);
        if (!$item) {
            return response()->json([
                'message' => 'item not found'
            ], 404);
        }
        $item->delete();

        return  response()->json([
            'message' => 'Item removed successfully'
        ]);
    }
}
