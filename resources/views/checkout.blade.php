@extends('layout.master')
@section('new-class', 'second-nav')


@section('content')
    @include('sweetalert::alert')

    <div style="margin-top:100px; margin-bottom:200px"
        class="container col-md-12 mb-5 d-flex jutify-content-center flex-wrap">

        {{-- <div class="row d-flex"> --}}
        {{-- this table will be read from cart table --}}
        <div class="col-sm-8" style="background-color:#1e4356">
            <div class="card mt-2 mb-2">
                <h4 class="card-header my-font right">قائمة المشتريات</h4>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead style="background-color:#1e4356; color:white">
                            <tr>
                                <th></th>
                                {{-- <th class="my-font right">إسم المتجر</th> --}}
                                <th class="my-font right">الصورة</th>
                                <th class="my-font right">الكمية</th>
                                <th class="my-font right">السعر</th>
                                <th class="my-font right">إسم المنتج</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @if (auth()->user())

                                @foreach (App\Models\Cart::where('user_id', auth()->user()->id)->get() as $item)
                                    @if ($product = App\Models\Product::find($item->product_id))
                                        <tr class="align-items-center">
                                            <td>
                                                <div class="">
                                                    <form method="GET" action="/delete-checkout-item/{{ $item->id }}">
                                                        <button type="submit"
                                                            class="bx bx-trash text-danger me-1 border-0 bg-light fs-4 mt-2"></button>
                                                    </form>
                                                    {{-- <a class="text-danger fs-4" href="javascript:void(0);"><i
                                                            class="bx bx-trash text-danger me-1"></i></a> --}}
                                                </div>
                                            </td>
                                            <td>
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top" class="avatar avatar-xs pull-up" title=""
                                                    data-bs-original-title="Lilian Fuller">
                                                    <img width='40px' height="40px" src="images/{{ $product->image }}"
                                                        alt="Avatar" class="">
                                                </li>
                                            </td>
                                            <td class="text-center my-font"><span>{{ $item->quantity }}</span></td>
                                            <td class="my-font right">{{ $product->price }} JOD</td>
                                            <td class="my-font right"><strong>{{ $product->name }}</strong></td>
                                        </tr>
                                    @else
                                    @endif
                                @endforeach
                            @endif
                            <tr style="background-color:#1e4356; color:white">
                                <td></td>
                                <td></td>
                                <td></td>
                                @if (auth()->user() && $totalPrice)
                                    <td class="my-font fs-5 fw-bolder right">{{ $totalPrice }} JOD</td>
                                    <td class="my-font fs-5 fw-bolder right">المجموع الكلي</td>
                                @else
                                    <td class="my-font fs-5 fw-bolder right">0 JOD</td>
                                    <td class="my-font fs-5 fw-bolder right">المجموع الكلي</td>
                                @endif
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>

        <div class="col-md-1"></div>

        <div class="form col-md-3">
            <div class="mb-3 d-flex justify-content-end">
                <h3 class="my-font mb-2"> معلومات الدفع</h3>
            </div>
            <form  action="/place-order" method="GET">
                <!-- input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form4Example1" class="form-control" />
                    <label class="form-label" for="form4Example1">رقم البطاقة</label>
                </div>
                <input name="userId" type="hidden" value="{{auth()->user()->id}}">
                <!--  input -->
                <div class="form-outline mb-4">
                    <input type="date" id="form4Example2" class="form-control" />
                    <label class="form-label" for="form4Example2"> تاريخ إنتهاء البطاقة</label>
                </div>

                <!--  input -->
                <div class="form-outline mb-4">
                    <input type="number" id="form4Example2" class="form-control" />
                    <label class="form-label" for="form4Example2">CVC/CVV</label>
                </div>

                <!--  input -->
                <div class="form-outline mb-4">
                    <input type="text" id="form4Example2" class="form-control" />
                    <label class="form-label" for="form4Example2">الرمز البريدي</label>
                </div>


                <!-- Checkbox -->
                {{-- <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />
                    <label class="form-check-label" for="form4Example4">
                        Cach on dilevary
                    </label>
                </div> --}}

                <!-- Submit button -->
                    <button type="submit" style="background-color:#1e4356; color:white" class="btn btn-block mb-4">
                        <p class="my-font d-inline">إرسال الطلب</p>
                    </button>
            </form>
        </div>
    </div>
    </div>

@endsection
