@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')




	<!-- Content -->
    		<div class="col-lg-9 col-md-4 col-12" >					
					<!-- Card -->
	

	<div class="row mt-0 mt-md-4">
				
<div class="card border-0">
						<!-- Card header -->
						<div class="card-header d-lg-flex justify-content-between align-items-center">
							<div class="mb-3 mb-lg-0">
								<h3 class="mb-0">My Subscriptions</h3>
								<p class="mb-0">
									Here is list of package/product that you have subscribed.
								</p>
							</div>
							<div>
								<a href="pricing.html" class="btn btn-success btn-sm">Upgrade Now — Go Pro $39.00</a>
							</div>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<div class="border-bottom pt-0 pb-5">

@foreach ($subscriptions as $subscription)
    

								<div class="row mb-4">
									<div class="col-lg-12 col-md-8 col-7 mb-2 mb-lg-0">
										<span class="d-block">
											<span class="h4">{{\App\Models\Plan::where('plan_id',$subscription->plan_id)->first()->type.'LY'}}</span>
											<span class="badge bg-{{$subscription->subscription_id == auth()->user()->subscription_id ? 'success' : 'danger' }} ms-2">
												{{$subscription->subscription_id == auth()->user()->subscription_id ? 'Active' : 'Expire' }}</span></span>
										<p class="mb-0 fs-6">
											Subscription ID: {{$subscription->subscription_id}}
										</p>	
									</div>
									@if($subscription->subscription_id == auth()->user()->subscription_id)
									<div class="col-lg-12 col-md-12 col-12 d-lg-flex align-items-start justify-content-end">
										<a href="{{route('courses.subscription',auth()->user())}}" class="btn btn-outline-primary btn-sm">Change Plan</a> &nbsp;&nbsp;
								
										<a href="#" class="btn btn-outline-warning btn-sm">Suspend Plan</a>&nbsp;&nbsp;
									
										<a href="#" class="btn btn-outline-danger btn-sm">Desactive Plan</a>
									</div>
									@endif
								</div>
								<!-- Pricing data -->
								{{-- <div class="row">
									<div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
										<span class="fs-6">Started On</span>
										<h6 class="mb-0">Oct 1, 2020</h6>
									</div>
									<div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
										<span class="fs-6">Price</span>
										<h6 class="mb-0">Monthly</h6>
									</div>
									<div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
										<span class="fs-6">Access</span>
										<h6 class="mb-0">Access All Courses</h6>
									</div>
									<div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
										<span class="fs-6">Billing Date</span>
										<h6 class="mb-0">Next Billing on Nov 1, 2020</h6>
									</div>
								</div> --}}
							</div>

							{{-- <div class="pt-5">
								<div class="row mb-4">
									<div class="col mb-2 mb-lg-0">
										<span class="d-block">
											<span class="h4">Free Plan</span>
											<span class="badge bg-danger ms-2">
												Expired</span></span>
										<p class="mb-0 fs-6">
											Subscription ID: #100010001
										</p>
									</div>
									<div class="col-auto">
										<a href="#" class="btn btn-light btn-sm disabled">Disabled</a>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
										<span class="fs-6">Started On</span>
										<h6 class="mb-0">Sept 1, 2020</h6>
									</div>
									<div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
										<span class="fs-6">Price</span>
										<h6 class="mb-0">Free - Trial a Month</h6>
									</div>
									<div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
										<span class="fs-6">Access</span>
										<h6 class="mb-0">Access All Courses</h6>
									</div>
									<div class="col-lg-3 col-md-3 col-6 mb-2 mb-lg-0">
										<span class="fs-6">Billing Date</span>
										<h6 class="mb-0">Next Billing on Oct 1, 2020</h6>
									</div>
								</div>
							</div> --}}
@endforeach
						</div>
					</div>
			</div>
		</div>
	</div>




				</div>
			</div>
		</div>
	

			


@endsection