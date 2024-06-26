
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
        <div class="py-6 py-lg-12">
      <!-- container -->
      <div class="container">

        <div class="row">
          <!-- cols -->
          <div class="col-md-12 col-lg-5">
            <div class="mb-12">
              <!-- title -->
              <h1 class="display-4 mb-3 fw-bold">Now you have a School Create a Class today</h1>
              <!-- text -->
              <p class="mb-0 lead">Ready to post a class for your School ? Choose
                your class type below and fill all the class
                information
              </p>
            </div>
          </div>
        </div>
                 @if(\App\Models\ClassSchool::where('school_id',$school->id)->count() > 0)
<button wire:loading.attr='disabled' class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Click here to edit </button>
        @endif
  <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasTopLabel">Edit School informations</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul>
      @if(\App\Models\ClassSchool::where('school_id',$school->id)->count() > 0)
      @foreach(\App\Models\ClassSchool::where('school_id',$school->id)->get() as $class)
      <li><button class="badge bg-secondary" wire:click='edit({{$class->id}})' wire:loading.attr='disabled' >{{$class->name}}</button></li>          
      @endforeach
      @endif
      </ul>
    </div>
</div>

        <!-- form -->
        <form>
          <div class="row">
            <!-- col -->
            <div class="col-lg-4 col-md-4 col-12">

              <div class="mb-4">
                <div class="mb-4">
                  <!-- icon -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                    fill="currentColor"
                    class="bi bi-person text-primary" viewBox="0
                    0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0
                      6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4
                      8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6
                      4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516
                      10.68 10.289 10 8 10c-2.29
                      0-3.516.68-4.168 1.332-.678.678-.83
                      1.418-.832 1.664h10z" />
                    </svg>
                  </div>
                  <!-- heading -->
                  <h3>1. School poster information</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    lacerat amet ac.</p>
                </div>
              </div>
              <div class="offset-lg-1 col-lg-7 col-md-8 col-12">
                <div>
                  <!-- row -->
                  <div class="row">
                    <!-- col -->
                    <div class="mb-3 col-12 col-md-6">
                      <!-- label -->
                      <label class="form-label" for="fname">First Name<span
                          class="text-danger">*</span></label>
                      <!-- input -->
                      <input type="text" id="fname" class="form-control"
                        placeholder="First Name" wire:model.defer='first_name' required>
                           @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                      <!-- label -->
                      <label class="form-label" for="lname">Last Name<span
                          class="text-danger">*</span></label>
                      <!-- input -->
                      <input type="text" id="lname" class="form-control"
                        placeholder="Last Name" wire:model.defer='last_name' required>
                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-12">
                      <!-- label -->
                      <label class="form-label" for="email">Email<span
                          class="text-danger">*</span></label>
                      <!-- input -->
                      <input type="email" id="email" class="form-control"
                        placeholder="Write you Email id" wire:model.defer='email' required>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-12">
                      <!-- label -->
                      <label class="form-label" for="phone">Phone Number<span
                          class="text-danger">*</span></label>
                      <!-- input -->
                      <div class="input-group mb-2">
                        <input type="text" id="phone" class="form-control"
                          placeholder="Phone" wire:model.defer='phone' required>

                      </div>
                          @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        <!-- select menu -->
                      <!-- checkbox -->
                      <div class="form-check">
                        <label class="form-check-label fs-6" for="formNumber">
                          If you want to edit your profile information go to your school banner.
                        </label>
                      </div>
                    </div>


                  </div>

                </div>


              </div>
            </div>


            <!-- hr -->
            <hr class="my-10">
            <!-- row -->
            <div class="row">
              <!-- col -->
              <div class="col-lg-4 col-md-4 col-12">
                <div class="mb-4">
                  <div class="mb-4">
                    <!-- icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="36"
                      height="36" fill="currentColor"
                      class="bi bi-info-circle text-primary" viewBox="0 0 16
                      16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0
                        8 0a8 8 0 0 0 0 16z" />
                        <path
                          d="m8.93
                          6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738
                          3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252
                          1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275
                          0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0
                          1 1 0 0 1 2 0z" />
                        </svg>
                      </div>
                      <!-- heading -->
                      <h3>2. Class Basic Informations</h3>
                      <!-- text -->
                      <p>Lorem ipsum dolor sit amet, consectetur adillicitudin
                        iaculis nunc et convallis.</p>
                    </div>
                  </div>
                  <div class="offset-lg-1 col-lg-7 col-md-8 col-12">
                    <div>
                      <!-- row -->
                      <div class="row">
                        {{-- <div class="mb-3 col-12">
                          <!-- label -->
                          <label class="form-label" for="SchoolTitle">School <span
                              class="text-danger">*</span></label>
                          <!-- input -->
                          <input type="text" id="SchoolTitle" wire:model.defer='location' class="form-control"
                            placeholder="Write the School Location" required>
                            @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> --}}
                        <div class="mb-3 col-12 col-md-12">
                          <!-- label -->
                          <label class="form-label">School<span
                              class="text-danger">*</span></label>
                              <input type="text" disabled class="form-control" value="{{$school->title}}">
                            @error('school_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-12">

                          <!-- checkbox -->
                          
                        </div> 
                        <div class="mb-3 col-12 col-md-12">
                          <!-- label -->
                          <div class="mb-2">Class type<span class="text-danger">*</span></div>
                          <!-- btn group -->
                          <div class="btn-group" role="group" aria-label="Basic
                            radio toggle button group">
                            <!-- radio -->
                            {{-- <input type="radio" class="btn-check"
                              name="btnradio" id="fullTime" autocomplete="off">
                            <label class="btn btn-outline-primary"
                              for="FullTime">Full Time </label> --}}
                            <!-- radio -->
                            {{-- <input type="radio" class="btn-check"
                              name="btnradio" id="partTime" autocomplete="off"
                              checked>
                            <label class="btn btn-outline-primary"
                              for="partTime">Part Time</label> --}}
                            <!-- radio -->
                            <select class="form-control" wire:model='type'>
                              <option value="private">private</option>
                              <option value="public">public</option>
                            </select>
                            @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                        </div>



                      </div>

                    </div>


                  </div>
                </div>
                <hr class="my-10">
                <div class="row">

                  <div class="col-lg-4 col-md-4 col-12">
                    <div class="mb-4">
                      <div class="mb-4">
                        <!-- icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="36"
                          height="36" fill="currentColor" class="bi bi-building
                          text-primary" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15
                            .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0
                            1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0
                            1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0
                            1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1
                            10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1
                            .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                            <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2
                              2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2
                              0h1v1h-1V9zm-2 2h1v1H8v-1zm2
                              0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8
                              7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8
                              5h1v1H8V5zm2 0h1v1h-1V5zm2
                              0h1v1h-1V5zm0-2h1v1h-1V3z" />
                            </svg>
                          </div>
                          <!-- heading -->
                          <h3>3. Class Advance information</h3>
                          <!-- text -->
                          <p>Morbi nec augue tincidun olestie diam at
                            pulvinar mcongue fermentum.</p>
                        </div>
                      </div>
                      <div class="offset-lg-1 col-lg-7 col-md-8 col-12">
                        <div>

                          <div class="row">
                            <div class="mb-3 col-12">
                              <!-- label -->
                              <label class="form-label" for="SchoolName">Class
                                name<span class="text-danger">*</span></label>
                              <!-- input -->
                              <input type="text" id="SchoolName" wire:model.defer='name' 
                                class="form-control" placeholder="School name"
                                required>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            {{-- <div class="mb-3 col-12">
                              <!-- label -->
                              <label class="form-label" for="SchoolWebsite">School website<span class="text-danger">*</span></label>
                              <!-- input -->
                              <input type="text" id="SchoolWebsite" wire:model.defer='website'
                                class="form-control" placeholder="School
                                website" required>
                                @error('website') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-12">
                              <!-- label -->
                              <label class="form-label">School industry<span
                                  class="text-danger">*</span></label>
                              <!-- select menu -->
                              <select class="form-select" wire:model.defer='industry'>
                                <option selected>Web Designer</option>
                                <option >Front End Developer</option>
                                <option >Software Engineer</option>
                              </select>
                              @error('industry') <span class="text-danger">{{ $message }}</span> @enderror

                            </div> --}}
                            <div class="mb-3 col-12 col-md-12">
                              <!-- label -->
                              <label class="form-label">School Logo</label>
                              <!-- input group -->
                              <div class="input-group mb-2">
                                <input type="file" class="form-control" wire:model.defer='logo'
                                  id="SchoolLogo">
                                <!-- input group text -->
                                <label class="input-group-text"
                                  for="SchoolLogo">Upload</label>
                              </div>
                              <!-- text -->
                              <span class="fs-6">School logo should be a PNG or
                                JPG file of
                                500 x 500 pixels</span>
                                @if($logo!=null)
                                <img class="rounded-circle avatar-lg" src="{{$logo->temporaryUrl()}}"> 
                                @endif
                    @error('logo') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- label -->
                            <div class="col-12 col-md-12 mb-3">
                              <label class="form-label">School description</label>
                              <textarea id="editor" class="py-4 form-control"  wire:model.defer='description'>
                                
                              </textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror

                            </div>
                            <div class="mb-5 col-12 col-md-12">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model.defer='terms'
                                  value="" id="flexCheckDefault">
                                <label class="form-check-label"
                                  for="flexCheckDefault">
                                  I accept the <a
                                    href="javascript:;">terms
                                    and conditions</a> for the upload a School
                                  listing at School.
                                </label>
                              </div>
                              @error('terms') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-12 col-md-12">  
                              <button wire:loading.attr='hidden' wire:click.prevent='save' class="btn btn-primary">
                                Submit for Approval
                              </button>
                               <div wire:loading class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                            </div>

                       <div class="mb-3 col-12 col-md-12">

      <div class="pt-lg-12 pb-lg-3 pt-8 pb-6">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="mb-0">Instructors Recommended @if(\App\Models\ClassSchool::where('id',$id_class)->count() > 0 ) to you class<span class="text-decoration-underline"> {{ \App\Models\ClassSchool::find($id_class)->name}} </span> @endif</h2>
                </div>
            </div>

            <div class="position-relative">
                <ul class="controls " id="sliderFirstControls">
                    <li class="prev">
                        <i class="fe fe-chevron-left"></i>
                    </li>
                    <li class="next">
                        <i class="fe fe-chevron-right"></i>
                    </li>
                </ul>
                <div class="sliderFirst">
                

@foreach (\App\Models\User::inRandomOrder()->where('user_type','App\Models\Instructor')->get() as $instructor)
    
@if ($instructor->courses->count() > 0)
{{-- @if(\App\Models\ClassInstructor::where('user_id',$instructor->id)->where('class_id',$id_class)->count() != 0 && \App\Models\ClassInstructor::where('user_id',$instructor->id)->where('class_id',$id_class)->first()->status != 1 ) --}}
    
                    <div class="card card-hover">
                    <div
                        class="d-flex justify-content-between align-items-center p-4">
                        <div class="d-absolute">
                            <a href="{{route('instructor.profile',$instructor)}}"> 
                                 <div class="me-12">
       <span class="avatar avatar-lg me-2">
           <img alt="avatar" src="{{$instructor->profile_photo_url}}" class="rounded" />
       </span>

   </div>
</a>
                            <div class="ms-1 ">
                            <h4 class="mb-1">
                                <a href="course-path-single.html"
                                    class="text-inherit">
                        </a>
                        {{$instructor->name}}
                    </h4>
                    <p class="mb-0 fs-6"> <span
                        class="me-2"><span
                        class="text-dark fw-medium">{{$instructor->courses->count()}}</span>
                        Courses</span><br>
                    <span><br>
                @if($id_class!=null)
                <div wire:loading class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                     </div>

                        <span wire:loading.attr='disabled'
                    class="text-dark fw-medium"><a wire:click='invitation({{$instructor->id}})' href="javascript:void(0)" class="@if((\App\Models\ClassInstructor::where('user_id',$instructor->id)->where('class_id',$id_class)->first() != null)) @if((\App\Models\ClassInstructor::where('user_id',$instructor->id)->where('class_id',$id_class)->first()->status == 1 )  )  btn-sm btn-success @else btn-sm btn-danger @endif @endif">
                    
                     <i class="fe fe-user-{{\App\Models\ClassInstructor::where('user_id',$instructor->id)->where('class_id',$id_class)->count() == 0 ? 'plus' : 'check' }}"></i></a>  
                        </span>
                        @else
                        <span>You need a class</span>
                    @endif
                     </span>
                        </p>
                    </div>
                    </div>
                    </div>
                    </div>

@endif
@endforeach
                    @if(session()->has('message'))
                    <span class="text-dark">{{session('message')}}</span>
                    @endif
                </div>
            </div>
        </div>
    </div> 


                          </div>

                        </div>


                      </div>
                    </div>
{{-- <a href="{{route('class.show',$id_class)}}" >View</a> --}}


                  </form>
                </div>

              </div>


