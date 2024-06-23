@extends('layouts.layouts.app')
<base href="/public">
@section('content')

 <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-1 h2 fw-bold text-center">Plans</h1>
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
                                            Plans Paypal
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
                            <h4 class="mb-1">Plans </h4>
                          </div>
                          <!-- table  -->
                       <div class="card-body pt-2">
                        <table id="dataTableBasic" class="table mb-0 text-nowrap" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                                                        
                                    <th>Plan-id</th>
                                    <th>Product-id</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>created-at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
               @forelse($plans as $plan) 
                                 <tr>                                
                                    <td class="border-top-0">
                                            {{\Str::limit($plan->plan_id,7)}}                        
                                </td>
                                    <td >{{\Str::limit($plan->product_id,10)}}</td>
                                    <td >{{\Str::limit($plan->name,7)}}</td>
                                    <td>{{$plan->status}}</td>
                                    <td>{{$plan->type}}</td>                                    
                                    <td>{{$plan->amount}}</td>                                    
                                    <td>{{\Carbon\Carbon::parse($plan->created_at)->format('d M,Y')}}</td>
                                    <td  class="text-muted align-middle">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown4"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown4">
                              <span class="dropdown-header">Action</span>
                        
                                                <a class="dropdown-item" href="{{route('payments.delete',$plan->id)}}" ><i
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
                  </div>


@endsection