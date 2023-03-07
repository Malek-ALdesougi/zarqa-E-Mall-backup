@extends('layout.master')
@section('new-class', 'second-nav')

@section('content')
    <!-- ======= About Section ======= -->
    <section class="about mt-5" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="https://www.saaih.com/files/travel/%D8%A7%D9%84%D8%B2%D8%B1%D9%82%D8%A7%D8%A1/%D9%85%D9%88%D8%A7%D8%B7%D9%86%D9%88%D9%86%20%D9%8A%D8%AA%D8%AC%D9%88%D9%84%D9%88%D9%86%20%D9%81%D9%8A%20%D8%B4%D8%A7%D8%B1%D8%B9%20%D8%A7%D9%84%D8%B3%D8%B9%D8%A7%D8%AF%D8%A9%20%D8%A7%D9%84%D9%85%D8%B1%D9%83%D8%B2%20%D8%A7%D9%84%D8%AA%D8%AC%D8%A7%D8%B1%D9%8A%20%D9%84%D9%85%D8%AF%D9%8A%D9%86%D8%A9%20%D8%A7%D9%84%D8%B2%D8%B1%D9%82%D8%A7%D8%A1%20-%20%2528%D8%A3%D8%B1%D8%B4%D9%8A%D9%81%D9%8A%D8%A9%2529.jpg"
                        class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <h3 style="text-align: right; font-family: 'Lemonada', cursive;">ما هو متجر الزرقاء الإلكتروني؟</h3><br>
                    <p style="text-align: right; font-family: 'Lemonada', cursive; word-spacing: 5px;">
                        متجر شارع السعادة الإلكتروني هو أول موقع إلكتروني متخصص لجميع المتاجر في شارع السعادة, ويضم هذا
                        الموقع الكثير من المتاجر
                        الواقعة في هذا الشارع ,مهمتنا هي جعل الوصول إلى أي من هذه المتاجر أسهل و أسرع وبغض النظر عن التوقيت
                        إذ يمكنكم زيارة موقعنا في أي وقت
                    </p>
                    <ul>
                        <li style="text-align: right;" class="my-font">البحث عن البضائع والخدمات بطريقة فعالة<i
                                class="bi bi-check2-circle"></i> </li>
                        <li style="text-align: right;" class="my-font">موقنا مناسب لخدمة جميع الأعمار<i
                                class="bi bi-check2-circle"></i> </li>
                        <li style="text-align: right;" class="my-font">الشريك الأنسب لأصحاب المحال التجارية أو الخدمية <i
                                class="bi bi-check2-circle"></i> </li>

                    </ul>
                    <p>

                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section class="facts section-bg" data-aos="fade-up">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="2"
                        class="purecounter my-font fs-4">{{$users}}</span>
                    <span class="my-font fs-6">العملاء</span>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="555" data-purecounter-duration="1"
                        class="purecounter my-font fs-4">{{$stores}}</span>
                    <span class="my-font fs-6">المتاجر</span>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="2"
                        class="purecounter my-font fs-4">{{$orders}}</span>
                    <span class="my-font fs-6">إجمالي المبيعات</span>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="4" data-purecounter-end="15" data-purecounter-duration="0"
                        class="purecounter my-font fs-4">{{$products}}</span>
                    <span class="my-font fs-6">إجمالي البضائع</span>
                </div>

            </div>

        </div>
    </section>
    <!-- End Facts Section -->
@endsection
