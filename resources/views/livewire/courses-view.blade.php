     <div class="container-fluid p-4">
    {{-- Nothing in the world is as soft and yielding as water. --}}
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page Header -->
                        <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-1 h2 fw-bold">Courses</h1>
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
                                            All
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div>
                                <a href="{{route('courses.create')}}" class="btn btn-dark" wire:loading.attr='disabled'>Add New Courses</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card rounded-3">
                            <!-- Card header -->
                            <div class="card-header border-bottom-0 p-0 bg-white">
                                <div>
                                    <!-- Nav -->
                                    <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="courses-tab" data-bs-toggle="pill" href="#courses" role="tab" aria-controls="courses" aria-selected="true">All</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="approved-tab" data-bs-toggle="pill" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Approved</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pending-tab" data-bs-toggle="pill" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending
                          </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="p-4 row">
                                <!-- Form -->
                                <form class="d-flex align-items-center col-12 col-md-12 col-lg-12">
                                    <span class="position-absolute ps-3 search-icon">
                      <i class="fe fe-search"></i>
                      </span>
                                    <input type="search" wire:model='search' class="form-control ps-6" placeholder="Search Course" />
                                </form>
                            </div>
                            <div>
                                <!-- Table -->
                                <div class="tab-content" id="tabContent">
                                    <!--Tab pane -->
                                    <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                                        <div class="table-responsive border-0 overflow-y-hidden">
                                            <table class="table mb-0 text-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            Courses
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            Instructor
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            STATUS
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            ACTION
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                    @if($search!=null)                                                
                                        @forelse ($courses_view as $course)                           
                                                    <tr>
                                                        <td class="border-top-0">
                                                            <a href="{{route('courses.show',$course->id)}}" class="text-inherit">
                                                                <div class="d-lg-flex align-items-center">
                                                                    <div>
                                                                    
                                                                        <img src="{{asset('storage/'.$course->photo)}}" alt="" class="img-4by3-lg rounded" />
                                                                    </div>
                                                                    <div class="ms-lg-3 mt-2 mt-lg-0">
                                                                        <h4 class="mb-1 text-dark-hover">
                                                                        {{Str::limit($course->title,40)}}
                                                                        </h4>
                                                                        <span class="text-inherit">Created at {{\Carbon\Carbon::parse($course->created_at)->format('d M, Y')}}</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ $course->user->profile_photo_url }}" alt="" class="rounded-circle avatar-xs me-2" />
                                                                <h5 class="mb-0">{{$course->user->name}}</h5>
                                                            </div>
                                                        </td>

                                                        @if($course->status == 0)
                                                        <td class="align-middle border-top-0">                                                        
                                                            <span class="badge-dot bg-warning me-1 d-inline-block align-middle"></span> Pending
                                                        </td>
                                                        @else
                                                        <td class="align-middle border-top-0">                                                        
                                                            <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span> Approved
                                                        </td>
                                                        @endif
                                                        @if($course->status == 0)
                                                        <td class="align-middle border-top-0">
                                                            <a wire:loading.attr='disabled' href="javascript:void(0)" wire:click='rejectedCourse({{$course->id}})' class="btn btn-outline-white btn-sm">Reject</a>
                                                            <a href="javascript:void(0)" wire:loading.attr='disabled' wire:click='approvedCourse({{$course->id}})' class="btn btn-success btn-sm">Approved</a>
                                                        </td>
                                                        @else
                                                        <td class="align-middle border-top-0">
                                                            <a wire:click='rejectedCourse({{$course->id}})' wire:loading.attr='disabled' href="javascript:void(0)" class="btn btn-outline-success btn-sm">Change Statut</a>
                                                        </td>
                                                        @endif

                                                        <td class="align-middle border-top-0">
                                                            <span class="dropdown dropstart">
                                  <a class="text-decoration-none text-muted" href="#" role="button" id="courseDropdown1"
                                    data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                  </a>
                                  <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                  <span class="dropdown-header">Settings</span>
                                                            <a class="dropdown-item" href="#"><i
                                    class="fe fe-x-circle dropdown-item-icon"></i>Reject with Feedback</a>                                                            
@if($course->trending == 'trending')                                    
                            <a class="dropdown-item" href="javascrit:void(0)" wire:click='trending({{$course->id}})'><i
                                    class="fe fe-star "></i> Delete to trending Courses</a>
@else
                            <a class="dropdown-item" href="javascrit:void(0)" wire:click='trending({{$course->id}})'><i
                                    class="fe fe-star "></i> Add to trending Courses</a>
