@extends('layout.master')
@section('new-class', 'second-nav')


@section('content')
    @include('sweetalert::alert')



    <section style="background-color: #eee; ">
        <div class="container py-5">
            {{-- user information card --}}
            <div class="row align-items-center"style=" direction: rtl;">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div style="background-color:#1e4356" class="card-body text-center">
                            <img src="images/{{ $currentUser[0]->image }}" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                            <h3 style="color:white" class="my-3 mb-5">{{ $currentUser[0]->name }}</h3>
                            <button type="button" class="btn btn-light d-inline" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                                <p style="color: #1e4356" class="d-inline my-font">تعديل الملف الشخصي</p>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- -------------------------------------------------- edit the user data modal -------------------------------------------------------------------------- --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    <p class="d-inline my-font">معلومات الملف الشخصي</p>
                                </h5>
                                {{-- <button type="button" class="btn-close d-inline" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            </div>
                            <div class="modal-body">
                                <form action="/edit-user-profile/{{ auth()->user()->id }}" method="POST">
                                    @csrf
                                    @error('name')
                                        <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label my-font">الإسم</label>
                                        <input value="{{ $currentUser[0]->name }}" type="text" name="name"
                                            class="form-control" id="recipient-name">
                                    </div>


                                    @error('email')
                                        <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="recipient-email" class="col-form-label my-font">البريد
                                            الإلكتروني</label>
                                        <input value="{{ $currentUser[0]->email }}" type="text" name="email"
                                            class="form-control" id="recipient-email">
                                    </div>


                                    @error('phone')
                                        <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="recipient-phone" class="col-form-label my-font">الهاتف</label>
                                        <input value="{{ $currentUser[0]->phone }}" type="text" name="phone"
                                            class="form-control" id="recipient-phone">
                                    </div>


                                    @error('address')
                                        <p style="font-size:medium" class="text-danger mb-0 right">{{ $message }}</p>
                                    @enderror
                                    <div class="mb-3">
                                        <label for="recipient-address" class="col-form-label my-font">العنوان</label>
                                        <input value="{{ $currentUser[0]->address }}" type="text" name="address"
                                            class="form-control" id="recipient-address">
                                    </div>

                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">
                                            <p class="my-font d-inline">تعديل</p>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                            <p class="my-font d-inline">إغلاق</p>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-3 text-end">
                                    <p class="mb-0 my-font">الإسم</p>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <p class="text-muted mb-0 my-font">{{ $currentUser[0]->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-3 text-end">
                                    <p class="mb-0 my-font">البريد الإلكتروني</p>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <p class="text-muted mb-0 my-font">{{ $currentUser[0]->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-3 text-end">
                                    <p class="mb-0 my-font">الهاتف</p>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <p class="text-muted mb-0 my-font">{{ $currentUser[0]->phone }}</p>
                                </div>
                            </div>

                            {{-- <div class="row d-flex justify-content-center">
                                <div class="col-sm-3 text-end">
                                    <p class="mb-0 my-font">2 الهاتف</p>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <p class="text-muted mb-0 my-font">078-9876554</p>
                                </div>
                            </div> --}}
                            <hr>
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-3 text-end">
                                    <p class="mb-0 my-font">العنوان</p>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <p class="text-muted mb-0 my-font">{{ $currentUser[0]->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- @foreach ($orders as $order)
            {{ $test = App\Models\Order::where('id', $item->order_id)->get() }}
            {{$test[0]->total}}
            {{$order->id}}
        @endforeach --}}
        <div class="container">
            <div class="col-md-12 d-flex justify-content-center mb-3 fs-4 fw-bolder my-font">سجل المشتريات</div>
            <div class="row ">
                <div class="col-md-12">
                    <table class="table bg-light table-striped shadow" style="text-align: center">
                        <tbody>
                            <thead>
                                <th class="my-font"></th>
                                <th class="my-font"></th>
                                <th class="my-font">تاريخ و وقت الشراء</th>
                                <th class="my-font">المجموع الكلي</th>
                                <th class="my-font">رقم الطلب</th>
                            </thead>

                            @forelse ($orders as $order)
                                <tr>
                                    <td>
                                        <form id="submitBtn" action="/delete-order/{{ $order->id }}" method="GET">
                                            @csrf
                                            <button class="btn btn-danger" type="submit"
                                                onclick="event.preventDefault()
                                            const swalWithBootstrapButtons = Swal.mixin({
                                            customClass: {
                                                title: 'my-font fs-4',
                                                text: 'my-font fs-2',
                                                confirmButton: 'btn btn-success fw-bold fs-6',
                                                cancelButton: 'btn btn-danger fw-bold me-5 fs-6',
                                                confirmButtonText: '',
                                        },
                                        buttonsStyling: false
                                        })

                                        swalWithBootstrapButtons.fire({
                                            title: 'هل تريد حقاََ حذف هذا المنتج',
                                            text:'لن تكون قادراََ على إسترجاع هذا المنتج',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonText: 'نعم, إحذف',
                                            cancelButtonText: 'لا, إالغاء',
                                            reverseButtons: true
                                        }).then((result) => {
                                            if (result.isConfirmed) {

                                            let form = document.getElementById('submitBtn')     
                                            form.submit();

                                            swalWithBootstrapButtons.fire(
                                                ' حذف!',
                                                'تم حذف المنتج بنجاح',
                                                'success'
                                            )
                                        } else if (
                                            /* Read more about handling dismissals below */
                                            result.dismiss === Swal.DismissReason.cancel
                                        ) {
                                            swalWithBootstrapButtons.fire(
                                                'إلغاء',
                                                'منتجك بأمان :)',
                                                'error'
                                            )
                                        }
                                    })">
                                                <p class="d-inline my-font">حذف</p>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        {{-- {{ dd($orders) }} --}}
                                        {{-- {{dd(App\Models\OrderDetail::where('order_id', $order->id)->get())}}  --}}
                                        <button style="background-color: #1e4356; color:white" type="button"
                                            class="btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $order->id }}" data-bs-whatever="@mdo">
                                            <p class="d-inline my-font">التفاصيل</p>
                                        </button>
                                    </td>
                                    <td class="my-font">{{ $order->created_at }}</td>
                                    <td class="my-font">{{ $order->Order->total }}</td>
                                    <td class="my-font">{{ $order->id }}</td>
                                </tr>


                                {{-- ------------------------------------------------ order products modal ------------------------------------------------ --}}
                                <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title my-font" id="exampleModalLabel">تفاصيل المنتج</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-flex ">
                                                <ul class="list-group list-group-flush w-100 right">
                                                    <li class="list-group-item my-font ms-4 me-4">
                                                        {{ $order->Product->name }} : إسم المنتج</li>
                                                    <li class="list-group-item my-font ms-4 me-4">
                                                        {{ $order->Product->price }} : سعر المنتج</li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <tr>

                                    <td colspan="6">
                                        <p class="my-font">سجل المشتريات فارغ حاليا</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
