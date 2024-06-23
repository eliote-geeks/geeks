@extends('layouts.app')
@section('content')

    <div class="pt-14 bg-white">
       <!-- contaier -->
      <div class="container ">
         <!-- row -->
        <div class="row ">
          <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-12">
            <!-- card -->
              <div class="mt-8 mb-12">
                <div class="card bg-light shadow-none">
                  <div class="card-body p-md-8">
                    <h3 class="mb-4">Start Learn </h3>
                     <!-- form -->
                    <form method="post" action="{{route('instructor.store')}}"  enctype="multipart/form-data">
                        @csrf
                      <!-- input -->
                      <div class="mb-3">
                        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                        <input name="email" type="email" id="email" class="form-control" placeholder="hello@example.com" required>
                        		@error('email') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                      
                                            <div class="mb-3">
                        <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                        <input name="name" type="text" id="name" class="form-control" placeholder="hello" required>
                        		@error('name') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                <!-- input -->
                      <div class="mb-3">
                        <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="+91" required>
                        		@error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                      <!-- input -->
                      {{-- <div class="mb-3">
                        <label class="form-label" name="resume" for="resume">Resume/CV <span class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                          <input type="file" name="resume" class="form-control" id="resume">                          
                          		@error('resume') <span class="text-danger">{{ $message }}</span> @enderror
                          <label class="input-group-text sr-only" for="resume" ></label>
                        </div>

                        </div>
                        <!-- input -->

                        <div class="mb-3">
                          <label class="form-label" name="cover" for="coverletter">Cover letter <span
                              class="text-danger">*</span></label>
                          <div class="input-group mb-3">
                              <input type="file" name="cover" class="form-control" id="coverletter">
                              		@error('cover') <span class="text-danger">{{ $message }}</span> @enderror
                              <label class="input-group-text sr-only" for="coverletter"></label>
                          </div>
                          </div>
                           --}}
                          
                                                  <div class="mb-3">
                          <label class="form-label" name="cover" for="pass">Password<span
                              class="text-danger">*</span></label>
                          <div class="input-group mb-3">
                              <input type="password" name="password" class="form-control" id="pass" placeholder="********">
                              		@error('password') <span class="text-danger">{{ $message }}</span> @enderror                              
                          </div>
                          </div>
                          

                          <!-- input -->
                          {{-- <div class="mb-3">
                            <label class="form-label" for="message">Why is Geeks important
                              to you?</label>
                            <textarea class="form-control" name="message" rows="4" placeholder="type here...." id="message"></textarea>

                          </div> --}}
                          <div>
                            <!-- button -->
                            <button class="btn btn-primary" type="submit">Submit
                              Application</button>

                          </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection