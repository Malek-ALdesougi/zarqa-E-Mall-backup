<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;

class storesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = ['ملابس', 'هدايا', 'كهربائيات', 'أثاث', 'ألعاب وهدايا', 'ساعات وعطور', 'الكل', 'منظفات', 'مواد تموينية'];

        // handel the search input for store name
        $filterSearch = [];
        if ($request->search) {
            $searchStores = User::where('roll', 'owner')->get();
            foreach ($searchStores as $user) {
                if ($user->stores->store_name == $request->search) {
                    array_push($filterSearch, $user);
                }
            }
            return view('/index', ['owners' => $filterSearch, 'categories' => $categories]);
        }

        //check if there is no filter     OR    if the route is empty     OR        the search bar is empty
        if ($request->category == '' || $request->category == 'الكل') {
            $storeOwner = User::where('roll', 'owner')->get();
            return view('/index', ['owners' => $storeOwner, 'categories' => $categories]);
        }

        $filteredOwners = [];
        // send only the owner with status 1 and category the same as request in an array 
        if ($request->category) {
            $filterStores = User::all()->where('roll', 'owner');
            foreach ($filterStores as $user) {
                if ($user->stores->status == '1' && $user->stores->category == $request->category) {
                    array_push($filteredOwners, $user);
                }
            }

            return view('/index', ['owners' => $filteredOwners, 'categories' => $categories]);
        }
    }





    //show all product and the store name for the current store 
    public function show(Request $request, $id)
    {
        $currentStore = Store::find($id);
        $allProducts = $currentStore->products;

        //do the filter for products
        if($request->filter == 'des'){
            $allProducts = Product::where('store_id', $id)->orderBy('price', 'desc')->get();
            // dd($allProducts);
        }

        if($request->filter == 'asc'){
            $allProducts = Product::where('store_id', $id)->orderBy('price', 'asc')->get();
            // dd($allProducts);
        }
        // make a variable to store the value of the current products and change it if there is search 

        if ($request->product) {
            $allProducts = Product::where('name', 'LIKE', '%' . $request->product . '%')->get();
        }

        return view('/store', ['store' => $currentStore, 'products' => $allProducts]);
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
