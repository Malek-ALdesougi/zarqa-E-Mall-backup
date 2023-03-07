@extends('layout.master')

@section('above-main')
@include('sweetalert::alert')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-cntent-center align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown" style="font-family: 'Lemonada', cursive;"> أهلا بكم في
                        <span>متجر الزرقاء الإلكتروني</span>
                    </h2>

                    <a id="stores-anchor" style="font-family: 'Lemonada', cursive;" href="#stores"
                        class="btn-get-started animate__animated animate__fadeInUp">إنتقل للمتاجر </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->
@endsection

@section('content')
    <!-- ======= Our store Section ======= -->
    <section style="margin-top:80px" class="breadcrumbs">
        <div class="container">
            <div id="stores" class="d-flex justify-content-center align-items-center">
                <h2 class="my-font text-center">كل المتاجر</h2>
            </div>
        </div>
    </section>

    <!-- End Our store Section -->

    <!-- ======= store Section ======= -->
    <section class="store">
        <div class="container">

            <div class="row d-flex justify-content-center col-md-12 " style=" direction: rtl">
                <div class="col-lg-8">
                    <ul id="store-flters">
                        @foreach ($categories as $category)
                            <a id="malek" href="{{ route('index', ['category' => $category]) }}">
                                <li style="font-family: 'Lemonada', cursive;">{{ $category }}</li>
                            </a>
                            {{-- <li style="font-family: 'Lemonada', cursive;" class="filter-active">الكل</li>
                        <li style="font-family: 'Lemonada', cursive;" >مواد تموينية</li> --}}
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 text-right mb-2">
                    <form action="">
                        <input type="text" name="search" type="text" class="text-end" placeholder="البحث من خلال اسم المتجر">
                        <button type="submit" style="backgrund-color:#1e4356" id="search-button">إبحث</button>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <div class=" d-flex flex-wrap justify-content-center">
                    @foreach ($owners as $owner)
                        @if ($owner->stores->status === 1)
                            <div class="col-md-4">
                                <div class="store-item">
                                    <a href="store/{{$owner->stores->id}}">
                                        <img style="width:100%; height:300px" src="images/{{ $owner->image }}"
                                            alt="avhellllatar" class="img-fluid">
                                        <a>
                                            <div class="store-div"
                                                style="background-color:#1e4356; color:white; padding:20px; height: 155px; overflow:scroll"
                                                class="details mt-0">
                                                <p class="right my-font"><strong>إسم المتجر</strong>:
                                                    {{ $owner->stores->store_name }}</p>
                                                <p class="right my-font fs-6"><strong> فئة المتجر </strong>:
                                                    {{ $owner->stores->category }}
                                                </p>
                                            </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>

        </div>
    </section>
    <!-- End store Section -->
    @include('sweetalert::alert')

@endsection
