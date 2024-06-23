@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')
	@if($plan!= null && $subscription != null)
				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<div class="d-lg-flex justify-content-between align-items-center card-header">
							<div class="mb-3 mb-lg-0">
								<h3 class="mb-0">Current Plan</h3>
								<span>Below your current active plan information.</span>
							</div>
							<div>
							@if($plan->type == 'MONTH')
								<a href="{{route('courses.subscription',auth()->user())}}" class="btn btn-outline-primary btn-sm">Switch to Annual Billing</a>
							@endif
							</div>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<h2 class="fw-bold mb-0">${{$plan->amount}}/{{$plan->type}}</h2>
							<p class="mb-0">
								Your next {{$plan->type.'LY'}} charge of
								<span class="text-success">${{$plan->amount}}</span> will be applied to your
								primary payment method on
								<span class="text-success">@if($plan->type == 'MONTH'){{\Carbon\Carbon::parse($subscription->created_at->addDays(31))->format('d, M Y')}}. @else {{\Carbon\Carbon::parse($subscription->created_at->addDays(365))->format('d, M Y')}}@endif</span>
							</p>
						</div>
					</div>
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="mb-0">Payment Methods</h3>
							<span>Primary payment method is used by default</span>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<!-- List group -->
							<ul class="list-group list-group-flush">
								
								<!-- List group item -->
								<li class="list-group-item px-0 py-3 border-bottom">
									<div class="d-flex justify-content-between">
										<div class="d-flex">
											<img src="../assets/images/creditcard/paypal.svg" alt="" class="me-3" />
											<div>
												<h5 class="mb-0">Paypal</h5>
												{{-- <p class="mb-0 fs-6">Expires in 10/2021</p> --}}
											</div>
										</div>
										<span class="dropdown dropstart">
											<a class="text-muted text-decoration-none" href="#" role="button" id="paymentDropdown4"
												data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
												<i class="fe fe-more-vertical"></i>
											</a>
											<span class="dropdown-menu" aria-labelledby="paymentDropdown4">
												<span class="dropdown-header">Setting </span>
												<a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
												<a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
												<a class="dropdown-item" href="#"><i class="fe fe-credit-card dropdown-item-icon"></i>Make it
													Primary</a>
											</span>
										</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
	@endif
			
@endsection