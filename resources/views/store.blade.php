@extends('layout.master')
@section('new-class', 'second-nav')

@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
@endsection

@section('content')
    @include('sweetalert::alert')

    <!-- ======= Our store Section ======= -->
    @if (session('success'))
        <script>
            alert('product added successfully !!')
        </script>
    @endif
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Store Details</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="stores.html">Stores</a></li>
                    <li>Store Details</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Our store Section -->

    <!-- ======= store Details Section ======= -->
    <section id="store-details" class="store-details">
        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-1"></div>

                <div class="col-lg-6 d-flex align-items-center">
                    <div class="store-details-slider swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img width="400px" height="450px" src="../images/{{ $store->user->image }}" alt="nope">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="store-info">
                        <h3 style="text-align: right; font-family: 'Lemonada', cursive;">معلومات عن المتجر</h3>
                        <ul>
                            <li style="text-align: right; font-family: 'Lemonada', cursive;"><strong>إسم
                                    المتجر</strong>:{{ $store->store_name }}</li>
                            <li style="text-align: right; font-family: 'Lemonada', cursive;"><strong>
                                    الفئة</strong>:{{ $store->category }}
                            </li>
                            <li style="text-align: right; font-family: 'Lemonada', cursive;"><strong>العنوان
                                </strong>:{{ $store->user->address }} </li>
                            <li style="text-align: right; font-family: 'Lemonada', cursive;"><strong>الهاتف
                                </strong>:{{ $store->user->phone }}</li>
                        </ul>
                        <div class="store-description">
                            <h2 style="text-align: right; font-family: 'Lemonada', cursive;">وصف المتجر</h2>
                            <p class="des" class=" right my-font">
                                {{ $store->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End store Details Section -->


    <section style="margin-top:30px" class="breadcrumbs">
        <div class="container">
            <div id="stores" class="d-flex justify-content-center align-items-center">
                <h2 class="my-font text-center"> البضائع</h2>
            </div>
        </div>
    </section>


    <div class="row col-md-12">
        <div class="d-flex justify-content-center col-md-12 text-right mb-2 mt-5 flex-wrap">

            {{-- -------- Filter button ----- --}}
            <div class="col-md-4 mb-3">
                <form class="d-flex" action="" method="GET">
                    <select name="filter" class="form-select my-font">
                        <option value="asc" class="my-font">--نوع التصفية--</option>
                        <option id="asc" value="asc" class="my-font">من الأصغر للأكبر</option>
                        <option id="des" class="selected" value="des">من الأكبر للأصغر</option>
                    </select>
                    <button type="submit" style="background-color: #1e4356; width:200px" class="btn text-light ms-1"
                        type="button">
                        <p class="my-font d-inline">تصفية حسب السعر </p>
                    </button>
                </form>
            </div>

            {{-- ------ Search form ---- --}}
            <div class="col-md-6">
                <form action="" class="ms-4">
                    <input type="text" name="product" type="text" class="text-end rounded p-1"
                        placeholder="البحث من خلال اسم المنتج">
                    <button class="rounded p-1" type="submit" style="backgrund-color:#1e4356;"
                        id="search-button">إبحث</button>
                </form>
            </div>
        </div>
    </div>

    {{-- store products section --}}

    <div style="padding-right:0; padding-left:30px;" class="row mt-5 g-4 col-md-12 d-flex justify-content-evenly">

        @if ($products)
            @forelse ($products as $product)
                <div class="col-sm-4 col-md-6 col-lg-3 shadow-lg p-3 mb-5 rounded">
                    <div class="card">
                        <img width="300px;" height="200px;" src="../images/{{ $product->image }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="my-font fw-bolder text-center h-25" class="card-title right">
                                {{ $product->name }}
                            </h5><br>
                            <div class="justify-content-center flex-wrap">
                                {{-- <p style="text-align:right; "><strong style="color:#1e4356; font-family:'Lemonada', cursive;">JOD
                                    /{{ $product->price }}السعر :<span></span></strong></p> --}}
                                <p class="right text-end"><strong class="my-color my-font">السعر دأ :
                                        {{ $product->price }}</strong></p>
                                <p class="right text-end "><strong class=" mb-3 my-color my-font">الكمية المتوفرة:
                                        {{ $product->quantity }}</strong></p>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button id="modal-button" style="background-color: #6d99b0;" type="button"
                                    class="btn my-font col-md-6" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop{{ $product->id }}">
                                    <span class="my-font text-light my-color">التفاصيل</span>
                                </button>
                            </div>
                            <hr>
                            <!-- Button trigger modal -->
                            <div class="d-flex justify-content-evenly flex-wrap gap-3">
                                <form class="col-md-12 d-flex justify-content-center flex-wrap"
                                    action="/add-cart/{{ $product->id }}" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-evenly mb-2">
                                        @if (auth()->user())
                                            <input name="current_user" type="hidden" value="{{ Auth::user()->id }}">
                                        @endif
                                        <input name="quantity" id="quantity" class="w-25" type="number"
                                            placeholder="1">
                                        <label class="my-font" for="quantity">الكمية المطلوبة</label>
                                    </div>

                                    <button style="background-color: #1e4356; color:white" type="submit"
                                        class="btn col-md-12">
                                        <span class="my-font text-light my-color">أضف إلى السلة</span>
                                        <i style="margin-left:3px;" class="fas fa-shopping-cart"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop{{ $product->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{-- <img height="400px;" width="200px;" src='../images/{{ $product->image }}' class="card-img-top"
                                alt="..."> --}}
                            <div class="modal-header d-flex justify-content-center">
                                <h5 class="my-font fw-bolder my-color my-font" id="staticBackdropLabel">
                                    {{ $product->name }}</h5>
                            </div>
                            <div class="modal-body">
                                <p class="right"><strong class="my-color my-font">:الوصف</strong></p>
                                <p class="card-text right my-color my-font"> {{ $product->description }}
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span
                                        class="my-font text-light my-color">إغلاق</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                    <h3 class="my-font">لا يوجد منتجات في هذا المتجر بعد</h3>
                </div>
            @endforelse
        @else
            <h1>nothig to show </h1>
        @endif
    </div>




@endsection
