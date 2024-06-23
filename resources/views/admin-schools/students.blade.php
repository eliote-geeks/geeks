@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')
				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header border-bottom-0">
							<h3 class="mb-0">Students</h3>
							<span>Order Dashboard is a quick overview of all current
								students.</span>
						</div>
						<!-- Table -->
						<div class="table-responsive border-0">
							<table class="table mb-0 text-nowrap" id="dataTableBasic">
								<thead class="table-light">
									<tr>
										<th scope="col" class="border-0">NAME</th>
										<th scope="col" class="border-0">COURSES</th>
										<th scope="col" class="border-0">EMAIL</th>
										<th scope="col" class="border-0">LOCATION</th>
										<th scope="col" class="border-0">JOINED AT</th>
										{{-- <th scope="col" class="border-0"></th> --}}
									</tr>
								</thead>
								<tbody>
                                @foreach ($students as $student)
									<tr>
										<td class="align-middle border-top-0">
											<h5 class="mb-0">
												<a href="{{route('student.profile',$student->id)}}" class="text-inherit">
													{{$student->name}}
												</a>
											</h5>
										</td>
										<td class="align-middle border-top-0">{{\App\Models\Order::where('user_id',$student->id)->count()}}</td>
										<td class="align-middle border-top-0">{{$student->email}}</td>
										<td class="align-middle border-top-0">{{  $student->country.' \ '.$student->state}}</td>
                                        <td class="align-middle border-top-0">{{\Carbon\Carbon::parse($student->created_at)->format('d, M Y')}}</td>
										{{-- <td class="align-middle border-top-0"><a href="" class="btn-sm btn-danger">Remove</a></td> --}}
										
									</tr>                                    
                                @endforeach


								</tbody>
							</table>
						</div>
					</div>
				</div>

    @endsection