@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')


				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card body -->
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div>
								<h3 class="mb-0">Students</h3>
								<span>Meet people taking your course.</span>
							</div>
							<!-- Nav -->
								<div class="nav btn-group flex-nowrap" role="tablist">
									{{-- <button class="btn btn-outline-white active" data-bs-toggle="tab" data-bs-target="#tabPaneGrid" role="tab"
										aria-controls="tabPaneGrid" aria-selected="false">
										<span class="fe fe-grid"></span>
									</button> --}}
									<button class="btn btn-outline-white" data-bs-toggle="tab" data-bs-target="#tabPaneList" role="tab"
										aria-controls="tabPaneList" aria-selected="true">
										<span class="fe fe-list"></span>
									</button>
								</div>
						</div>
					</div>
					<!-- Tab content -->
					<div class="tab-content">
						<!-- Tab pane -->
						<div class="tab-pane fade" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
							<div class="card">
								<!-- Table -->
								<div class="table-responsive">
									<table class="table" id="dataTableBasic">
										<thead class="table-light">
											<tr>
												<th scope="col" class="border-0">Name</th>
												<th scope="col" class="border-0">Join</th>
												<th scope="col" class="border-0">Mail</th>
												<th scope="col" class="border-0">Courses</th>
												<th scope="col" class="border-0">Locations</th>
												<th scope="col" class="border-0">Message</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach ($students as $student)
											<tr>
												<td class="align-middle border-top-0">
													<div class="d-flex align-items-center">
														<img src="{{\App\Models\User::find($student->user_id)->profile_photo_url}}" alt="" class="rounded-circle avatar-md me-2" />
														<h5 class="mb-0">{{\App\Models\User::find($student->user_id)->first_name.' '.\App\Models\User::find($student->user_id)->last_name}} </h5>
													</div>
												</td>
												<td class="align-middle border-top-0">{{\App\Models\User::find($student->user_id)->created_at->diffForHumans()}}</td>
												<td class="align-middle border-top-0">{{\App\Models\User::find($student->user_id)->email}}</td>
												<td class="align-middle border-top-0">0</td>
												<td class="align-middle border-top-0">
													<span class="fs-6"><i class="fe fe-map-pin me-1"></i>{{\App\Models\User::find($student->user_id)->country}}</span>
												</td>
												<td class="pe-0 align-middle border-top-0">
													<a href="{{route('mail')}}" class="btn btn-outline-white btn-sm">Message</a>
												</td>
											</tr>
                                            
                                        @endforeach

										</tbody>
									</table>
								</div>
								<div class="pt-2 pb-4">
									<!-- Pagination -->
									<nav>
								{{-- {{$students->links()}} --}}
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>

@endsection