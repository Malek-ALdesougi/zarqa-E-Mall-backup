<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Models\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.index-dashboard', array(
            'users' => User::where('roll', 'user')->count(),
            'stores' => Store::all()->count(),
            'products' => Product::all()->count(),
            'orders' => Order::all()->count()
        ));
    }

    public function showPendingStores()
    {
        $pendingStores = Store::where('status', 0)->get();

        return view('admin.pendings', compact('pendingStores'));
    }

    public function acceptStore($id)
    {
        $acceptedStore = Store::find($id);
        // dd($acceptedStore);
        $acceptedStore->status = 1;
        $acceptedStore->update();

        Alert::success('Done', 'Store has been accepted successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\adminController  $adminController
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $allUsers = User::all();
        // dd($allUsers);
        return view('admin.users', compact('allUsers'));
    }

    public function showStores()
    {
        $approvedStores = Store::where('status', 1)->get();
        // dd($approvedStores[0]->user);
        return view('/admin.stores', compact('approvedStores'));
    }

    public function deleteStore($id)
    {
        $user = User::find($id);
        $user->delete();
        // dd($user);
        Alert::success('Done', 'Store deleted successfully');
        return back();
    }


    public function editStore(Request $request, $id)
    {
        $store = Store::find($id);
        $ownerId = $store->user->id;
        $owner = User::find($ownerId);

        $store->store_name = $request->name;
        $owner->phone = $request->phone;
        $owner->address = $request->address;

        $store->update();
        $owner->update();
        Alert::success('done', 'Store data update successfully');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\adminController  $adminController
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->roll = $request->roll;
        $user->address = $request->address;
        $user->update();

        Alert::success('Success', 'User data updated successfully');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\adminController  $adminController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\adminController  $adminController
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('done');
        return back();
    }

    public function logoutAdmin()
    {
        Auth::logout();
        Session::flush();

        return redirect('login');
    }

    public function userMessages()
    {
        $allUsersMessages = UserMessage::all();

        // dd($allUsersMessages[0]->user);
        return view('admin.user-messages', compact('allUsersMessages'));
    }

    public function deleteUserMessage($id)
    {
        $deletedMessage = UserMessage::find($id);
        $deletedMessage->delete();

        return back();
    }
}
