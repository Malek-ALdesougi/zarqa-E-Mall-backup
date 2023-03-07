<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()){
            Alert::info('ملاحظة', 'الإضافة إلى السلة تتطلب تسجيل الدخول');
            return redirect('/login');
        }
        $product = Product::find($request->id);
        $user = User::find($request->current_user);
        $quantity = $request->quantity;
        if ($quantity == null) {
            $quantity = 1;
        }

        $cart = new Cart;
        $cart->user_id = $user->id;
        $cart->product_id = $product->id;
        $cart->quantity = $quantity;

        Alert::success('نجاح', 'تم إضافة المنتج الى السلة بنجاح :)');
        $cart->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart,$id)
    {
        Cart::where('product_id', $id)->delete();
        Alert::success('نجاح', 'تم حذف المنتج بنجاح');
        return back()->with('Success', 'item deleted successfully');
    }

    public function deleteItem(Cart $cart, $id)
    {
        // dd($id);
        Cart::where('id', $id)->delete();
        Alert::success('نجاح', 'تم حذف المنتج بنجاح');
        return back();
    }
}
