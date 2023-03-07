@extends('layout.master')
@section('new-class', 'second-nav')


@section('content')
@include('sweetalert::alert')


    {{-- -------------------------------- Login form ---------------------------- --}}
    <section class="vh-100" style="background-color: #223b4b;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-10">
                    <div class="card" style="border-radius: 1rem; height:530px;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img style="border-radius:10px; margin-top:50px" src="assets/img/Forgotpassword-rafiki.png"
                                    alt="login form" class="w-100 ms-4" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="/login-user" method="POST" enctype="multipart/form-data">
                                        @method('GET')
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3 mb-3" style="color: #1e4356;"></i>
                                            <span class="h1 fw-bold mb-0 ">
                                                <p class="my-font my-color ">Zarqa E-Mall</p>
                                            </span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3 my-font right" style="letter-spacing: 1px;">تسجيل الدخول إلى حسابك</h5>

                                        @if (session('error'))
                                           <p style="font-size:medium" class="text-danger mb-0 right">{{ session('error') }}</p>
                                        @endif

                                        @error('email')
                                          <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                                        @enderror
                                        <div class="form-outline mb-4">
                                            <input name="email" type="email" id="form2Example17"
                                                class="form-control form-control-lg right" />
                                            <label class="form-label" for="form2Example17">البريد الإلكتروني</label>
                                        </div>

                                        @error('password')
                                          <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                                        @enderror
                                        <div class="form-outline mb-4">
                                            <input name="password" type="password" id="form2Example27"
                                                class="form-control form-control-lg" />
                                            <label class="form-label right" for="form2Example27">كلمة المرور</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button style="background-color: #1e4356"
                                                class="btn text-light btn-lg btn-block" type="submit"><p class="my-font d-inline">تسجيل الدخول</p></button>
                                        </div>

                                        <a class="small text-muted right" href="#!">
                                            <p class="my-font fs-6">هل نسيت كلمة المرور؟</p>
                                        </a>
                                        <p class="mb-5 pb-lg-2 right my-font" style="color: #393f81;">لا أمتلك حساب ,<a
                                                href="register" style="color: #e71811; margin-right:7px;">سجل الآن</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- -------------------------------------- End of Login form  ------------------------------------- --}}



    {{-- <div style="background-color:#223b4b;">
        <div id="register" style="border-radius:20px;" class="container d-flex justify-content-center bg-light col-md-8">
            <section class="col-md-6"> --}}
                <!--------------- Pills navs -------------->
                {{-- <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active my-font" id="tab-login" data-mdb-toggle="pill" href="#pills-login"
                            role="tab" aria-controls="pills-login" aria-selected="true">إنشاء حساب كمستخدم</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link my-font" id="tab-register" data-mdb-toggle="pill" href="#pills-register"
                            role="tab" aria-controls="pills-register" aria-selected="false">إنشاء حساب كمالك محل</a>
                    </li>
                </ul> --}}

                {{-- ----------------------------------- USER REGISTERATION FORM ------------------------------------ --}}
                {{-- <div class="tab-content">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <form>
                            <p class="my-color text-center my-font fs-7">: تسجيل الدخول من خلال</p>
                            <div class="d-flex justify-content-evenly  mb-3">
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fs-2 fa-google"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fs-2 fab fa-facebook-f"></i>
                                </button>

                            </div>

                            <p class="text-center my-font my-color">أو </p>

                            <div class="form-outline mb-4">
                                <input type="text" id="registerName" class="form-control right" />
                                <label class="form-label" for="registerName">الإسم</label>
                            </div> --}}

                            <!-- Email input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="email" id="registerEmail" class="form-control right" />
                                <label class="form-label" for="registerEmail">البريد الإلكتروني</label>
                            </div> --}}

                            <!-- address input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="text" id="registerAddress" class="form-control right" />
                                <label class="form-label" for="registerAddress"> العنوان</label>
                            </div> --}}

                            <!-- phone input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="number" id="registerNumber" class="form-control right" />
                                <label class="form-label" for="registerNumber">الهاتف</label>
                            </div> --}}

                            <!-- Password input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="password" id="registerPassword" class="form-control right" />
                                <label class="form-label" for="registerPassword">كلمة المرور</label>
                            </div> --}}

                            <!-- Repeat Password input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="password" id="registerRepeatPassword" class="form-control right" />
                                <label class="form-label" for="registerRepeatPassword">إعادة كلمة المرور</label>
                            </div> --}}

                            <!-- Checkbox -->
                            {{-- <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck"
                                    checked aria-describedby="registerCheckHelpText" />
                                <label class="form-check-label my-font" for="registerCheck">
                                    لقد قرأت ووافقت على الشروط
                                </label>
                            </div> --}}

                            <!-- Submit button -->
                            {{-- <button style="background-color:#1e4356; color:white;" type="submit"
                                class="btn btn-block mb-3">
                                <p class="my-font d-inline">تسجيل</p>
                            </button>

                        </form>
                    </div> --}}


                    {{-- ------------------------------------ STORE OWNER REGISTERATION FORM ------------------------------------- --}}

                    {{-- <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form>
                            <p class="my-color text-center my-font fs-7">: تسجيل الدخول من خلال</p>
                            <div class="d-flex justify-content-evenly  mb-3">
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fs-2 fa-google"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fs-2 fab fa-facebook-f"></i>
                                </button>
                            </div>

                            <p class="text-center my-font my-color">أو </p> --}}


                            <!-- Name input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="text" id="registerName" class="form-control right" />
                                <label class="form-label" for="registerName">الإسم</label>
                            </div> --}}

                            <!-- Email input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="email" id="registerEmail" class="form-control right" />
                                <label class="form-label" for="registerEmail">البريد الإلكتروني</label>
                            </div> --}}

                            <!-- STORE NAME input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="text" id="registerStoreName" class="form-control right" />
                                <label class="form-label" for="registerStoreName">إسم المتجر</label>
                            </div> --}}

                            <!-- STORE Phone input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="text" id="registerPhone" class="form-control right" />
                                <label class="form-label" for="registerPhone">رقم الهاتف</label>
                            </div> --}}

                            <!-- STORE category input -->
                            {{-- <select class="form-select mb-4" aria-label="Default select example">
                                <option selected>فئة المتجر</option>
                                <option value="1">ملابس</option>
                                <option value="2">كهربائيات</option>
                                <option value="3">أثاث</option>
                                <option value="4">ألعاب وهدايا</option>
                                <option value="5">ساعات وعطور</option>
                                <option value="6">منظفات</option>
                                <option value="7">مواد تموينية</option>
                                <option value="8">أجهزة ذكية وحواسيب</option>
                                <option value="9">أخرى</option>
                            </select> --}}

                            <!-- STORE description input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="text" id="registerStoreDescription" class="form-control right" />
                                <label class="form-label" for="registerStoreDescription">وصف المتجر</label>
                            </div> --}}

                            <!-- STORE address input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="text" id="registerStoreAddress" class="form-control right" />
                                <label class="form-label" for="registerStoreAddress">العنوان</label>
                            </div> --}}

                            <!-- STORE IMAGE input -->
                            {{-- <div class=" mb-4">
                                <label for="formFileLg" class="form-label">صورة المتجر</label>
                                <input class="form-control form-control-lg" id="formFileLg" type="file" />
                            </div> --}}

                            <!-- Password input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="password" id="registerPassword" class="form-control right" />
                                <label class="form-label" for="registerPassword">كلمة المرور</label>
                            </div> --}}

                            <!-- Repeat Password input -->
                            {{-- <div class="form-outline mb-4">
                                <input type="password" id="registerRepeatPassword" class="form-control right" />
                                <label class="form-label" for="registerRepeatPassword">إعادة كلمة المرور</label>
                            </div> --}}

                            <!-- Checkbox -->
                            {{-- <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck"
                                    checked aria-describedby="registerCheckHelpText" />
                                <label class="form-check-label my-font" for="registerCheck">
                                    لقد قرأت ووافقت على الشروط
                                </label>
                            </div> --}}

                            <!-- Submit button -->
                            {{-- <button style="background-color:#1e4356; color:white;" type="submit"
                                class="btn btn-block mb-3">
                                <p class="my-font d-inline">تسجيل</p>
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div> --}}


@endsection