@endif                                          
                                    
                                                            </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                  <td>  <span>No courses</span></td>
                                        @endforelse
                                        @else
                                            @forelse ($courses as $course)                           
                                                    <tr>
                                                        <td class="border-top-0">
                                                            <a href="#" class="text-inherit">
                                                                <div class="d-lg-flex align-items-center">
                                                                    <div>
                                                                        <img src="{{asset('storage/'.$course->photo)}}" alt="" class="img-4by3-lg rounded" />
                                                                    </div>
                                                                    <div class="ms-lg-3 mt-2 mt-lg-0">
                                                                        <h4 class="mb-1 text-dark-hover">
                                                                        {{Str::limit($course->title,40)}}
                                                                        </h4>
                                                                        <span class="text-inherit">Created at {{\Carbon\Carbon::parse($course->created_at)->format('d M, Y')}}</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ $course->user->profile_photo_url }}" alt="" class="rounded-circle avatar-xs me-2" />
                                                                <h5 class="mb-0">{{$course->user->name}}</h5>
                                                            </div>
                                                        </td>
                                                        @if($course->status == 0)
                                                        <td class="align-middle border-top-0">                                                        
                                                            <span class="badge-dot bg-warning me-1 d-inline-block align-middle"></span> Pending
                                                        </td>
                                                        @else
                                                        <td class="align-middle border-top-0">                                                        
                                                            <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span> Approved
                                                        </td>
                                                        @endif
                                                        @if($course->status == 0)
                                                        <td class="align-middle border-top-0">
                                                            <a href="javascript:void(0)" wire:loading.attr='disabled' wire:click='rejectedCourse({{$course->id}})' class="btn btn-outline-white btn-sm">Reject</a>
                                                            <a href="javascript:void(0)" wire:loading.attr='disabled' wire:click='approvedCourse({{$course->id}})' class="btn btn-success btn-sm">Approved</a>
                                                        </td>
                                                        @else
                                                        <td class="align-middle border-top-0">
                                                            <a wire:loading.attr='disabled' href="javascript:void(0)" wire:click='rejectedCourse({{$course->id}})' class="btn btn-outline-success btn-sm">Change Statut</a>
                                                        </td>
                                                        @endif
                                                        <td class="align-middle border-top-0">
                                                            <span class="dropdown dropstart">
                                  <a class="text-decoration-none text-muted" href="#" role="button" id="courseDropdown1"
                                    data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                  </a>
                                  <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                  <span class="dropdown-header">Settings</span>
                                                            <a class="dropdown-item" href="#"><i
                                    class="fe fe-x-circle dropdown-item-icon"></i>Reject with Feedback</a>
                                    @if($course->trending == 'trending')                                    
                            <a class="dropdown-item" href="javascrit:void(0)" wire:click='trending({{$course->id}})'><i
                                    class="fe fe-star "></i> Delete to trending Courses</a>
@else
                            <a class="dropdown-item" href="javascrit:void(0)" wire:click='trending({{$course->id}})'><i
                                    class="fe fe-star "></i> Add to trending Courses</a>
@endif
                                                            </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <span>No courses</span>
                                        @endforelse
                                        @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                
                                
                                    <!--Tab pane -->
                                    <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                                        <div class="table-responsive border-0 overflow-y-hidden">
                                            <table class="table mb-0 text-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            Courses
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            Instructor
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            STATUS
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            ACTION
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                @foreach ($courses_approved as $course)
                                                    <tr>
                                                        <td class="border-top-0">
                                                            <a href="{{route('courses.show',$course->id)}}" class="text-inherit">
                                                                <div class="d-lg-flex align-items-center">
                                                                    <div>
                                                                        <img src="{{asset('storage/'.$course->photo)}}" alt="" class="img-4by3-lg rounded" />
                                                                    </div>
                                                                    <div class="ms-lg-3 mt-2 mt-lg-0">
                                                                        <h4 class="mb-1 text-dark-hover">
                                                                        {{Str::limit($course->title,40)}}
                                                                        </h4>
                                                                        <span class="text-inherit">Created at {{\Carbon\Carbon::parse($course->created_at)->format('d M, Y')}}</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ $course->user->profile_photo_url }}" alt="" class="rounded-circle avatar-xs me-2" />
                                                                <h5 class="mb-0">{{$course->user->name}}</h5>
                                                            </div>
                                                        </td>
                                                        @if($course->status == 0)
                                                        <td class="align-middle border-top-0">                                                        
                                                            <span class="badge-dot bg-warning me-1 d-inline-block align-middle"></span> Pending
                                                        </td>
                                                        @else
                                                        <td class="align-middle border-top-0">                                                        
                                                            <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span> Approved
                                                        </td>
                                                        @endif
                                                        @if($course->status == 1)                                                        
                                                        <td class="align-middle border-top-0">
                                                            <a href="javascript:void(0)" wire:loading.attr='disabled' wire:click='rejectedCourse({{$course->id}})' class="btn btn-outline-success btn-sm">Change Statut</a>
                                                        </td>
                                                        @endif
                                                        <td class="align-middle border-top-0">
                                                            <span class="dropdown dropstart">
                                  <a class="text-decoration-none text-muted" href="#" role="button" id="courseDropdown1"
                                    data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                  </a>
                                  <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                  <span class="dropdown-header">Settings</span>
                                                            <a class="dropdown-item" href="#"><i
                                    class="fe fe-x-circle dropdown-item-icon"></i>Reject with Feedback</a>
      @if($course->trending == 'trending')                                    
                            <a class="dropdown-item" href="javascrit:void(0)" wire:click='trending({{$course->id}})'><i
                                    class="fe fe-star "></i> Delete to trending Courses</a>
