<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page header -->
                        <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
							<div class="mb-3 mb-md-0">
                                <h1 class="mb-1 h2 fw-bold">Trash Dashboard</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="{{url('/')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{route('trash')}}">Trash</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Overview
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div>
                                <a href="{{route('courses.create')}}" class="btn btn-primary">New Course</a
									>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-3 col-lg-6 col-md-12 col-12">
							<!-- Card -->
							<div class="card mb-4">
								<!-- Card body -->
								<div class="card-body">
									<span
										class="fs-6 text-uppercase fw-semi-bold"
										>Total Courses</span
									>
									<div
										class="mt-2 d-flex justify-content-between align-items-center"
									>
										<div class="lh-1">
											<h2 class="h1 fw-bold mb-1">{{$courses->count()}}</h2>											
										</div>
										<div>
											<span
												class="bg-light-primary icon-shape icon-xl rounded-3 text-dark-primary"
											>
												<i class="mdi mdi-text-box-multiple mdi-24px"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-12 col-12">
							<!-- Card -->
							<div class="card mb-4">
								<!-- Card Body -->
								<div class="card-body">
									<span
										class="fs-6 text-uppercase fw-semi-bold"
										>Users</span
									>
									<div
										class="mt-2 d-flex justify-content-between align-items-center"
									>
										<div class="lh-1">
											<h2 class="h1 fw-bold mb-1">{{$users->count()}}</h2>											
										</div>
										<div>
											<span
												class="bg-light-warning icon-shape icon-xl rounded-3 text-dark-warning"
											>
												<i class="mdi mdi-folder-multiple-image mdi-24px"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-12 col-12">
							<!-- Card -->
							<div class="card mb-4">
								<!-- Card Body -->
								<div class="card-body">
									<span
										class="fs-6 text-uppercase fw-semi-bold"
										>Schools</span
									>
									<div
										class="mt-2 d-flex justify-content-between align-items-center"
									>
										<div class="lh-1">
											<h2 class="h1 fw-bold mb-1">{{$schools->count()}}</h2>											
										</div>
										<div>
											<span
												class="bg-light-success icon-shape icon-xl rounded-3 text-dark-success"
											>
												<i class="mdi mdi-account-multiple mdi-24px"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-md-12 col-12">
							<!-- Card -->
							<div class="card mb-4">
								<!-- Card Body -->
								<div class="card-body">
									<span
										class="fs-6 text-uppercase fw-semi-bold"
										>Categories</span
									>
									<div
										class="mt-2 d-flex justify-content-between align-items-center"
									>
										<div class="lh-1">
											<h2 class="h1 fw-bold mb-1">{{$categories->count()}}</h2>
											{{-- <span>20+ Comments</span> --}}
										</div>
										<div>
											<span
												class="bg-light-info icon-shape icon-xl rounded-3 text-dark-info"
											>
												<i class="mdi mdi-comment-text mdi-24px"></i>
											</span>
										</div>
									</div>
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
                                <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="all-post-tab" data-bs-toggle="pill" href="#all-post" role="tab" aria-controls="all-post" aria-selected="true">Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="published-tab" data-bs-toggle="pill" href="#published" role="tab" aria-controls="published" aria-selected="false">Categories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="scheduled-tab" data-bs-toggle="pill" href="#scheduled" role="tab" aria-controls="scheduled" aria-selected="false">users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="draft-tab" data-bs-toggle="pill" href="#draft" role="tab" aria-controls="draft" aria-selected="false">Schools</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" id="deleted-tab" data-bs-toggle="pill" href="#deleted" role="tab" aria-controls="deleted" aria-selected="false">Courses</a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="p-4 row">
                                <!-- Form -->
                                <form class="d-flex align-items-center col-12 col-md-8 col-lg-3">
                                    <span class="position-absolute ps-3 search-icon">
                      <i class="fe fe-search"></i>
                    </span>
                                    <input type="search" class="form-control ps-6" placeholder="Search Post" />
                                </form>
                            </div>
                            <div>
                                <div class="tab-content" id="tabContent">
                                    <!-- Tab -->
                                    <div class="tab-pane fade show active" id="all-post" role="tabpanel" aria-labelledby="all-post-tab">
                                        <div class="table-responsive border-0">
                                            <!-- Table -->
                                            <table class="table mb-0 text-nowrap" id="dataTableBasic">
                                                <!-- Table Head -->
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="border-0">POST </th>
                                                        <th scope="col" class="border-0">CATEGORY</th>
                                                        <th scope="col" class="border-0">DATE</th>
                                                        <th scope="col" class="border-0">Author</th>
                                                        <th scope="col" class="border-0"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Table body -->
                                                    @foreach($courses as $course)
                                                    <tr>

                                                        <td class="align-middle border-top-0">
                                                            <h5 class="mb-0">
                                                                <a href="#" class="text-inherit">
                                  {{\Str::title($course->title)}}
                                  </a>
                                                            </h5>
                                                        </td>

                                                        <td class="align-middle border-top-0">
                                                            <a href="#" class="text-inherit">{{$course->category->name}}</a>
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            {{\Carbon\Carbon::parse($course->created_at)->format('D m, Y H:i')}}
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            <div class="d-flex align-items-center">
                                                                <img src="{{\App\Models\User::find($course->user_id)->profile_photo_url}}" alt="" class="rounded-circle avatar-xs me-2" />
                                                                <h5 class="mb-0">{{\App\Models\User::find($course->user_id)->name}}</h5>
                                                            </div>
                                                        </td>

                                                        <td class="text-muted align-middle border-top-0 text-end">
                                                            <span class="dropdown dropstart">
                                  <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                    id="courseDropdown1" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                    <i class="fe fe-more-vertical"></i>
                                  </a>
                                  <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                    <span class="dropdown-header">Settings</span>

                                                            <a class="dropdown-item" wire:click.prevent='restoreCourse({{$course->id}})' href="javascript:;"><i
                                        class="fe fe-toggle-right dropdown-item-icon"></i>Restore</a>
                                                            <a class="dropdown-item" href="javascript:;" wire:click.prevent='deleteCourse({{$course->id}})'><i
                                        class="fe fe-trash dropdown-item-icon"></i>ForceDelete</a>
                                                            </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="published" role="tabpanel" aria-labelledby="published-tab">
                                        <div class="table-responsive border-0">
                                            <table class="table mb-0 text-nowrap" id="dataTableBasic">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="border-0 font-size-inherit">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="checkPublished" />
                                                                <label class="form-check-label" for="checkPublished"></label>
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="border-0">CATEGORIES</th>
                                                        <th scope="col" class="border-0">DESCRIPTION</th>
                                                        <th scope="col" class="border-0">CREATED</th>
                                                        <th scope="col" class="border-0">PARENT ?</th>
                                                        {{-- <th scope="col" class="border-0">STATUS</th> --}}
                                                        <th scope="col" class="border-0"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($categories as $category)
                                                    
                                                    <tr>
                                                        <td class="align-middle">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="postNine" />
                                                                <label class="form-check-label" for="postNine"></label>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <h5 class="mb-0">
                                                                <a href="javascript:;" class="text-inherit">
                                    {{$category->name}}
                                  </a>
                                                            </h5>
                                                        </td>

                                                        <td class="align-middle">
                                                            <a href="#" class="text-inherit">{{\Str::limit($category->description,20)}}</a>
                                                        </td>

                                                        <td class="align-middle">
                                                            <div class="d-flex align-items-center">
                                                                {{-- <img src="../../assets/images/avatar/avatar-4.jpg" alt="" class="rounded-circle avatar-xs me-2" /> --}}
                                                                <h5 class="mb-0">{{\Carbon\Carbon::parse($category->created_at)->format('d M, Y')}}</h5>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <span class="badge-dot bg-success me-1 d-inline-block align-middle"></span>@if($category->category_id == null) NO Parent @else Parent @endif
                                                        </td>
                                                        <td class="text-muted align-middle text-end">
                                                            <span class="dropdown dropstart">
                                  <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                    id="courseDropdown9" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                    <i class="fe fe-more-vertical"></i>
                                  </a>
                                  <span class="dropdown-menu" aria-labelledby="courseDropdown9">
                                    <span class="dropdown-header">Settings</span>
                                                            <a class="dropdown-item" href="javascript:;" wire:click.prevent='deleteCategory({{$category->id}})'><i
                                        class="fe fe-edit dropdown-item-icon"></i>ForceDelete</a>
                                                            <a class="dropdown-item" href="javascript:;" wire:click.prevent='restoreCategory({{$category->id}})'><i
                                        class="fe fe-move dropdown-item-icon"></i>Restore</a>

                                                            </span>
                                                            </span>
                                                        </td>
                                                    </tr>
  
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="scheduled" role="tabpanel" aria-labelledby="scheduled-tab">
                                        <div class="table-responsive border-0">
                                            <table class="table mb-0 text-nowrap" id="dataTableBasic">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" class="border-0">USERS</th>
                                                        <th scope="col" class="border-0">TYPE</th>
                                                        <th scope="col" class="border-0">DATE</th>
                                                        <th scope="col" class="border-0">LOCATION</th>
                                                        <th scope="col" class="border-0"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($users as $user)                                              
                                                    <tr>
                                                        <td class="align-middle">
                                                            <h5 class="mb-0">
                                                                <a href="javascript:;" class="text-inherit">{{$user->first_name.' '.$user->last_name}}
                                  </a>
                                                            </h5>
                                                        </td>

                                                        <td class="align-middle">
                                                            <a href="#" class="text-inherit">@if($user->user_type == 'App\Models\Student') Student @elseif($user->user_type == 'App\Models\Instructor') Instructor @else Administrator @endif </a>
                                                        </td>

                                                        <td class="align-middle">
                                                            <div class="d-flex align-items-center">
                                                                <h5 class="mb-0">{{\Carbon\Carbon::parse($user->created_at)->format('d M, Y')}}</h5>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="javascript:;" class="text-inherit">{{$user->country}}</a>
                                                        </td>
                                                        
                                                        <td class="text-muted align-middle text-end">
                                                            <span class="dropdown dropstart">
                                  <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                    id="courseDropdown13" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                    <i class="fe fe-more-vertical"></i>
                                  </a>
                                  <span class="dropdown-menu" aria-labelledby="courseDropdown13">
                                    <span class="dropdown-header">Settings</span>
                                                            <a class="dropdown-item" href="javascript:;" wire:click.prevent='deleteUser({{$user->id}})'><i
                                        class="fe fe-edit dropdown-item-icon"></i>ForceDelete</a>
                                                            <a class="dropdown-item" href="javascript:;" wire:click.prevent='restoreUser({{$user->id}})'><i
                                        class="fe fe-move dropdown-item-icon"></i>Restore</a>

                                                            </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="draft" role="tabpanel" aria-labelledby="draft-tab">
                                        <div class="table-responsive border-0">
                                            <table class="table mb-0 text-nowrap">
                                                <thead class="table-light">
                                                    
                                                        <th scope="col" class="border-0">SCHOOLS</th>
                                                        <th scope="col" class="border-0">CLASS</th>
                                                        <th scope="col" class="border-0">LOCATION</th>
                                                        <th scope="col" class="border-0">DATE</th>
                                                        <th scope="col" class="border-0">Author</th>
                                                        <th scope="col" class="border-0"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($schools as $school)
                                                    
                                                    <tr>
                                                        <td class="align-middle border-top-0">
                                                            <h5 class="mb-0">
                                                                <a href="javascript:;" class="text-inherit">
                                    {{$school->title}}
                                  </a>
                                                            </h5>
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            <a href="#" class="text-inherit">{{$school->classes->count()}}</a>
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            {{$school->location}}
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            <div class="d-flex align-items-center">                                                                
                                                                <h5 class="mb-0">{{\Carbon\Carbon::parse($school->created_at)->format('d M, Y')}}</h5>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle border-top-0">
                                                            <span class="badge-dot bg-warning me-1 d-inline-block align-middle"></span>{{$school->first_name}}
                                                        </td>
                                                        <td class="text-muted align-middle border-top-0 text-end">
                                                            <span class="dropdown dropstart">
                                  <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                    id="courseDropdown17" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                    <i class="fe fe-more-vertical"></i>
                                  </a>
                                  <span class="dropdown-menu" aria-labelledby="courseDropdown17">
                                    <span class="dropdown-header">Setting</span>
                                                            <a class="dropdown-item" href="javascript:;" wire:click.prevent='deleteSchool({{$school->id}})'><i
                                        class="fe fe-edit dropdown-item-icon"></i>ForceDelete</a>
                                                                          <a class="dropdown-item" href="javascript:;" wire:click.prevent='restoreSchool({{$school->id}})'><i
                                        class="fe fe-edit dropdown-item-icon"></i>restore</a>

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
                            <!-- Card Footer -->
                            <div class="card-footer border-top-0" wire:loading>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mb-0">
                                        
                                        <li class="page-item">
                                            <a class="page-link mx-1 rounded" href="#">Loading..</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
					</div>
				</div>
</div>
