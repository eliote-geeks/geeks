 @extends('layouts.app')
@section('content')


	<div class="py-lg-13 py-8 bg-dark">
		<div class="container">
			<!-- Page header -->
			<div class="row align-items-center">
				<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-12">
					<div class="text-center mb-6 px-md-8">
						<h1 class="text-white display-3 fw-bold">
							Simple pricing that scales with your business
						</h1>
						<p class="text-white lead mb-4">
							Reference giving information on its origins, as well as a random
							Lipsum generator.
						</p>
						<!-- Switch Toggle -->
						{{-- <div id="pricing-switch" class="d-flex justify-content-center align-items-center">
							<span class="text-white me-2">Monthly</span>
							<span class="form-check form-switch form-switch-price">
								<input type="checkbox" class="form-check-input" id="customSwitch1" checked />
								<label class="form-check-label" for="customSwitch1"></label>
							</span>
							<span class="text-white ms-2">Yearly</span>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content -->
	<div class="mt-n8 pb-8">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-12 col-12">
					<!-- Card -->
					<div class="card border-0 mb-3">
						<!-- Card body -->
						<div class="p-5 text-center">
							<img src="{{\App\Models\Site::first()->logoPath}}" alt="" class="mb-5" />
							<div class="mb-5">
								<h2 class="fw-bold">Starter</h2>
								<p class="mb-0">
									To start your learning to day you will get only
									<span class="text-dark fw-medium">free Course</span>
									access.
								</p>
							</div>
							<div class="d-flex justify-content-center mb-4">
								<span class="h3 mb-0 fw-bold">$</span>
								<div class="price-card--price-number toggle-price-content odometer" data-price-monthly="0"
									data-price-yearly="0">
									0
								</div>
								<span class="align-self-end mb-1 ms-2 toggle-price-content" data-price-monthly="/Monthly"
									data-price-yearly="/Yearly">/Monthly</span>
							</div>
							<div class="d-grid">
							<a href="{{route('month',$plan_id1)}}" class="btn btn-outline-dark">Get Started for Free</a>
						</div>
						</div>
						<hr class="m-0" />
						<div class="p-5">
							<h4 class="fw-bold mb-4">
								All core features, including:
							</h4>
							<!-- List -->
							<ul class="list-unstyled mb-0">
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span> Only free courses </span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span><span class="fw-bold text-dark">Free </span>learning paths
									</span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span><span class="fw-bold text-dark">5GB </span>storage</span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span>Analytics </span>
								</li>

								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span>Access to support forums</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-12">
					<!-- Card -->
					<div class="card border-0 mb-3 mb-lg-0">
						<!-- Card body -->
						<div class="p-5 text-center">
							<img src="{{\App\Models\Site::first()->logoPath}}" alt="" class="mb-5" />
							<div class="mb-5">
								<h2 class="fw-bold">Month Plan</h2>
								<p class="mb-0">
									Access all
									<span class="text-dark fw-medium">premium courses, workshops, and mobile apps.</span>
									Renewed monthly.
								</p>
							</div>
							<div class="d-flex justify-content-center mb-4">
								<span class="h3 mb-0 fw-bold">$</span>
								<div id="month" class="price-card--price-number toggle-price-content odometer" data-price-monthly="39"
									data-price-yearly="99">
									{{\App\Models\Plan::where('plan_id',$plan_id1)->first()->amount}}
								</div>








								<span class="align-self-end mb-1 ms-2 toggle-price-content" data-price-monthly="/Monthly"
									data-price-yearly="/Yearly">/Montly</span>
							</div>
							
					<div class="d-grid">



		<a href="{{route('month',$plan_id1)}}" class="btn btn-outline-dark">Month Plan</a>


  
</div>
						</div>
						<hr class="m-0" />
						<div class="p-5">
							<h4 class="fw-bold mb-4">
								Everything in Starter, plus:
							</h4>
							<!-- List -->
							<ul class="list-unstyled mb-0">
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span>Offline viewing </span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span><span class="fw-bold text-dark">Offline </span>projects
									</span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span><span class="fw-bold text-dark">Unlimited </span>storage</span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span>Custom domain support </span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span>Bulk editing </span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span>12 / 5 support</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-12">
					<!-- Card -->
					<div class="card border-0 mb-3 mb-lg-0">
						<!-- Card body -->
						<div class="p-5 text-center">
							<img src="{{\App\Models\Site::first()->logoPath}}" alt="" class="mb-5" />
							<div class="mb-5">
								<h2 class="fw-bold">Year Plan</h2>
								<p class="mb-0">
									Upto 10 member access everything. Save
									<span class="text-dark fw-medium">{{\App\Models\Plan::where('plan_id',$plan_id2)->first()->amount}} </span>per
									year! Renewed yearly.
								</p>
							</div>
							<div class="d-flex justify-content-center mb-4">
								<span class="h3 mb-0 fw-bold">$</span>
								<div class="price-card--price-number toggle-price-content odometer" data-price-monthly="99"
									data-price-yearly="199">
									199
								</div>
								<span class="align-self-end mb-1 ms-2 toggle-price-content" data-price-monthly="/Monthly"
									data-price-yearly="/Yearly">/Yearly</span>
							</div>
					<div class="d-grid">

      {{-- <a href="{{route('month',$plan_id2)}}" class="btn btn-outline-dark">Year Plan</a> --}}
	  <a class="btn btn-outline-dark"> Not Available</a>
  <script>
    paypal.Buttons({
      createSubscription: function(data, actions) {
        return actions.subscription.create({
          'plan_id': {{$plan_id2}} // Replace with your plan ID
        });
      },
      onApprove: function(data, actions) {
        alert('You have successfully created subscription ' + data.subscriptionID); // Optional message given to subscriber
      }
    }).render('#paypal-button-container-'.{{$plan_id2}}); // Renders the PayPal button. Replace with your plan ID

  </script>

						</div>
						<hr class="m-0" />
						<div class="p-5">
							<h4 class="fw-bold mb-4">
								Everything in Individual, plus:
							</h4>
							<!-- List -->
							<ul class="list-unstyled mb-0">
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span>Workshop </span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span><span class="fw-bold text-dark">Dedicated </span>hardware
									</span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span><span class="fw-bold text-dark">99.9% uptime </span>guarantee
									</span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span>Advanced analytics </span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span>3rd party integrations</span>
								</li>
								<li class="mb-1">
									<span class="text-success me-2"><i class="far fa-check-circle"></i></span>
									<span>24 / 7 support</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Client logo -->
	{{-- <div class="py-lg-10 py-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-12">
					<div class="mb-8 text-center">
						<h4>Loved by over 5 million users from companies like</h4>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- Client logo -->
				<div class="col-md-4 col-lg-2 col-6 mb-4 mb-lg-0">
					<img src="../assets/images/brand/paypal.svg" alt="" />
				</div>
				<!-- Client logo -->
				<div class="col-md-4 col-lg-2 col-6 mb-4 mb-lg-0">
					<img src="../assets/images/brand/netflix.svg" alt="" />
				</div>
				<!-- Client logo -->
				<div class="col-md-4 col-lg-2 col-6 mb-4 mb-lg-0">
					<img src="../assets/images/brand/xbox.svg" alt="" />
				</div>
				<!-- Client logo -->
				<div class="col-md-4 col-lg-2 col-6 mb-4 mb-lg-0">
					<img src="../assets/images/brand/instagram.svg" alt="" />
				</div>
				<!-- Client logo -->
				<div class="col-md-4 col-lg-2 col-6 mb-4 mb-lg-0">
					<img src="../assets/images/brand/pinterest.svg" alt="" />
				</div>
				<!-- Client logo -->
				<div class="col-md-4 col-lg-2 col-6 mb-4 mb-lg-0">
					<img src="../assets/images/brand/stripe.svg" alt="" />
				</div>
			</div>
		</div>
	</div> --}}
	<!-- FAQ -->
	<div class="py-lg-10 py-5">
		<div class="container">
			<div class="row">
				<!-- Row -->
				<div class="col-md-12 col-12">
					<div class="mb-8 text-center">
						<h2 class="h1">Frequently Asked Questions</h2>
					</div>
				</div>
			</div>
			<!-- Row -->
			<div class="row">
				<!-- Col -->
				
@foreach ($questions as $question)
       
				<div class="col-md-6 col-lg-4 col-12 mb-3">

					<h4>{{$question->title}} </h4>
					<p>
						{{$question->response}}
					</p>
				</div>

    			<!-- Col -->
	@endforeach
				<!-- Col -->
				<div class="col-md-12 col-12 mt-lg-10 mt-4">
					<!-- Card-->
					<div class="card">
						<!-- Card body -->
						<div class="card-body">
							<div class="d-lg-flex justify-content-between align-items-center">
								<h4 class="mb-0">Have other questions?</h4>
								<span>Send us a mail via:
									<a href="https://yahoo.com/mashashie/" target="_blank">mashashie@yahoo.com</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




@endsection 
