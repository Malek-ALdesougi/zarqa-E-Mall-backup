@extends('admin.layout.dashboard')



@section('content')
    @include('sweetalert::alert')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex justify-content-between">
                <h5 class="card-header">All Users</h5>
                {{-- <button type="button" class="btn btn-success m-2 h-25" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo">Add new user</button> --}}
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead style="background-color:#696cff">
                        <tr>
                            <th style="color:white">Name</th>
                            <th style="color:white">Email</th>
                            <th style="color:white">Image</th>
                            <th style="color:white">Phone</th>
                            <th style="color:white">Role</th>
                            <th style="color:white">Address</th>
                            <th style="color:white">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        @forelse ($allUsers as $user)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $user->name }}</strong>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{-- <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center"> --}}
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title=""
                                        data-bs-original-title="{{ $user->name }}">
                                        <img src="/images/{{ $user->image }}" alt="Avatar" class="rounded-circle">
                                    </li>
                                </td>
                                <td>{{ $user->phone }}</td>

                                @if ($user->roll == 'user')
                                    <td><span class="badge bg-label-primary me-1">{{ $user->roll }}</span></td>
                                @elseif($user->roll == 'admin')
                                    <td><span class="badge bg-label-dark me-1">{{ $user->roll }}</span></td>
                                @else
                                    <td><span class="badge bg-label-danger me-1">{{ $user->roll }}</span></td>
                                @endif

                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $user->address }}</strong>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            {{-- DO YOU REALLY WNAT TO DELETE THIS USER !!!!!!!!!!1 --}}
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $user->id }}"
                                                class="dropdown-item text-success" href="">

                                                <span class="bx bx-edit-alt me-1 d-inline"></i><p class="d-inline ms-2">Edit</p></span></a>

                                            <form id="submitBtn" action="/delete-user/{{ $user->id }}" method="GET">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-danger" onclick="event.preventDefault()
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
                                                title: 'Do you really want to delete this user ?',
                                                text:'This user will be no longer able to access his profile',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonText: 'Yes, Delete',
                                                cancelButtonText: 'No, Cancel',
                                                reverseButtons: true
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                let form = document.getElementById('submitBtn')     
                                                form.submit();
    
                                                swalWithBootstrapButtons.fire(
                                                    ' Deleted !',
                                                    'User has been deleted successfully',
                                                    'success'
                                                )
                                            } else if (
                                                /* Read more about handling dismissals below */
                                                result.dismiss === Swal.DismissReason.cancel
                                            ) {
                                                swalWithBootstrapButtons.fire(
                                                    'Cancel',
                                                    'Action stoped :)',
                                                    'error'
                                                )
                                            }
                                        })">
                                                    <span class="bx bx-trash me-1 text-red d-inline">
                                                        <p class="d-inline mb-3">Delete</p>
                                                      </span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>



                            {{-- -------------------------------- update new user admin modal ----------------------------- --}}
                            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            {{-- <h5 class="modal-title" id="exampleModalLabel">New message</h5> --}}
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            {{-- ----------------- add new user form  ----------------- --}}
                                            <h4 class="fw-bold py-3 mb-4 text-center"><span
                                                    class="text-muted fw-light">Forms/</span>Edit user data</h4>
                                            <!-- Basic Layout -->
                                            <div class="row d-felx justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <form action="/admin-edit-user/{{ $user->id }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-name">Name</label>
                                                                    <input name="name" type="text"
                                                                        class="form-control" value="{{ $user->name }}"
                                                                        id="basic-default-name"placeholder="malek Doe">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-mail">Email</label>
                                                                    <input name="email" type="text"
                                                                        class="form-control" value="{{ $user->email }}"
                                                                        id="basic-default-mail"placeholder="name@gmail.com">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-phone">Phone No</label>
                                                                    <input name="phone" type="text"
                                                                        id="basic-default-phone"
                                                                        value="{{ $user->phone }}"
                                                                        class="form-control phone-mask"placeholder="658 799 8941">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-role">role</label>
                                                                    <input name="roll" type="text"
                                                                        id="basic-default-role" value="{{ $user->roll }}"
                                                                        class="form-control phone-mask">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-address">Address</label>
                                                                    <input name="address" type="text"
                                                                        class="form-control" value="{{ $user->address }}"
                                                                        id="basic-default-address">
                                                                </div>

                                                                <div class="d-flex justify-content-between">
                                                                    <button type="submit"
                                                                        class="btn btn-success">update</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end of add new user form  --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="7">There is no users to show at the moment</td>
                            </tr>
                        @endforelse
                    </tbody>


                </table>
            </div>
        </div>
    </div>
@endsection
