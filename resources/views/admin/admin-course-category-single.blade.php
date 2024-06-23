@extends('layouts.layouts.app')
<base href="/public">
@section('content')

 <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-1 h2 fw-bold text-center">{{$category->name}}</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="admin-dashboard.html">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Courses</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Courses Category
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
                            <h4 class="mb-1">Courses {{ $courses->count() }}</h4>
                          </div>
                          <!-- table  -->
                       <div class="card-body pt-2">
                        <table id="dataTableBasic" class="table" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th>Courses</th>
                                    <th>Instructor</th>
                                    <th>Enrolled</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                @forelse($courses as $course)
                                <tr>                                
                                    <td class="border-top-0">
                                                            <a href="#" class="text-inherit">
                                                                <div class="d-lg-flex align-items-center">
                                                                    <div>
                                                                        <img src="{{asset('storage/'.$course->photo)}}" alt="" class="img-4by3-lg rounded" />
                                                                    </div>
                                                                    <div class="ms-lg-3 mt-2 mt-lg-0">
                                                                        <h4 class="mb-1 text-primary-hover">
                                                                        {{Str::limit($course->title,40)}}
                                                                        </h4>
                                                                        <span class="text-inherit">Created at {{\Carbon\Carbon::parse($course->created_at)->format('d M, Y')}}</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                    <td width="15%">{{$course->user->first_name}} {{$course->user->last_name}}</td>
                                    <td></td>
                                    <td width="3%"> @if($course->status == 1) <span class="badge-dot bg-success"></span> @else <span class="badge-dot bg-danger"></span> @endif </td>
                                    <td width="5%" class="text-muted align-middle">
                                                <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown4"
                              data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown4">
                              <span class="dropdown-header">Action</span>
                                                <a class="dropdown-item"><i
                                  class="fe fe-send dropdown-item-icon"></i>Publish</a>
                                  <a class="dropdown-item"><i
                                  class="fe fe-inbox dropdown-item-icon text-muted"></i>Move Draft</a>
                        
                                                <a class="dropdown-item" ><i
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