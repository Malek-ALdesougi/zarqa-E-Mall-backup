<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function main(Request $request)
    {
        $currentUser = User::find(auth()->user());
        // dd($currentUser);
        // we must get the ordersDetails using order where user_id == auth()->user()->id
        // 1- get all orders for the current user
        // 2- get all orderDetail depend on the order id 

        // dd($currentUser[0]->orders);
        // $userOrders = Order::where('user_id', auth()->user()->id)->get();
        $userOrders = $currentUser[0]->orders;
        $Orders = [];
        // dd($userOrders[4]->id);
        foreach ($userOrders as $userOrder) {
            // array_push($Orders, );
        }
        // dd($Orders);
        // $test = OrderDetail::all()->where('order_id', $userOrders[1]->id);
        // dd($test);
        // dd($userOrders);
        // dd();
        // dd(OrderDetail::where('user_id', $currentUser[0]->id)->get());
        // $test = OrderDetail::where('user_id', $currentUser[0]->id)->get();
        // $order = Order::find(9);
        $orderDetail = OrderDetail::find(4);
        // dd($orderDetail->Order);

        return view('profile', ['currentUser' => $currentUser, 'orders' => OrderDetail::where('user_id', $currentUser[0]->id)->get()]);
    }

    public function deleteOrder($id)
    {
        $deletedOrder = OrderDetail::where('id', $id);
        $deletedOrder->delete();

        return back();
    }

    public function editProfile(Request $request, $id)
    {
        // dd($request->name);
        $editedUser = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ],
        [
            'name.required' => 'حقل الإسم مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'phone.required' => 'حقل الهاتف مطلوب',
            'address.required' => 'حقل العنوان مطلوب'
        ]);

        $editedUser->name = $request->name;
        $editedUser->email = $request->email;
        $editedUser->phone = $request->phone;
        $editedUser->address = $request->address;

        $editedUser->update();

        Alert::success('نجاح', 'تم تعديل البيانات بنجاح');
        return back();
    }
}
