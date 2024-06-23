
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
							<a href="{{url('/')}}"><img src="{{\App\Models\Site::first()->logoPath}}" class="mb-4" alt="" /></a>
							<h1 class="mb-1 fw-bold">Forgot Password</h1>
							<p>Fill the form to reset your password.</p>
						</div>
							<!-- Form -->
		<form method="POST" action="{{ route('password.email') }}">
        @csrf
								<!-- Email -->
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" id="email" class="form-control" name="email" :value="old('email')" required autofocus placeholder="Enter Your Email "
									required />
							</div>
								<!-- Button -->
							<div class="mb-3 d-grid">
								<button type="submit" class="btn btn-primary">
									Send Resest Link
								</button>
							</div>
							<span>Return to <a href="{{url('login')}}">sign in</a></span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endsection