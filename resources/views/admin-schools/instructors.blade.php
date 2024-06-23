@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')
				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header border-bottom-0">
							<h3 class="mb-0">Instructors</h3>
							<span>Order Dashboard is a quick overview of all current
								instructors.</span>
						</div>
						<!-- Table -->
						<div class="table-responsive border-0">
							<table class="table mb-0 text-nowrap" id="dataTableBasic">
								<thead class="table-light">
									<tr>
										<th scope="col" class="border-0">NAME</th>
										<th scope="col" class="border-0">COURSES</th>
										<th scope="col" class="border-0">EMAIL</th>
										<th scope="col" class="border-0">STUDENTS</th>
										{{-- <th scope="col" class="border-0">ACTION</th> --}}
										{{-- <th scope="col" class="border-0"></th> --}}
									</tr>
								</thead>
								<tbody>
                                @foreach ($instructors as $instructor)
									<tr>
										<td class="align-middle border-top-0">
											<h5 class="mb-0">
												<a href="{{route('instructor.profile',$instructor->id)}}" class="text-inherit">
													{{$instructor->name}}
												</a>
											</h5>
										</td>
										<td class="align-middle border-top-0">{{\App\Models\User::findOrFail($instructor->id)->courses->count()}}</td>
										<td class="align-middle border-top-0">{{$instructor->email}}</td>
										<td class="align-middle border-top-0">{{\App\Models\Instructor::students($instructor->id)}}</td>
										{{-- <td class="align-middle border-top-0"><a href="" class="btn-sm btn-danger">Remove</a></td> --}}
										
									</tr>                                    
                                @endforeach


								</tbody>
							</table>
						</div>
					</div>
				</div>

    @endsection