@else
                            <a class="dropdown-item" href="javascrit:void(0)" wire:click='trending({{$course->id}})'><i
                                    class="fe fe-star "></i> Add to trending Courses</a>
@endif
                                                            </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                        @endforeach
                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>



                                    <!--Tab pane -->
                                    <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                        <div class="table-responsive border-0 overflow-y-hidden">
                                            <table class="table mb-0 text-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            Courses
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            Instructor
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            STATUS
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase">
                                                            ACTION
                                                        </th>
                                                        <th scope="col" class="border-0 text-uppercase"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                     @foreach ($courses_pending as $course)
                                                    <tr>
                                                        <td class="border-top-0">
                                                            <a href="{{route('courses.show',$course->id)}}" class="text-inherit">
                                                                <div class="d-lg-flex align-items-center">
                                                                    <div>
                                                                    <img src="{{asset('storage/'.$course->photo)}}" alt="" class="img-4by3-lg rounded" />
                                                                    </div>
                                                                    <div class="ms-lg-3 mt-2 mt-lg-0">
                                                                        <h4 class="mb-1 text-dark-hover">
                                                                        {{Str::limit($course->title,40)}}
                                                                        </h4>
                                                                        <span class="text-inherit">Created at {{\Carbon\Carbon::parse($course->created_at)->format('d M, Y')}}</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{ $course->user->profile_photo_url }}" alt="" class="rounded-circle avatar-xs me-2" />
                                                                <h5 class="mb-0">{{$course->user->name}}</h5>
                                                            </div>
                                                        </td>
                                                        @if($course->status == 0)
                                                        <td class="align-middle border-top-0">                                                        
                                                            <span class="badge-dot bg-warning me-1 d-inline-block align-middle"></span> Pending
                                                        </td>
                                                        @else
                                                        <td class="align-middle border-top-0">                                                        
                                                            <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span> Approved
                                                        </td>
                                                        @endif
                                                        @if($course->statut == 0)
                                                        <td class="align-middle border-top-0">
                                                            <a href="javascript:void(0)" wire:loading.attr='disabled' wire:click='rejectedCourse({{$course->id}})' class="btn btn-outline-white btn-sm">Reject</a>
                                                            <a href="javascript:void(0)" wire:loading.attr='disabled' wire:click='approvedCourse({{$course->id}})' class="btn btn-success btn-sm">Approved</a>
                                                        </td>
                                                        @else
                                                        <td class="align-middle border-top-0">
                                                            <a href="javascript:void(0)" wire:loading.attr='disabled' wire:click='rejectedCourse({{$course->id}})' class="btn btn-outline-link btn-sm">Change Statut</a>
                                                        </td>
                                                        @endif
                                                        <td class="align-middle border-top-0">
                                                            <span class="dropdown dropstart">
                                  <a class="text-decoration-none text-muted" href="#" role="button" id="courseDropdown1"
                                    data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                  </a>
                                  <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                  <span class="dropdown-header">Settings</span>
                                                            <a class="dropdown-item" href="#"><i
                                    class="fe fe-x-circle dropdown-item-icon"></i>Reject with Feedback</a>
      @if($course->trending == 'trending')                                    
                            <a class="dropdown-item" href="javascrit:void(0)" wire:click='trending({{$course->id}})'><i
                                    class="fe fe-star "></i> Delete to trending Courses</a>
@else
                            <a class="dropdown-item" href="javascrit:void(0)" wire:click='trending({{$course->id}})'><i
                                    class="fe fe-star "></i> Add to trending Courses</a>
@endif
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
                                {{ $courses->links() }}                                
                            {{-- <!-- Card Footer -->
                            <div class="card-footer border-top-0">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link mx-1 rounded" href="#" tabindex="-1" aria-disabled="true"><i
                            class="mdi mdi-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link mx-1 rounded" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link mx-1 rounded" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link mx-1 rounded" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link mx-1 rounded" href="#"><i class="mdi mdi-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

