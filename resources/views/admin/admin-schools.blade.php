@extends('layouts.layouts.app')
<base href="/public">
@section('content')
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page Header -->
                        <div class="border-bottom pb-4 mb-4 d-flex justify-content-between align-items-center">
                            <div class="mb-2 mb-lg-0">
                                <h1 class="mb-1 h2 fw-bold">
                                    Admin Schools
                                    <span class="fs-5 text-muted">({{$admins->count()}} )</span>
                                </h1>
                                <!-- Breadcrumb  -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{route('dashboard.index')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript:;">Admin School</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Admin School
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="nav btn-group" role="tablist">
                                <button class="btn btn-outline-white active" data-bs-toggle="tab" data-bs-target="#tabPaneGrid" role="tab" aria-controls="tabPaneGrid" aria-selected="true">
                    <span class="fe fe-grid"></span>
                  </button>
                                <button class="btn btn-outline-white" data-bs-toggle="tab" data-bs-target="#tabPaneList" role="tab" aria-controls="tabPaneList" aria-selected="false">
                    <span class="fe fe-list"></span>
                  </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Tab -->
                        <div class="tab-content">
                            <!-- Tab Pane -->
                            <div class="tab-pane fade show active" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">

                                <div class="row">


    
{{-- @livewire('admin-students') --}}

@forelse($admins as $admin)
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card mb-4">
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <img src="{{$admin->profile_photo_url}}" class="rounded-circle avatar-xl mb-3" alt="" />
                                                    <h4 class="mb-0">{{$admin->first_name.' '.$admin->last_name}}</h4>
                                                    <i>{{$admin->email}}</i>
                                                    <p class="mb-0">{{$admin->about_admin}}</p>
                                                </div>
                                                <div class="d-flex justify-content-between border-bottom py-2 mt-4">
                                                    <span>Schools</span>
                                                    <span class="text-dark">({{$admin->schools->count()}})</span>
                                                </div>
                                                <div class="d-flex justify-content-between border-bottom py-2">
                                                    <span>Class</span>
                                                    <span class="text-warning">
                              {{number_format(\App\Models\Admin::classes($admin->id))}} 
                            </span>
                                                </div>
                                                <div class="d-flex justify-content-between pt-2">
                                                    <span>Instructors</span>
                                                    <span class="text-dark"> {{number_format(\App\Models\Admin::instructors($admin->id))}}</span>
                                                </div>
                                                
                                                <div class="d-flex justify-content-between pt-2">
                                                    <span>Students</span>
                                                    <span class="text-dark"> {{number_format(\App\Models\Admin::students($admin->id))}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <span>No Admin yet!!</span>
@endforelse


                                     <div class="col-lg-3 col-md-3 col-3">
            {{$admins->links()}}
                                                    <!-- Pagination -->
                                     
                                    </div> 
                                </div>
                            </div>
                            <!-- Tab Pane -->
                            <div class="tab-pane fade" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                                <!-- Card -->
                    <div class="row">
                      <!-- basic table -->
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Card -->
            <div class="card rounded-3">
              <!-- Card Header -->

              <div class="table-responsive border-0">
                        <table id="dataTableBasic" class="table mb-0 text-nowrap">
                            <thead class="table-light">

                                <tr>
                                    <th>NAME</th>
                                    <th>SCHOOLS</th>
                                    <th>JOINED AT</th>
                                    <th>TOTAL PAYEMENT</th>
                                    <th>REGION</th>
                                    <th>ClASSES</th>
                                    <th>INSTRUCTORS</th>
                                    <th>STUDENTS</th>
                                    <th></th>
                                    <th></th>
                                    <th width="30%">ACTION</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($admins as $admin)
                                
                                <tr>

                                                                   <td class="align-middle border-top-0">
                        <a href="{{route('instructor.profile',$admin->id)}}" class="text-body">
                          <span class="me-1"><img src="{{$admin->profile_photo_url}}"
                              class="avatar avatar-xs rounded-circle" alt=""></span>
                            {{Str::title($admin->first_name.' '.$admin->last_name)}}        
                        </a>
                      </td>                                                        
                                    <td class="align-middle border-top-0">{{$admin->schools->count()}}</td>
                                    
                                    <td class="align-middle border-top-0">{{Carbon\Carbon::parse($admin->created_at)->format('d, M Y')}}</td>
                                    <td class="align-middle border-top-0">${{number_format(\App\Models\Admin::payouts($admin->id))}}</td    >
                                    <td class="align-middle border-top-0">{{ $admin->state}}, {{$admin->country}}</td>
                                    <td class="align-middle border-top-0">{{number_format(\App\Models\Admin::classes($admin->id))}} </td>
                                    <td class="align-middle border-top-0">{{number_format(\App\Models\Admin::instructors($admin->id))}}  </td>                                    
                                    <td class="align-middle border-top-0">{{number_format(\App\Models\Admin::students($admin->id))}}  </td>                                    
                                    
                                    <td> <a href="#" class="fe fe-mail text-muted" data-bs-toggle="tooltip" data-placement="top" title="Message">
                                                        </a></td>
                                                        
                                    <td><a href="#" class="text-muted" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="fe fe-trash"></i></a></td>
                                                                        
                                    <td class="text-muted align-middle" >
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown4"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown4">
                              <span class="dropdown-header">Action</span>
                                                <a class="dropdown-item"href=""><i
                                  class="fe fe-send dropdown-item-icon"></i>Edit</a>                        
                                                <a class="dropdown-item"  href=""><i
                                  class="fe fe-trash dropdown-item-icon"></i>Remove</a>
                                                </span>
                                                </span>
                                            </td>

                                            
                                    
                                </tr>

                            @endforeach
                            </tbody>

                        </table>

                        </div>

                      </div>





                    </div>

                  </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


            @endsection