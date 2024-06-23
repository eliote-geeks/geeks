@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')
				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header border-bottom-0">
							<h3 class="mb-0">Orders</h3>
							<span>Order Dashboard is a quick overview of all current
								orders.</span>
						</div>
						<!-- Table -->
						<div class="table-responsive border-0">
							<table class="table mb-0 text-nowrap" id="dataTableBasic">
								<thead class="table-light">
									<tr>
										<th scope="col" class="border-0">COURSES</th>
										<th scope="col" class="border-0">AMOUNT</th>
										<th scope="col" class="border-0">INVOICE</th>
										<th scope="col" class="border-0">DATE</th>
										<th scope="col" class="border-0">METHOD</th>
										{{-- <th scope="col" class="border-0"></th> --}}
									</tr>
								</thead>
								<tbody>
                                @foreach ($orders as $order)
									<tr>
										<td class="align-middle border-top-0">
											<h5 class="mb-0">
												<a href="{{route('courses.show',$order->course_id)}}" class="text-inherit">
													{{\Str::title(\App\Models\Course::find($order->course_id)->title)}}
												</a>
											</h5>
										</td>
										<td class="align-middle border-top-0">${{$order->amount}}</td>
										<td class="align-middle border-top-0">#{{$order->payment_id}}</td>
										<td class="align-middle border-top-0">{{\Carbon\Carbon::parse($order->created_at)->format('d, M Y')}}</td>
										<td class="align-middle border-top-0">{{$order->method}}</td>
										{{-- <td class="text-muted align-middle border-top-0">
											<span class="dropdown dropstart">
												<a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown1"
													data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
													<i class="fe fe-more-vertical"></i>
												</a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown1">
													<span class="dropdown-header">Setting </span>
													<a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
													<a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
												</span>
											</span>
										</td> --}}
									</tr>                                    
                                @endforeach


								</tbody>
							</table>
						</div>
					</div>
				</div>

    @endsection