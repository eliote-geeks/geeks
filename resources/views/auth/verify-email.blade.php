@extends('layouts.app')
@section('content')
<div class="container d-flex flex-column">
		<div class="row align-items-center justify-content-center g-0 min-vh-100">
			<div class="col-lg-5 col-md-8 py-8 py-xl-0">
				<!-- Card -->
                
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="text-danger" />
				<div class="card shadow">
					<!-- Card body -->
					<div class="card-body p-6">
						<div class="mb-4">
							<a href="../index.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4" alt="" /></a>
							<h1 class="mb-1 fw-bold">Email verification</h1>
							<p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
						</div>
							<!-- Form -->
		        <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        							<!-- Button -->
							<div class="mb-3 d-grid">
								<button type="submit" class="btn btn-primary">
								Resend email verification
								</button>
							</div>
						</form>
			<form method="POST" action="{{ route('logout') }}">
						@csrf
						<div class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
										this.closest('form').submit(); " role="button">
								<i class="fe fe-power me-2"></i>

								{{ __('Log Out') }}
							</a>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endsection