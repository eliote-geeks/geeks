@extends('layouts.layouts.app')
<base href="/public">
@section('content')

<div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-0 h2 fw-bold">Dashboard</h1>
                            </div>
                            <div class="d-flex">
                                <div class="input-group me-3  ">
                                    <input class="form-control flatpickr" type="text" placeholder="Select Date" aria-describedby="basic-addon2">

                                        <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>

                                </div>
                                <a href="#" class="btn btn-primary">Setting</a>
                            </div>
                        </div>
                    </div>
                </div>



                @livewire('dash-index')
                

            
                @livewire('dash-analyst')    



                
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 col-12 mb-4">
                        <!-- Card -->
                        <div class="card h-100">
                            <!-- Card header -->
                            <div class="card-header d-flex align-items-center
                              justify-content-between card-header-height">
                                <h4 class="mb-0">Popular Instructor</h4>
                                <a href="#" class="btn btn-outline-white btn-sm">View all</a>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0 pt-0 ">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="avatar avatar-md avatar-indicators avatar-offline">
                                                    <img alt="avatar" src="../../assets/images/avatar/avatar-1.jpg" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="col ms-n3">
                                                <h4 class="mb-0 h5">Rob Percival</h4>
                                                <span class="me-2 fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">42</span>Courses</span>
                                                <span class="me-2 fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">1,10,124</span>Students</span>
                                                <span class="fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">32,000</span> Reviews
                                                </span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown7"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown7">
                              <span class="dropdown-header">Settings</span>
                                                <a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon "></i>Edit</a>
                                                <a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon "></i>Remove</a>
                                                </span>
                                                </span>
                                            </div>
                                        </div>

                                    </li>
                                    <!-- List group -->
                                    <li class="list-group-item px-0 ">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                                    <img alt="avatar" src="../../assets/images/avatar/avatar-2.jpg" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="col ms-n3">
                                                <h4 class="mb-0 h5">Jose Portilla</h4>
                                                <span class="me-2 fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">12</span>Courses</span>
                                                <span class="me-2 fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">21,567</span>Students</span>
                                                <span class="fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">22,000
                            </span> Reviews
                                                </span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown8"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown8">
                              <span class="dropdown-header">Settings</span>
                                                <a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon "></i>Edit</a>
                                                <a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon "></i>Remove</a>
                                                </span>
                                                </span>
                                            </div>
                                        </div>

                                    </li>
                                    <!-- List group -->
                                    <li class="list-group-item px-0 ">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="avatar avatar-md avatar-indicators avatar-away">
                                                    <img alt="avatar" src="../../assets/images/avatar/avatar-3.jpg" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="col ms-n3">
                                                <h4 class="mb-0 h5">Eleanor Pena</h4>
                                                <span class="me-2 fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">32</span>Courses</span>
                                                <span class="me-2 fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">11,604</span>Students</span>
                                                <span class="fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">12,230
                            </span> Reviews
                                                </span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown9"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown9">
                              <span class="dropdown-header">Settings</span>
                                                <a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon "></i>Edit</a>
                                                <a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon "></i>Remove</a>
                                                </span>
                                                </span>
                                            </div>
                                        </div>

                                    </li>
                                    <!-- List group -->
                                    <li class="list-group-item px-0 ">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="avatar avatar-md avatar-indicators avatar-info">
                                                    <img alt="avatar" src="../../assets/images/avatar/avatar-6.jpg" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="col ms-n3">
                                                <h4 class="mb-0 h5">March Delson</h4>
                                                <span class="me-2 fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">23</span>Courses</span>
                                                <span class="me-2 fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">6,304</span>Students</span>
                                                <span class="fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">56,000</span> Reviews
                                                </span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown10"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown10">
                              <span class="dropdown-header">Settings</span>
                                                <a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon "></i>Edit</a>
                                                <a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon "></i>Remove</a>
                                                </span>
                                                </span>
                                            </div>
                                        </div>

                                    </li>
                                    <!-- List group -->
                                    <li class="list-group-item px-0 ">
                                        <div class="row">
                                            <div class="col-auto">
                                                <div class="avatar avatar-md avatar-indicators avatar-busy">
                                                    <img alt="avatar" src="../../assets/images/avatar/avatar-7.jpg" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="col ms-n3">
                                                <h4 class="mb-0 h5">Sina Ray</h4>
                                                <span class="me-2 fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">14</span>Courses</span>
                                                <span class="me-2 fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">8,000</span>Students</span>
                                                <span class="fs-6">
                            <span class="text-dark  me-1 fw-semi-bold">33,000</span> Reviews
                                                </span>
                                            </div>
                                            <div class="col-auto">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown11"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown11">
                              <span class="dropdown-header">Settings</span>
                                                <a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon "></i>Edit</a>
                                                <a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon "></i>Remove</a>
                                                </span>
                                                </span>
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 col-12 mb-4">
                        <!-- Card -->
                        <div class="card h-100">
                            <!-- Card header -->
                            <div class="card-header d-flex align-items-center
                              justify-content-between card-header-height">
                                <h4 class="mb-0">Recent Courses</h4>
                                <a href="{{route('courses.index')}}" class="btn btn-outline-white btn-sm">View all</a>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group flush -->
                                <ul class="list-group list-group-flush">
                                @forelse($courses as $course)
                                    <li class="list-group-item px-0 pt-0">
                                        <div class="row">
                                            <!-- Col -->
                                            <div class="col-auto">
                                                <a href="#">
                                                    <img src="{{asset('storage/'.$course->photo)}}" alt="" class="img-fluid rounded img-4by3-lg" /></a>
                                            </div>
                                            <!-- Col -->
                                            <div class="col ps-0">
                                                <a href="#">
                                                    <h5 class="text-primary-hover">
                                                        {{Str::limit(Str::title($course->title),20)}}
                                                    </h5>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{$course->user->profile_photo_url}}" alt="" class="rounded-circle avatar-xs me-2" />
                                                    <span class="fs-6">{{$course->user->name}}</span>
                                                </div>
                                            </div>
                                            <!-- Col auto -->
                                            <div class="col-auto">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown3"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                              <span class="dropdown-header">Settings</span>
                                                <a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon "></i>Edit</a>
                                                <a class="dropdown-item" href="#"><i
                                  class="fe fe-trash dropdown-item-icon "></i>Remove</a>
                                                </span>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    @empty
                                    <span>No courses</span>
                            @endforelse                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection