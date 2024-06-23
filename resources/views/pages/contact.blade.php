@extends('layouts.app')
@section('content')
    <div class="container-fluid">
      <div class="row align-items-center min-vh-100">
        <!-- col -->
        <div class="col-lg-6 col-md-12 col-12">
          <div class="px-xl-20 px-md-8 px-4 py-8 py-lg-0">
               <!-- content -->
            <div class="d-flex justify-content-between mb-7 align-items-center">
              <a href="{{url('/')}}"><img
                  src="{{\App\Models\Site::first()->logoPath}}" alt="{{\App\Models\Site::first()->name}}">
              </a>
            </div>
            <div class="text-dark">
              <h1 class="display-4 fw-bold">Get In Touch.</h1>
              <p class="lead text-dark">
{{\App\Models\Site::first()->name}} is an online learning platform dedicated to programming languages.
 You have free will on how the platform can see you but once registered your fate is sealed. 
 As a student you can create a course and earn money when a student subscribes to a course, offer questions to see the evolution of your learners. For the student, his role is simple: he can follow courses and respond to evaluations. all users can interact on the social network and many other modules. The administrator creates schools and classes, invites teachers to teach in their classes. The rest you will find out for yourself thank you :>
              </p>
              <div class="mt-8">
              <p class="fs-4 mb-4">
                If you are seeking support please visit our <a href="#">support
                  portal</a> before
                reaching out directly.
              </p>
                 <!-- address -->

                <p class="fs-4"><i class="bi bi-telephone text-primary
                    me-2"></i> + 237 659 271 025</p>
                <p class="fs-4"><i class="bi bi-envelope-open
                    text-primary me-2"></i> mashashie@yahoo.com</p>
                <p class="fs-4 d-flex"><i class="bi bi-geo-alt
                    text-primary me-2"></i> Cameroon, Yaounde Yaounde 5, Ekoumdoum</p>
              </div>
              <div class="mt-10">
                <!--Facebook-->
                <a href="https://facebook/bpaul" class="text-muted me-3">
                  <i class="fab fa-facebook fs-3"></i>
                </a>
                <!--Twitter-->
                <a href="https://twitter/paul" class="text-muted me-3">
                  <i class="fab fa-twitter fs-3"></i>
                </a>

                <!--GitHub-->
                <a href="https://github/eliote-geeks" class="text-muted">
                  <i class="fab fa-github fs-3"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- background color -->
        <div
          class="col-lg-6 d-lg-flex align-items-center w-lg-50 min-vh-lg-100 position-fixed-lg bg-cover bg-light top-0
          right-0" >
          <div class="px-4 px-xl-20 py-8 py-lg-0">
            <!-- form section -->
            <div id="form">
                 <!-- form row -->
              <form class="row" action="{{route('form')}}">
              @csrf
                   <!-- form group -->
                <div class="mb-3 col-12 col-md-6">
                  <label
                    class="form-label"for="fname">First Name:<span
                      class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="first_name"
                    id="fname" placeholder="First Name" required />
                </div>
                  <!-- form group -->
                <div class="mb-3 col-12 col-md-6">
                  <label class="form-label"for="lname">Last Name:<span
                      class="text-danger">*</span></label>
                  <input
                    class="form-control"
                    type="text"
                    name="last_name"
                    id="lname"
                    placeholder="Last Name"
                    required
                    />
                </div>
                  <!-- form group -->
                <div class="mb-3 col-12 col-md-6">
                  <label
                    class="form-label"for="email">Email:<span
                      class="text-danger">*</span></label>
                  <input
                    class="form-control"
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Email"
                    required
                    />
                    @error('email')<span>{{$message}}</span>@enderror
                </div>
                  <!-- form group -->
                <div class="mb-3 col-12 col-md-6">
                  <label
                    class="form-label"for="phone">Phone Number:<span
                      class="text-danger">*</span></label>
                  <input
                    class="form-control"
                    type="text"
                    name="phone"
                    id="phone"
                    placeholder="Phone"
                    required
                    />
                </div>
                  <!-- form group -->
                <div class="mb-3 col-12">
                  <label
                    class="text-dark form-label"for="frustration">Contact Reason:<span
                      class="text-danger">*</span></label>
                      <select class="selectpicker" data-width="100%" name="subject">
                    <option selected>Select</option>
                    <option value="1">Design</option>
                    <option value="2">Development</option>
                    <option value="3">Other</option>
                  </select>
                  @error('subject')<span>{{$message}}</span>@enderror
                </div>
                  <!-- form group -->
                <div class="mb-3 col-12">
                  <label
                    class="text-dark form-label"for="messages">Message:</label>
                  <textarea
                    class="form-control"
                    name="message"
                    id="messages"

                    rows="3" placeholder="Messages"></textarea>
                    @error('message')<span>{{$message}}</span>@enderror
                </div>
                  <!-- button -->
                <div class=" col-12">
                  <button type="submit" class="btn btn-primary btn-block">
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>



@endsection