@extends('layout.master')
@section('new-class', 'second-nav')

@section('content')

    @include('sweetalert::alert')

    <!-- ======= Contact Section ======= -->
    <section class="contact mt-5 mb-5" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i style="color:#1e4356" class="bx bx-map"></i>
                                <h3 style="font-family: 'Lemonada', cursive;">عنواننا</h3>
                                <p class="my-font">الزرقاء-الزرقاء الجديدة-البتراوي-عمارة رقم 77</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i style="color:#1e4356" class="bx bx-envelope"></i>
                                <h3 style="font-family: 'Lemonada', cursive;">أرسل بريد إلكتروني</h3>
                                <p>zarqamall@example.com<br>contact@yahoo.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i style="color:#1e4356" class="bx bx-phone-call"></i>
                                <h3 style="font-family: 'Lemonada', cursive;">إتصل بنا</h3>
                                <p>+962-5589 55488 55<br>+962-6678 254445 41</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 form-div">

                    <form action="/userContactMessage/{{ auth()->user()->id }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input style="text-align: right;" type="email" class="form-control" name="email"
                                    id="email" placeholder="البريد الإلكتروني" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input style="text-align: right;" type="text" name="name" class="form-control"
                                    id="name" placeholder="الإسم" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input style="text-align: right;" type="text" class="form-control" name="subject"
                                id="subject" placeholder="الموضوع" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea style="text-align: right;" class="form-control" name="message" rows="5" placeholder="الرسالة" required></textarea>
                        </div>
                        <div class="text-center"><button style="background-color: #1e4356" class="my-font"
                                type="submit">إرسال</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->

    <div style="text-align: right; height:200px; font-size:50px" class="container col-md-10 my-font mb-5">
        ...شكرا لزيارتكم
    </div>

    <!-- ======= Map Section ======= -->
    {{-- <section class="map mt-2">
      <div class="container-fluid p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.71312937933185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a23e28c1191%3A0x49f75d3281df052a!2s150%20Park%20Row%2C%20New%20York%2C%20NY%2010007%2C%20USA!5e0!3m2!1sen!2sbg!4v1579767901424!5m2!1sen!2sbg" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </section> --}}
    <!-- End Map Section -->

    <!-- End #main -->
@endsection
