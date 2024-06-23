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
									<button class="btn btn-outline-white active" data-bs-toggle="tab" data-bs-target="#tabPaneGrid" role="tab"
										aria-controls="tabPaneGrid" aria-selected="true">
										<span class="fe fe-grid"></span>
									</button>
									<button class="btn btn-outline-white" data-bs-toggle="tab" data-bs-target="#tabPaneList" role="tab"
										aria-controls="tabPaneList" aria-selected="false">
										<span class="fe fe-list"></span>
									</button>
								</div>
						</div>
					</div>
					<!-- Tab content -->
					<div class="tab-content">
						<div class="tab-pane fade show active pb-4" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-12 mb-3">
									
								</div>

                                @forelse ($orders as $order)
								<div class="col-lg-4 col-md-6 col-12">
									<!-- Card -->
									<div class="card mb-4">
										<!-- Card body -->
										<div class="card-body">
											<div class="text-center">
												<img src="{{$order->user->profile_photo_url}}" class="rounded-circle avatar-xl mb-3" alt="" />
												<h4 class="mb-1">{{$order->user->first_name.' '.$order->user->last_name}}</h4>
												<p class="mb-0 fs-6">
													<i class="fe fe-map-pin me-1"></i>{{$order->user->state}}
												</p>
												<a href="{{route('mail')}}" class="btn btn-sm btn-outline-white mt-3">{{$order->user->email}}</a>
											</div>
											<div class="d-flex justify-content-between border-bottom py-2 mt-4 fs-6">
												<span>Enrolled</span>
												<span class="text-dark">{{\Carbon\Carbon::parse($order->created_at)->format('d/m/y')}} </span>
											</div>
											<div class="d-flex justify-content-between pt-2 fs-6">
												<span>Progress</span>
												<span class="text-success"> {{round((\App\Models\ProgressLesson::where('course_id',$course->id)->where('user_id',$order->user->id)->where('view',1)->count() / \App\Models\Lesson::where('course_title',$course->title)->where('user_id',$course->user->id)->count()) * 100)}} % </span>
											</div>
										</div>
									</div>
								</div>                                    
                                @empty
                                <span>Empty</span>
                                @endforelse

                        {{$orders->links()}}
							</div>
						</div>
						<!-- Tab pane -->
						<div class="tab-pane fade" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">

							<div class="card">
								
								<!-- Table -->
								<div class="table-responsive">
									<table class="table" id="dataTableBasic">
										<thead class="table-light">
											<tr>
												<th scope="col" class="border-0">Name</th>
												<th scope="col" class="border-0">Enrolled</th>
												<th scope="col" class="border-0">Progress</th>
												<th scope="col" class="border-0">Q/A</th>
												<th scope="col" class="border-0">Locations</th>
												<th scope="col" class="border-0">Message</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($orders as $order)
											<tr>

												<td class="align-middle border-top-0">
													<div class="d-flex align-items-center">
														<img src="{{$order->user->profile_photo_url}}" alt="" class="rounded-circle avatar-md me-2" />
														<h5 class="mb-0">{{$order->user->first_name.' '.$order->user->last_name}}</h5>
													</div>
												</td>
												<td class="align-middle border-top-0">{{\Carbon\Carbon::parse($order->created_at)->format('d/m/y')}}</td>
												<td class="align-middle border-top-0">{{round((\App\Models\ProgressLesson::where('course_id',$course->id)->where('user_id',$order->user->id)->where('view',1)->count() / \App\Models\Lesson::where('course_title',$course->title)->where('user_id',$course->user->id)->count()) * 100)}}%</td>
												<td class="align-middle border-top-0">0</td>
												<td class="align-middle border-top-0">
													<span class="fs-6"><i class="fe fe-map-pin me-1"></i>{{$order->user->country}}</span>
												</td>
												<td class="pe-0 align-middle border-top-0">
													<a href="{{route('mail')}}" class="btn btn-outline-white btn-sm">{{$order->user->email}}</a>
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