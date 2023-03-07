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
                <thead  style="background-color:#fc5927">
                    <tr>
                        <th style="color:white">Name</th>
                        <th style="color:white">Email</th>
                        <th style="color:white">Image</th>
                        <th style="color:white">Subject</th>
                        <th style="color:white">Message</th>
                        <th style="color:white">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @forelse ($allUsersMessages as $userMessage)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{$userMessage->user->name}}</strong>
                            </td>
                            <td>{{$userMessage->user->email}}</td>
                            <td>
                                {{-- <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center"> --}}
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="{{$userMessage->user->name}}"
                                    data-bs-original-title="">
                                    <img src="/images/{{$userMessage->user->image}}" alt="Avatar" class="rounded-circle">
                                </li>
                            </td>
                            <td>{{$userMessage->subject}}</td>


                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>{{$userMessage->message}}</strong>
                            </td>
                            <td>
                               
                                        <form id="submitBtn" action="/delete-user-message/{{$userMessage->id}}" method="GET">
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
                                 
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">There is no users messages to show at the moment</td>
                        </tr>
                    @endforelse
                </tbody>


            </table>
        </div>
    </div>
</div>


@endsection