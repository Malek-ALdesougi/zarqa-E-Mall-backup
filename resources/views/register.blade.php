@extends('layout.master')
@section('new-class', 'second-nav')


@section('content')
@include('sweetalert::alert')

{{-- <div class="container"> --}}
 <div style="background-color:#223b4b; padding-top:110px">

        <div id="register" style="border-radius:20px;" class="container d-flex justify-content-center bg-light col-md-8">
            <section class="col-md-6">
                <!--------------- Pills navs -------------->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active my-font fs-6" id="tab-login" data-mdb-toggle="pill" href="#pills-login"
                            role="tab" aria-controls="pills-login" aria-selected="true">إنشاء حساب كمستخدم</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link my-font fs-6" id="tab-register" data-mdb-toggle="pill" href="#pills-register"
                            role="tab" aria-controls="pills-register" aria-selected="false">إنشاء حساب كمالك محل</a>
                    </li>
                </ul>

                {{-- ----------------------------------- USER REGISTERATION FORM ------------------------------------ --}}
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <form action="/register-user" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p class="my-color text-center my-font fs-7">: تسجيل الدخول من خلال</p>
                            <div class="d-flex justify-content-evenly  mb-3">
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fs-2 fa-google"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i  class="fs-2 fab fa-facebook-f"></i>
                                </button>

                            </div>

                            <p class="text-center my-font my-color">أو </p>

                            <!-- name input -->
                            @error('name')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="name" type="text" id="registerName" class="form-control right" />
                                <label class="form-label" for="registerName"><p class="my-font">الإسم</p></label>
                            </div>

                            <!-- Email input -->
                            @error('email')
                                  <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="email" type="email" id="registerEmail" class="form-control right" />
                                <label class="form-label" for="registerEmail"><p class="my-font">البريد الإلكتروني</p></label>
                            </div>

                            <!-- address input -->
                            @error('address')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="address" type="text" id="registerAddress" class="form-control right" />
                                <label class="form-label" for="registerAddress"> <p class="my-font"> العنوان</p></label>
                            </div>

                            <!-- phone input -->
                            @error('phone')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="phone" type="number" id="registerNumber" class="form-control right" />
                                <label class="form-label" for="registerNumber"><p class="my-font"> الهاتف</p></label>
                            </div>

                            <!-- USER IMAGE input -->
                            @error('image')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class=" mb-4">
                                <label for="formFileLg" class="form-label"><p class="my-font"> صورة المستخدم</p></label>
                                <input name="image" class="form-control form-control-lg w-100" id="formFileLg" type="file" />
                            </div>

                            <!-- Password input -->
                            @error('password')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="password" type="password" id="registerPassword" class="form-control right" />
                                <label class="form-label" for="registerPassword"><p class="my-font"> كلمة المرور</p></label>
                            </div>

                            <!-- Repeat Password input -->
                            @error('password_confirmation')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="password_confirmation" type="password" id="registerRepeatPassword" class="form-control right" />
                                <label class="form-label" for="registerRepeatPassword"><p class="my-font">إعادة كلمة المرور</p></label>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck"
                                    checked aria-describedby="registerCheckHelpText" />
                                <label class="form-check-label my-font" for="registerCheck">
                                    لقد قرأت ووافقت على الشروط
                                </label>
                            </div>

                            <!-- Submit button -->
                            <button style="background-color:#1e4356; color:white;" type="submit"
                                class="btn btn-block mb-3">
                                <p class="my-font d-inline">تسجيل</p>
                            </button>

                            <p class="mb-5 pb-lg-2 right my-font" style="color: #393f81;">أمتلك حساب مسبقا<a
                                href="login" style="color: #e71811; margin-right:7px;"> تسجيل الدخول</a></p>
                        </form>
                    </div>


                    {{-- ------------------------------------ STORE OWNER REGISTERATION FORM ------------------------------------- --}}

                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form action="/register-owner" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p class="my-color text-center my-font fs-7">: تسجيل الدخول من خلال</p>
                            <div class="d-flex justify-content-evenly  mb-3">
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fs-2 fa-google"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i  class="fs-2 fab fa-facebook-f"></i>
                                </button>
                            </div>

                            <p class="text-center my-font my-color">أو </p>


                            <!-- Name input -->
                            @error('owner_name')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="owner_name" type="text" id="registerName" class="form-control right" />
                                <label class="form-label" for="registerName"><p class="my-font">الإسم</p></label>
                            </div>

                            <!-- Email input -->
                            @error('email')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="email" type="email" id="registerEmail" class="form-control right" />
                                <label class="form-label" for="registerEmail"><p class="my-font">البريد الإلكتروني</p></label>
                            </div>

                            <!-- STORE NAME input -->
                            @error('store_name')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="store_name" type="text" id="registerStoreName" class="form-control right" />
                                <label class="form-label" for="registerStoreName"><p class="my-font">إسم المتجر</p></label>
                            </div>

                            <!-- STORE Phone input -->
                            @error('owner_phone')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="owner_phone" type="text" id="registerPhone" class="form-control right" />
                                <label class="form-label" for="registerPhone"><p class="my-font">رقم الهاتف</p></label>
                            </div>

                            <!-- STORE category input -->
                            @error('category')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <select name="category" class="form-select mb-4" aria-label="Default select example">
                                <option value=''>--فئة المتجر--<option>
                                <option value="ملابس">ملابس</option>
                                <option value="كهربائيات">كهربائيات</option>
                                <option value="أثاث">أثاث</option>
                                <option value=">ألعاب وهدايا">ألعاب وهدايا</option>
                                <option value="ساعات وعطور">ساعات وعطور</option>
                                <option value="منظفات">منظفات</option>
                                <option value="مواد تموينية">مواد تموينية</option>
                                <option value="أجهزة ذكية وحواسيب">أجهزة ذكية وحواسيب</option>
                                <option value="أخرى">أخرى</option>
                             </select>

                            <!-- STORE description input -->
                            @error('description')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="description" type="text" id="registerStoreDescription" class="form-control right" />
                                <label class="form-label" for="registerStoreDescription"><p class="my-font">وصف المتجر</p></label>
                            </div>

                            <!-- STORE address input -->
                            @error('store_address')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="store_address" type="text" id="registerStoreAddress" class="form-control right" />
                                <label class="form-label" for="registerStoreAddress"><p class="my-font">العنوان</p></label>
                            </div>

                            <!-- STORE IMAGE input -->
                            @error('store_image')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class=" mb-4">
                                <label for="formFileLg" class="form-label"><p class="my-font">صورة المتجر</p></label>
                                <input name="store_image" class="form-control form-control-lg" id="formFileLg" type="file" />
                            </div>

                            <!-- Password input -->
                            @error('owner_password')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="owner_password" type="password" id="registerPassword" class="form-control right" />
                                <label class="form-label" for="registerPassword"><p class="my-font">كلمة المرور</p></label>
                            </div>

                            <!-- Repeat Password input -->
                            @error('owner_password_confirmation')
                            <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                            @enderror
                            <div class="form-outline mb-4">
                                <input name="owner_password_confirmation" type="password" id="registerRepeatPassword" class="form-control right" />
                                <label class="form-label" for="registerRepeatPassword"><p class="my-font">إعادة كلمة المرور</p></label>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck"
                                    checked aria-describedby="registerCheckHelpText" />
                                <label class="form-check-label my-font" for="registerCheck">
                                    لقد قرأت ووافقت على الشروط
                                </label>
                            </div>

                            <!-- Submit button -->
                            <button style="background-color:#1e4356; color:white;" type="submit"
                                class="btn btn-block mb-3">
                                <p class="my-font d-inline">تسجيل</p>
                            </button>

                            <p class="mb-5 pb-lg-2 right my-font fs-6" style="color: #393f81;">أمتلك حساب مسبقا<a
                                href="login" style="color: #e71811; margin-right:7px;"> تسجيل الدخول</a></p>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
{{-- </div> --}}

@endsection