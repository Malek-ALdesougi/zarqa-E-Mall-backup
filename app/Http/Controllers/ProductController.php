<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stoeId = Auth::user()->stores->id;
        $StoreProducts = Product::all()->where('store_id', $stoeId);
        return view('/owner', ['store' => Auth::user()->stores, 'owner' => Auth::user(), 'products' => $StoreProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function searchProduct(Request $request)
    //  {
    //     if($request->product){
    //         dd($request->product);
    //     }
    //  }


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

        // dd($request->description);
        $request->validate(
            [
                'price' => 'required|numeric', //
                'name' => 'required|unique:products', //
                'quantity' => 'required|numeric',
                'image' => 'required', //
                'tag' => 'required',
                'description' => 'required',
            ],
            [
                'price.required' => 'حقل السعر مطلوب',
                'price.numeric' => 'حقل السعر يجب ان يحتوي على أرقام فقط',
                'name.required' => 'حقل الإسم مطلوب',
                'name.unique' => 'اسم منتج متكرر',
                'quantity.required' => 'حقل الكمية مطلوب',
                'quantity.numeric' => 'حقل الكمية يجب ان يحتوي على أرقام فقط',
                'image.required' => 'حقل صورة المنتج مطلوب',
                'tag.required' => 'حقل الفئة المنتج مطلوب',
                'description.required' => 'حقل الوصف المنتج مطلوب',
            ]

        );
        $newProduct = new Product;

        $newProduct->store_id = Auth::user()->stores->id;
        $newProduct->name = $request->name;
        $newProduct->price = $request->price;
        $newProduct->quantity = $request->quantity;
        $newProduct->tag = $request->tag;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('images/', $fileName);
            $newProduct->image = $fileName;
        }
        $newProduct->description = $request->description;

        $newProduct->save();
        // $stoeId = Auth::user()->stores->id;
        // $StoreProducts = Product::all()->where('store_id', $stoeId);
        // dd($StoreProducts[0]->name);
        Alert::success('نجاح', 'تم إضافة المنتج بنجاح');
        return redirect('/owner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        Product::where('id', $id)->delete();
        // Alert::success('Success', 'Item deleted successfully');
        return redirect('/owner');
    }
}
