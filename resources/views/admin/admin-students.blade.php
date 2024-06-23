
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
                                    Students
                                    <span class="fs-5 text-muted">({{$students->count()}} )</span>
                                </h1>
                                <!-- Breadcrumb  -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="admin-dashboard.html">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">User</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Students
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


    
@livewire('admin-students')

@forelse($students as $student)
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card mb-4">
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="position-relative">
                                                        <img src="{{$student->profile_photo_url}}" class="rounded-circle avatar-xl mb-3" alt="" />
                                                        <a href="{{route('student.profile',$student->id)}}" class="position-absolute mt-10 ms-n5">
                                                            <span class="status bg-success"></span>
                                                        </a>
                                                    </div>
                                                    <h4 class="mb-0">{{$student->name}}</h4>
                                                    <i>{{$student->email}}</i>
                                                    <p class="mb-0">
                                                        <i class="fe fe-map-pin me-1 fs-6"></i>{{$student->country}}<br>
                                                        <i class="fe fe-map-pin me-1 fs-6"></i>{{$student->state}}
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                                    <span>Payments</span>
                                                    <span class="text-dark">${{\App\Models\Student::payments($student->id)}}</span>
                                                </div>
                                                <div class="d-flex justify-content-between border-bottom py-2">
                                                    <span>Joined at</span>
                                                    <span> {{\Carbon\Carbon::parse($student->created_at)->format('d, M Y')}} </span>
                                                </div>
                                                <div class="d-flex justify-content-between pt-2">
                                                    <span>Courses</span>
                                                    <span class="text-dark"> {{\App\Models\Student::courseUsers($student->id)}} </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <span>No student yet!!</span>
@endforelse

             <div class="col-lg-3 col-md-3 col-3">
                            {{$students->links()}}
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
                                    <th>ENROLLED</th>
                                    <th>JOINED AT</th>
                                    <th>TOTAL PAYEMENT</th>
                                    <th>LOCATIONS</th>
                                    <th></th>
                                    <th></th>
                                    <th>Actions</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($students as $student)
                                
                                <tr>

                                                        
                               <td class="align-middle border-top-0">
                        <a href="{{route('student.profile',$student->id)}}" class="text-body">
                          <span class="me-1"><img src="{{$student->profile_photo_url}}"
                              class="avatar avatar-xs rounded-circle" alt=""></span>
                                    {{Str::title($student->first_name.' '.$student->last_name)}}        
                        </a>
                      </td>
                                    <td class="align-middle border-top-0"> {{\App\Models\Student::courseUsers($student->id)}}  Courses</td>
                                    <td class="align-middle border-top-0">{{Carbon\Carbon::parse($student->created_at)->format('d, M Y')}}</td>
                                    <td class="align-middle border-top-0">${{\App\Models\Student::payments($student->id)}}</td>
                                    <td class="align-middle border-top-0">{{ $student->state}}, {{$student->country}}</td>
                                    <td class="align-middle border-top-0"> <a href="{{route('sendEmail',$student->id)}}" class="fe fe-mail text-muted" data-bs-toggle="tooltip" data-placement="top" title="Message">
                                                        </a></td>
                                    <td class="align-middle border-top-0">@if($student->is_subscribed == 1) Premium {{\Str::lower(\App\Models\Plan::plan($student->subscription_id))}} <i class="fe fe-star"></i>@else  @endif</td>
                                                                        
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