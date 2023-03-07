<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
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
        //get the total price for the current cart and user
        // dd($request->userId);
        $totalPrice = 0;
        $allProducts = Cart::where('user_id', auth()->user()->id)->get();
        // dd($allProducts[0]->quantity);
        foreach ($allProducts as $product) {
            $original = Product::find($product->product_id);
            $totalPrice = $totalPrice + ($original->price * $product->quantity);

            // reduce the amount of each product after every purchas 
            $original->quantity =  $original->quantity - $product->quantity ;
            $original->update();
        }

        // place the order if the total price and userid is available
        if ($totalPrice && $request->userId) {

            $order = new Order;
            $order->user_id = $request->userId;
            $order->total = $totalPrice;
            $order->save();

            //get all cart products and iterate on them to save in the order details table
            foreach ($allProducts as $product) {
                $orderDetail = new OrderDetail;
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $product->product_id;
                $orderDetail->user_id = auth()->user()->id;
                $orderDetail->save();
            }

            Alert::success('نجاح', 'تم استلام الطلب بنجاح, شكرا لزيارتكم ');

            //empty the cart table after the process done
            DB::table('carts')->delete();

            return redirect('index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
