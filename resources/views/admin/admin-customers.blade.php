@extends('layouts.layouts.app')
<base href="/public">
@section('content')


<div class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 d-lg-flex align-items-center justify-content-between">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold">Dashboad </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="admin-dashboard.html">Payments</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="#">Payous </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Best instructors
                    </li>
                  </ol>
                </nav>
              </div>
              <div>
                <!-- button -->
                <a href="#" class="me-5 text-body"><i class="fe fe-upload me-2"></i>Export</a>
                <a href="#" class="me-5 text-body"><i class="fe fe-download me-2"></i>Import</a>
              </div>

            </div>


          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Card -->
            <div class="card rounded-3">
              <!-- Card Header -->

              <div class="table-responsive border-0">
                <!-- Table -->
                <table class="table mb-0 text-nowrap" id="dataTableBasic">
                  <!-- Table Head -->
                  <thead class="table-light">
                    <tr>
                      <th class="border-0 font-size-inherit w-0">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="checkAll" />
                          <label class="form-check-label" for="checkAll"></label>
                        </div>
                      </th>
                      <th class="border-0">Name</th>
                      <th class="border-0">Location</th>
                      <th class="border-0">Earn in {{date('M')}}</th>
                      <th class="border-0">Rate</th>
                      <th class="border-0">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <!-- Table body -->
                    @foreach ($instructors as $instructor)
                    
                    <tr>
                      <td class="align-middle border-top-0">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="productOne" />
                          <label class="form-check-label" for="productOne"></label>
                        </div>
                      </td>
                      <td class="align-middle border-top-0">
                        <a href="#" class="text-body">
                          <span class="me-1"><img src="{{$instructor->profile_photo_url}}"
                              class="avatar avatar-xs rounded-circle" alt=""></span>
                        {{$instructor->name}}
                        </a>
                      </td>
                      <td class="align-middle border-top-0">
                        <i class="fe fe-map-pin text-muted me-1"></i>{{$instructor->state}}, {{$instructor->country}}
                      </td>

                      <td class="align-middle border-top-0">
                        ${{\App\Models\Instructor::earns($instructor->id)}}
                      </td>
                      
                     <td class="align-middle border-top-0">
                        {{\App\Models\Instructor::rating($instructor->id)}}
                      </td>

                      <td class="align-middle border-top-0 ">
                        <a href="{{route('payouts',$instructor->id)}}" class="text-muted text-primary-hover texttooltip" data-template="one">
                          <i class="fe fe-edit fs-5"></i>

                          <div id="one" class="d-none">
                            <h6 class="mb-0 text-white">Payout</h6>
                          </div>
                        </a>
                        <a href="#" class="text-muted text-primary-hover ms-3 texttooltip" data-template="two">
                          <i class="fe fe-trash-2 fs-5"></i>
                          <div id="two" class="d-none">
                            <h6 class="mb-0 text-white">Delete</h6>
                          </div>
                        </a>
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



@endsection