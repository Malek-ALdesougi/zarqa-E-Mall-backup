@extends('admin.layout.dashboard')



@section('content')
@include('sweetalert::alert')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Pendings Stores Request</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead style="background-color:#fc5927">
              <tr>
                <th style="color:white" >Store Owner</th>
                <th style="color:white" >Name</th>
                <th style="color:white" >Image</th>
                <th style="color:white" >Category</th>
                <th style="color:white" >Phone</th>
                <th style="color:white" >Address</th>
                <th style="color:white" >Description</th>
                <th style="color:white" >ِActions</th>
                
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @forelse ($pendingStores as $store)
                  
              
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$store->user->name}}</strong></td>
                <td>{{$store->store_name}}</td>
                <td>
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                      <img src="images/{{$store->user->image}}" alt="Avatar" class="rounded-circle">
                    </li>
                </td>
                <td><span class="badge bg-label-danger me-1">{{$store->category}}</span></td>
                <td>{{$store->user->phone}}</td>
                <td>{{$store->user->address}}</td>
                <td>{{$store->description}}</td>
    
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/accept-store/{{$store->id}}"><i class="bx bx-medal me-1 text-success"></i> Accept Store Request</a>
                      <a class="dropdown-item" href=""><i class="bx bx-trash me-1 text-danger"></i> Reject Request</a>
                    </div>
                  </div>
                </td>
              </tr>
    
              @empty
                  <tr>
                    <td colspan="7">There is no pending stores at the moment !</td>
                  </tr>
              @endforelse
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
        
    
@endsection