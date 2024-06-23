@extends('layouts.app')
    @section('content')


  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
      <div class="col-lg-5 col-md-8 py-8 py-xl-0">
        <!-- Card -->
        <div class="card shadow ">
          <!-- Card body -->
          <div class="card-body p-6">
        <x-jet-validation-errors class="text-danger" />
                  @if (session('status'))
            <div class="mb-4 font-medium text-sm text-success">
                {{ session('status') }}
            </div>
        @endif
            <div class="mb-4">
              <a href="{{url('/')}}"><img src="{{\App\Models\Site::first()->logoPath}}" class="mb-4" alt="{{\App\Models\Site::first()->name}}"></a>
              <h1 class="mb-1 fw-bold">Sign in</h1>
              <span>Don’t have an account? <a href="{{url('register')}}" class="ms-1">Sign up</a></span>
            </div>
            <!-- Form -->
            <form action="{{route('login')}}" method="POST">
            @csrf
              	<!-- Username -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" :value="old('email')" placeholder="Email address here"
                  required>
              </div>
              	<!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" required autocomplete="current-password" placeholder="**************"
                  required>
              </div>
              	<!-- Checkbox -->
              <div class="d-lg-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="rememberme" name="remenber">
                  <label class="form-check-label " for="rememberme">Remember me</label>
                </div>
                <div>
                  <a href="{{ route('password.request') }}">Forgot your password?</a>
                </div>
              </div>
              <div>
                	<!-- Button -->
                  <div class="d-grid">
                <button type="submit" class="btn btn-primary ">Sign in</button>
              </div>
              </div>
              <hr class="my-4">
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
