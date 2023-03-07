<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }


    public function contactMessage(Request $request ,$id)
    {
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        if(auth()->user()->email !== $request->email){
            Alert::warning('هوية مجهولة' , 'يرجى إدخال البريد الإلكتروني الخاص بهذا الحساب');
            return back();
        }
        $contactMessage = new UserMessage;

        $contactMessage->user_id = auth()->user()->id;
        $contactMessage->subject = $request->subject;
        $contactMessage->message = $request->message;

        $contactMessage->save();
        Alert::success('نجاح' , 'تم استلام رسالتك بنجاح شكرا... لتواصلك معنا  ');
        return redirect('/index');
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //the register user validation and store to the database
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
            'phone' => 'required|numeric|digits:10|starts_with:07',
            'image' => 'required',
            'password' => 'required|min:8|confirmed'
        ], [
            'name.required' => 'حقل الإسم مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.unique' => 'هذا الحساب مستخدم',
            'address.required' => 'حقل العنوان مطلوب',
            'phone.required' => 'حقل الهاتف مطلوب',
            'phone.numeric' => 'حقل الهاتف يجب ان يحتوي على أرقام فقط',
            'phone.digits' => 'حقل الهاتف يحتوي على 10 أرقام فقط',
            'phone.starts_with' => 'حقل الهاتف يجب أن يبدأ بالأرقام 07',
            'image.required' => 'حقل الصورة مطلوب',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.min' => 'حقل كلمة المرور يجب أن يحتوي على 8 خانات على الأقل',
            'passwrod.confirmed' => 'كلمات المرور غير متطابقة'
        ]);

        $newUser = new User;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->address = $request->address;
        $newUser->phone = $request->phone;
        // $newUser->image = base64_encode(file_get_contents($request->file('image')));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('images/', $fileName);
            $newUser->image = $fileName;
        }
        $newUser->password = Hash::make($request->password);

        $newUser->save();
        Alert::success('أهلا وسهلا', 'تمت عملية التسجيل بنجاح');
        Auth::login($newUser);

        return redirect('/index');
    }

    public function ownerRegister(Request $request)
    {

        $request->validate([
            'owner_name' => 'required', //
            'email' => 'required|unique:users', //
            'store_name' => 'required',
            'owner_phone' => 'required|numeric|digits:10|starts_with:07', //
            'category' => 'required',
            'description' => 'required',
            'store_address' => 'required|max:50', //
            'store_image' => 'required', //
            'owner_password' => 'required|min:8|confirmed' //

        ], [
            'owner_name.required' => 'حقل الإسم مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.unique' => 'هذا الحساب مستخدم',
            'store_name.required' => 'حقل إسم المتجر مطلوب',
            'owner_phone.required' => 'حقل الهاتف مطلوب',
            'owner_phone.numeric' => 'حقل الهاتف يجب ان يحتوي على أرقام فقط',
            'owner_phone.digits' => 'حقل الهاتف يحتوي على 10 أرقام فقط',
            'owner_phone.starts_with' => 'حقل الهاتف يجب أن يبدأ بالأرقام 07',
            'category.required' => 'حقل فئة المتجر مطلوب',
            'description.required' => 'حقل وصف المتجر مطلوب',
            'store_address.required' => 'حقل العنوان مطلوب',
            'store_image.required' => 'حقل الصورة مطلوب',
            'owner_password.required' => 'حقل كلمة المرور مطلوب',
            'owner_password.min' => 'حقل كلمة المرور يجب أن يحتوي على 8 خانات على الأقل',
            'owner_password.confirmed' => 'كلمات المرور غير متطابقة'
        ]);

        $newOwner = new User;
        $newOwner->roll = 'owner';
        $newOwner->name = $request->owner_name;
        $newOwner->email = $request->email;
        $newOwner->address = $request->store_address;
        $newOwner->phone = $request->owner_phone;
        // $newOwner->image = base64_decode(file_get_contents($request->file('store_image')));

        if ($request->hasFile('store_image')) {
            $file = $request->file('store_image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extention;
            $file->move('images/', $fileName);
            $newOwner->image = $fileName;
        }
        $newOwner->password = Hash::make($request->owner_password);

        $newOwner->save();
        //------------------
        $newStore = new Store;
        $newStore->user_id = $newOwner->id;
        $newStore->store_name = $request->store_name;
        $newStore->category = $request->category;
        $newStore->description = $request->description;

        Auth::login($newOwner);
        Alert::success('نجاح', 'تمت عملية التسجيل بنجاح... سوف يتم قبول طلبك من قبل المشرف قريبا ليتم عرض متجرك في في الموقع ');
        $newStore->save();

        return redirect('/owner');
    }



    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'password.required' => 'حقل كلمة المرور مطلوب'
        ]);
        // dd($request->password);
        $credentials = $request->only('email', 'password');

        if (auth::attempt($credentials)) {

            if (Auth::user()->roll == 'user') {
                Alert::success('نجاح', 'لقد قمت بتسجيل الدخول الآن');
                $request->session()->regenerate();
                return redirect('/index');
            } elseif (Auth::user()->roll == 'owner') {
                // $stores = Auth::user()->stores;
                // $owner = Auth::user();
                Alert::success('نجاح', 'لقد قمت بتسجيل الدخول الآن');
                $request->session()->regenerate();
                return redirect('/owner');
            } elseif (Auth::user()->roll == 'admin') {
                Alert::success('نجاح', 'أهلا مشرف الموقع');
                return redirect('/index-dashboard');
            }
        } else {

            // dd($request->email);
            return back()->with('error', 'البريد الإلكتروني أو كلمة المرور أو كلاهما غير صحيح');
        }
    }


    public function logout()
    {
        //empty the cart after the user logout even without done purchase !!!
        // DB::table('carts')->delete();
        Auth::logout();
        Session::flush();

        return redirect('/index');
    }
}
