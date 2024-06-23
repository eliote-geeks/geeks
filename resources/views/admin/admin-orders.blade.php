@extends('layouts.layouts.app')
<base href="/public">
@section('content')

 {{-- <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-1 h2 fw-bold text-center">Orders</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="admin-dashboard.html">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Payments</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Students orders
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                                    <div class="">
                    <div class="row">
                      <!-- basic table -->
                      <div class="col-md-12 col-12 mb-5">
                        <div class="card">
                          <!-- card header  -->
                          <div class="card-header border-bottom-0">
                            <h4 class="mb-1">Orders </h4>
                          </div>
                          <!-- table  -->
                       <div class="card-body pt-2">
                        <table id="dataTableBasic" class="table" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th>Courses</th>
                                    <th>Payer</th>
                                    <th>Course</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Mode of payment</th>
                                    <th>Payment Processor</th>
                                    <th>Invoice Date</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
              @forelse($orders as $order)
                                <tr>                                
                                    <td class="border-top-0">
                                            {{$order->payment_id}}                        
                                </td>
                                    <td >{{$order->user->name}}</td>
                                    <td >{{$order->course->title}}</td>
                                    <td>{{$order->category->name}}</td>
                                    <td>{{$order->amount}}</td>
                                    <td>{{$order->mode_of_payment}}</td>
                                    <td>{{$order->payment_processor}}</td>
                                    <td>{{\Carbon\Carbon::parse($order->created_at)->format('d M,Y')}}</td>
                                    <td >  <span class="badge-dot bg-{{($order->status == 'SUCCESS..') ? 'success' : 'danger'}}"></span>   </td>
                                    <td  class="text-muted align-middle">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown4"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown4">
                              <span class="dropdown-header">Action</span>
                                                <a class="dropdown-item" href="{{route('payments.status',$order->id)}}"><i
                                  class="fe fe-send dropdown-item-icon"></i>Updated Satus</a>
                        
                                                <a class="dropdown-item" href="{{route('payments.delete',$order->id)}}" ><i
                                  class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                                                </span>
                                                </span>
                                            </td>
                                </tr>
@empty
<td><span>No course for this Category !!</span></td>
@endforelse
                            </tbody>

                        </table>
                       </div>
                        </div>

                      </div>

                    </div>
                  </div> --}}


      <div class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 d-lg-flex align-items-center justify-content-between">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold">Orders </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="admin-dashboard.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="#">Ecommerce </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Orders
                    </li>
                  </ol>
                </nav>
              </div>
              <!-- button -->
              <div>
                <a href="#" class="me-5 text-body"><i class="fe fe-upload me-2"></i>Export</a>
                <!-- button -->
                <a href="add-product.html" class="btn btn-primary me-2">Create Product</a>
              </div>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Card -->
            <div class="card rounded-3">
              <!-- Card Header -->
              <div class="card-header border-bottom-0 p-0">
                <!-- nav -->
                <ul class="nav nav-lb-tab" id="tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="all-orders-tab" data-bs-toggle="pill" href="#all-orders" role="tab"
                      aria-controls="all-orders" aria-selected="true">All Orders</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="shipped-tab" data-bs-toggle="pill" href="#shipped" role="tab"
                      aria-controls="shipped" aria-selected="false">Success</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="cancelled-tab" data-bs-toggle="pill" href="#cancelled" role="tab"
                      aria-controls="cancelled" aria-selected="false">Cancelled</a>
                  </li>

                </ul>
              </div>

              <div>
                <div class="tab-content" id="tabContent">
                  <!-- Tab -->
                  <div class="tab-pane fade show active" id="all-orders" role="tabpanel"
                    aria-labelledby="all-orders-tab">
                    <div class="table-responsive border-0">
                      <!-- Table -->
                      <table class="table mb-0 text-nowrap" id="dataTableBasic">
                        <!-- Table Head -->
                        <thead class="table-light">
                          <tr>
                            <th class="border-0">ORDER</th>
                            <th class="border-0">Customer</th>
                            <th class="border-0">Date</th>
                            <th class="border-0">Items</th>
                            <th class="border-0">payment</th>
                            <th class="border-0">Total</th>
                            <th class="border-0"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Table body -->
              @foreach($orders as $order)
                          <tr>
                            <td class="align-middle border-top-0">
                              <a href="#" class="fw-semi-bold">
                                {{$order->payment_id}}
                              </a>
                            </td>
                            <td class="align-middle border-top-0">
                              {{$order->user->first_name.' '.$order->user->last_name}}


                            </td>
                            <td class="align-middle border-top-0">
                              {{\Carbon\Carbon::parse($order->created_at)->format('d, M Y')}}

                            </td>
                            <td class="align-middle border-top-0">
                               {{\Str::limit($order->course->title,7)}} 
                            </td>
                            <td class="align-middle border-top-0">
                              <span class="badge text-{{$order->status== 'SUCCESS..' ? 'success' : 'danger'}} bg-light-{{$order->status== 'SUCCESS..' ? 'success' : 'danger'}}">{{$order->status== 'SUCCESS..' ? 'success' : 'Error'}}</span>
                            </td>
                            <td class="align-middle border-top-0">
                              ${{$order->amount}}
                            </td>

                            <td class="text-muted align-middle border-top-0">
                              <span class="dropdown dropstart">
                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                  id="orderDropdownTen" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                  aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                </a>
                                <span class="dropdown-menu" aria-labelledby="orderDropdownTen">
                                  <span class="dropdown-header">Settings</span>
                                  <a class="dropdown-item" href="#"><i
                                      class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                  <a class="dropdown-item" href="#"><i
                                      class="fe fe-mail dropdown-item-icon"></i>Invite</a>

                                  <a class="dropdown-item" href="#"><i
                                      class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                                </span>
                              </span>
                            </td>
                          </tr>
            @endforeach





                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="shipped" role="tabpanel" aria-labelledby="shipped-tab">
                    <div class="table-responsive border-0">
                      <!-- Table -->
                      <table class="table mb-0 text-nowrap">
                        <!-- Table Head -->
                        <thead class="table-light">
                          <tr>
                            <th class="border-0 font-size-inherit">
                              <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkAll" />
                                <label class="form-check-label" for="checkAll"></label>
                              </div>
                            </th>
                            <th class="border-0">ORDER</th>
                            <th class="border-0">Customer</th>
                            <th class="border-0">Date</th>
                            <th class="border-0">Items</th>
                            <th class="border-0">payment</th>
                            <th class="border-0">Total</th>
                            <th class="border-0"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Table body -->
              @foreach($orders as $order)
              @if($order->status == 'SUCCESS..')
                          <tr>
                            <td class="align-middle border-top-0">
                              <a href="#" class="fw-semi-bold">
                                {{$order->payment_id}}
                              </a>
                            </td>
                            <td class="align-middle border-top-0">
                              {{$order->user->first_name.' '.$order->user->last_name}}


                            </td>
                            <td class="align-middle border-top-0">
                              {{\Carbon\Carbon::parse($order->created_at)->format('d, M Y')}}

                            </td>
                            <td class="align-middle border-top-0">
                               {{\Str::limit($order->course->title,7)}} 
                            </td>
                            <td class="align-middle border-top-0">
                              <span class="badge text-success bg-light-{{$order->status== 'SUCCESS..' ? 'success' : 'danger'}}">Paid</span>
                            </td>
                            <td class="align-middle border-top-0">
                              ${{$order->amount}}
                            </td>

                            <td class="text-muted align-middle border-top-0">
                              <span class="dropdown dropstart">
                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                  id="orderDropdownTen" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                  aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                </a>
                                <span class="dropdown-menu" aria-labelledby="orderDropdownTen">
                                  <span class="dropdown-header">Settings</span>
                                  <a class="dropdown-item" href="#"><i
                                      class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                  <a class="dropdown-item" href="#"><i
                                      class="fe fe-mail dropdown-item-icon"></i>Invite</a>

                                  <a class="dropdown-item" href="#"><i
                                      class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                                </span>
                              </span>
                            </td>
                          </tr>
                          @endif
            @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                    <div class="table-responsive border-0">
                      <!-- Table -->
                      <table class="table mb-0 text-nowrap">
                        <!-- Table Head -->
                        <thead class="table-light">
                          <tr>
                            <th class="border-0">ORDER</th>
                            <th class="border-0">Customer</th>
                            <th class="border-0">Date</th>
                            <th class="border-0">Items</th>
                            <th class="border-0">payment</th>
                            <th class="border-0">Total</th>
                            <th class="border-0"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Table body -->
                                        @foreach($orders as $order)
              @if($order->status == 'FAILED..')
                          <tr>
                            <td class="align-middle border-top-0">
                              <a href="#" class="fw-semi-bold">
                                {{$order->payment_id}}
                              </a>
                            </td>
                            <td class="align-middle border-top-0">
                              {{$order->user->first_name.' '.$order->user->last_name}}


                            </td>
                            <td class="align-middle border-top-0">
                              {{\Carbon\Carbon::parse($order->created_at)->format('d, M Y')}}

                            </td>
                            <td class="align-middle border-top-0">
                               {{\Str::limit($order->course->title,7)}} 
                            </td>
                            <td class="align-middle border-top-0">
                              <span class="badge text-{{$order->status== 'SUCCESS..' ? 'success' : 'danger'}} bg-light-{{$order->status== 'SUCCESS..' ? 'success' : 'danger'}}">echec</span>
                            </td>
                            <td class="align-middle border-top-0">
                              ${{$order->amount}}
                            </td>

                            <td class="text-muted align-middle border-top-0">
                              <span class="dropdown dropstart">
                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                  id="orderDropdownTen" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                  aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                </a>
                                <span class="dropdown-menu" aria-labelledby="orderDropdownTen">
                                  <span class="dropdown-header">Settings</span>
                                  <a class="dropdown-item" href="#"><i
                                      class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                  <a class="dropdown-item" href="#"><i
                                      class="fe fe-mail dropdown-item-icon"></i>Invite</a>

                                  <a class="dropdown-item" href="#"><i
                                      class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                                </span>
                              </span>
                            </td>
                          </tr>
                          @endif
            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
              </div>
              <!-- Card Footer -->

            </div>
          </div>
        </div>
      </div>

@endsection