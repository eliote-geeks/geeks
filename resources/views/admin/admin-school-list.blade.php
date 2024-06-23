@extends('layouts.layouts.app')
<base href="/public">
@section('content')



      <div class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 d-lg-flex align-items-center justify-content-between">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold">Schools </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="admin-dashboard.html">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                      Schools
                    </li>
                  </ol>
                </nav>
              </div>
              <!-- button -->
              <div>
                
                <!-- button -->
                <a href="add-product.html" class="btn btn-primary me-2">Create School</a>
              </div>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Card -->
            <div class="card rounded-3">
              

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
                            <th class="border-0">NAME</th>
                            <th class="border-0">CREATOR</th>
                            <th class="border-0">NBRE CLASSES</th>
                            <th class="border-0">INSTRUCTORS</th>
                            <th class="border-0">STUDENTS</th>                                                        
                            <th class="border-0"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Table body -->
              @foreach($schools as $school)
                          <tr>
                            <td class="align-middle border-top-0">
                              <a href="{{route('schools.show',$school->id)}}" class="text-inherit">
                                                <div class="d-lg-flex align-items-center">
                                                                    <div>
                                                                    
                                                                        <img src="{{asset($school->logo)}}" alt="" class="img-4by3-lg rounded" />
                                                                    </div>
                                                                    <div class="ms-lg-3 mt-2 mt-lg-0">
                                                                        <h4 class="mb-1 text-dark-hover">
                                                                        {{Str::title($school->title)}}
                                                                        </h4>
                                                                        <span class="text-inherit">Created at {{\Carbon\Carbon::parse($school->created_at)->format('d M, Y')}}</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                            </td>
                            <td class="align-middle border-top-0">
                              {{$school->user->name}}


                            </td>

                            <td class="align-middle border-top-0">
                               {{$school->classes->count()}}
                            </td>
                            <td class="align-middle border-top-0">
                              {{\App\Models\School::instructors($school->id)}}
                            </td>
                            <td class="align-middle border-top-0">
                              {{\App\Models\School::students($school->id)}}
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

                  </div>

                </div>
              </div>
              <!-- Card Footer -->

            </div>
          </div>
        </div>
      </div>

@endsection