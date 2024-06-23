    <div class="py-6 py-lg-12">
      <!-- container -->
      <div class="container">

        <div class="row">
          <!-- cols -->
          <div class="col-md-12 col-lg-5">
            <div class="mb-12">
              <!-- title -->
              <h1 class="display-4 mb-3 fw-bold">Create Or Edit your School today</h1>
              <!-- text -->
              <p class="mb-0 lead">Ready to post a School for your School ? Choose
                your School type below and fill all the School
                information
              </p>
            </div>
          </div>
        </div>
         <!-- placement top -->
         @if(\App\Models\School::where('user_id',auth()->user()->id)->count() > 0)
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Click here to edit </button>
        @endif
  <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasTopLabel">Edit School informations</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul>
      @if(\App\Models\School::where('user_id',auth()->user()->id)->count() > 0)
      @foreach (\App\Models\School::where('user_id',auth()->user()->id)->get() as $school)
      <li>{{$school->title}} <button class="badge bg-secondary" wire:loading.attr='disabled' wire:click='edit({{$school->id}})' >Edit</button> <a href="{{route('schools.show',$school->id)}}" class="badge bg-dark">view</a> <button class="badge bg-danger">delete</button></li>          
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
                        <select class="form-select" id="inputGroupSelect02"
                          style="max-width: 8rem;" >
                          <option selected>Home</option>
                          <option value="1">Work</option>
                          <option value="2">Mobile</option>
                        </select>

                      </div>
                          @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        <!-- select menu -->
                      <!-- checkbox -->
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value=""
                          id="formNumber">
                        <label class="form-check-label fs-6" for="formNumber">
                          Send me important updates in this number.
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
                      <h3>2. School information</h3>
                      <!-- text -->
                      <p>Lorem ipsum dolor sit amet, consectetur adillicitudin
                        iaculis nunc et convallis.</p>
                    </div>
                  </div>
                  <div class="offset-lg-1 col-lg-7 col-md-8 col-12">
                    <div>
                      <!-- row -->
                      <div class="row">
                        <div class="mb-3 col-12">
                          <!-- label -->
                          <label class="form-label" for="SchoolTitle">School location<span
                              class="text-danger">*</span></label>
                          <!-- input -->
                          <input type="text" id="SchoolTitle" wire:model.defer='location' class="form-control"
                            placeholder="Write the School Location" required>
                            @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3 col-12 col-md-12">
                          <!-- label -->
                          <label class="form-label">Select Department<span
                              class="text-danger">*</span></label>
                          <!-- select option -->        
                          <select class="form-select" wire:model.defer='departement'>                          
                            <option selected>Web Designer</option>
                            <option >Front End Developer</option>
                            <option >Software Engineer</option>
                          </select>
                            @error('departement') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        {{-- <div class="mb-3 col-12 col-md-12">
                          <!-- label -->
                          <label class="form-label">School location<span
                              class="text-danger">*</span></label>
                          <!-- checkbox -->
                          <div class="form-check">
                            <input class="form-check-input" type="radio"
                              name="flexRadioDefault" id="onsite">
                            <label class="form-check-label" for="onsite">
                              Onsite
                            </label>
                          </div>
                          <!-- checkbox -->
                          <div class="form-check">
                            <input class="form-check-input" type="radio"
                              name="flexRadioDefault" id="remote" checked>
                            <label class="form-check-label" for="remote">
                              Remote

                            </label>
                          </div>
                          <!-- checkbox -->
                          <div class="form-check">
                            <input class="form-check-input" type="radio"
                              name="flexRadioDefault" id="onsiteorremote">
                            <label class="form-check-label"
                              for="onsiteorremote">
                              Onsite or Remote

                            </label>
                          </div>
                        </div> --}}
                        <div class="mb-3 col-12 col-md-12">
                          <!-- label -->
                          {{-- <div class="mb-2">School type<span class="text-danger">*</span></div> --}}
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
                            {{-- <input type="radio" class="btn-check"
                              name="btnradio" id="freelance" autocomplete="off">
                            <label class="btn btn-outline-primary"
                              for="freelance">Freelance </label>
                            <!-- radio -->
                            <input type="radio" class="btn-check"
                              name="btnradio" id="contract" autocomplete="off">
                            <label class="btn btn-outline-primary"
                              for="contract">Contract</label> --}}
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
                          <h3>3. School information</h3>
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
                              <label class="form-label" for="SchoolName">School
                                name<span class="text-danger">*</span></label>
                              <!-- input -->
                              <input type="text" id="SchoolName" wire:model.defer='title' 
                                class="form-control" placeholder="School name"
                                required>
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3 col-12">
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

                            </div>
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
                                    href="../terms-condition-page.html">terms
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

                    {{-- <a href="{{route('schools.show',\App\Models\School::where('id',3)->first())}}">View</a> --}}

                          </div>

                        </div>


                      </div>
                    </div>



                  </form>
                </div>

              </div>
