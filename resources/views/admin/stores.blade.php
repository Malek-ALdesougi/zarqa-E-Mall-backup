@extends('admin.layout.dashboard')




@section('content')
@include('sweetalert::alert')
{{-- <marquee direction="right"><a href={link} download>download me</a></marquee>
<p title="hi">im a tooltip</p>
<p contenteditable="true">edit me</p> --}}
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
    <h5 class="card-header">All Stores</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead style="background-color:#696cff">
          <tr>
            <th style="color:white" >Store Owner</th>
            <th style="color:white" >Name</th>
            <th style="color:white" >Image</th>
            <th style="color:white" >Category</th>
            <th style="color:white" >Phone</th>
            <th style="color:white" >Address</th>
            {{-- <th style="color:white" >Description</th> --}}
            <th style="color:white" >ِActions</th>
            
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          {{-- {{$approvedStores[0]}} --}}
          @forelse ($approvedStores as $store)
          
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$store->user->name}}</strong></td>
            <td>{{$store->store_name}}</td>
            <td>
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title={{$store->user->name}}>
                  <img src="images/{{$store->user->image}}" alt="Avatar" class="rounded-circle">
                </li>
            </td>
            <td><span class="badge bg-label-primary me-1">{{$store->category}}</span></td>
            <td>{{$store->user->phone}}</td>
            <td>{{$store->user->address}}</td>
            {{-- <td> {{$store->description}}</td> --}}

            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">

                  {{-- edit modal button --}}
                  <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $store->id }}"  class="dropdown-item text-success" href="">
                    <span class="bx bx-edit-alt me-1 d-inline"></i><p class="d-inline ms-2">Edit</p></span></a>
                  {{-- end edit modal button --}}

                  <form id="submitBtn" action="/delete-store/{{ $store->user->id }}" method="GET">
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

                    // swalWithBootstrapButtons.fire(
                    //     ' Deleted !',
                    //     'User has been deleted successfully',
                    //     'success'
                    // )
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



           {{-- -------------------------------- update store admin modal ----------------------------- --}}
           <div class="modal fade" id="exampleModal{{ $store->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <h5 class="modal-title" id="exampleModalLabel">New message</h5> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {{-- ----------------- update store form  ----------------- --}}
                        <h4 class="fw-bold py-3 mb-4 text-center"><span
                                class="text-muted fw-light">Forms/</span>Edit store data</h4>
                        <!-- Basic Layout -->
                        <div class="row d-felx justify-content-center">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <form action="/admin-edit-user/{{ $store->id }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="basic-default-name">Name</label>
                                                <input name="name" type="text"
                                                    class="form-control" value="{{ $store->store_name }}"
                                                    id="basic-default-name">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="basic-default-phone">Phone No</label>
                                                <input name="phone" type="text"
                                                    id="basic-default-phone"
                                                    value="{{ $store->user->phone }}"
                                                    class="form-control phone-mask"placeholder="658 799 8941">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="basic-default-address">Address</label>
                                                <input name="address" type="text"
                                                    class="form-control" value="{{ $store->user->address }}"
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
              
          @endforelse

        </tbody>
      </table>
    </div>
  </div>
</div>
    
@endsection