
@extends('layouts.app')
@section('content')
	<div class="container d-flex flex-column">
		<div class="row align-items-center justify-content-center g-0 min-vh-100">
			<div class="col-lg-5 col-md-8 py-8 py-xl-0">
				<!-- Card -->
				<div class="card shadow">
					<!-- Card body -->
					<div class="card-body p-6">
                <x-jet-validation-errors class="text-danger" />
						<div class="mb-4">
							<a href="{{url('/')}}"><img src="{{\App\Models\Site::first()->logoPath}}" class="mb-4" alt="" /></a>
							<h1 class="mb-1 fw-bold">Sign up</h1>
							<span>Already have an account?
								<a href="{{route('login')}}" class="ms-1">Sign in</a></span>
						</div>
						<!-- Form -->
						<form method="POST" action="{{route('register')}}">
                        @csrf
								<!-- Username -->
							<div class="mb-3">
								<label for="username" class="form-label">User Name</label>
								<input type="text" id="username" class="form-control" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="User Name"
									required />
							</div>
								<!-- Email -->
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" id="email" class="form-control" name="email" :value="old('email')" required placeholder="Email address here"
									required />
							</div>
								<!-- Password -->
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" id="password" class="form-control" name="password" required autocomplete="new-password" placeholder="**************"
									required />
							</div>
                            
                        <div class="mb-3">
								<label for="password" class="form-label">Confirmation Password</label>
								<input type="password" id="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="**************"
									required />
							</div>
									<div class="mb-3">


     <div class="mb-2 text-dark">User Type</div>
                                  <!-- btn group -->
                                  <div class="btn-group" role="group" aria-label="Basic
                                    radio toggle button group">
                                    <!-- input -->
                                    <input type="radio" class="btn-check" name="user" id="fullTime1"
                                      autocomplete="off" value="student" checked>
                                    <!-- label -->
                                    <label class="btn btn-outline-primary" for="fullTime1">Student </label>
                                    <!-- input -->
                                    <input type="radio" class="btn-check" value="instructor" name="user" id="partTime2"
                                      autocomplete="off" >
                                    <label class="btn btn-outline-primary" for="partTime2">Instructor</label>
									
									<!-- input -->
                                    <input type="radio" class="btn-check" value="admin" name="user" id="partTime3"
                                      autocomplete="off" >
                                    <label class="btn btn-outline-primary" for="partTime3">Foundator</label>


                                  </div>
                                </div>
								<!-- Checkbox -->
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
							<div class="mb-3">
								<div class="form-check">
									<input type="checkbox" name="terms" id="agreeCheck" />
									<label class="form-check-label" for="agreeCheck"><span>I agree to the <a href="{{route('terms.show')}}">Terms of
												Service </a>and
											<a href="{{route('policy.show')}}">Privacy Policy.</a></span></label>
								</div>
							</div>
 
                            @endif
							<div>
									<!-- Button -->
									<div class="d-grid">
								<button type="submit" class="btn btn-primary">
									Create Free Account
								</button>
								</div>
							</div>
							<hr class="my-4" />
							<div class="mt-4 text-center">
                <!--Facebook-->
                <a href="{{ url('auth/facebook') }}" class="btn-social btn-social-outline btn-facebook">
                  <i class="fab fa-facebook"></i>
                </a>
                <!--Twitter-->
                <a href="{{url('/auth/twitter')}}" class="btn-social btn-social-outline btn-twitter">
                  <i class="fab fa-twitter"></i>
                </a>
                <!--Google-->
                <a href="{{ url('auth/google') }}" class="btn-social btn-social-outline btn-google">
                  <i class="fab fa-google"></i>
                </a>
                <!--GitHub-->
                <a href="{{url('/auth/github')}}" class="btn-social btn-social-outline btn-github">
                  <i class="fab fa-github"></i>
                </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endsection