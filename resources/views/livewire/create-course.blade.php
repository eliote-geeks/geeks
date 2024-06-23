{{-- <link rel="stylesheet" href="../node_modules/@yaireo/tagify/dist/tagify.css"> --}}
<div>
    {{-- Because she competes with no one, no one can compete with her. --}}


  <div class="py-4 py-lg-6 bg-dark">
    <div class="container">
      <div class="row">
        <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
          <div class="d-lg-flex align-items-center justify-content-between">

            <!-- Content -->
            <div class="mb-4 mb-lg-0">
              <h1 class="text-white mb-1">Add New Course</h1>
              <p class="mb-0 text-white lead">
                Just fill the form and create your courses.
              </p>
            </div>
            <div>
              <a href="{{route('dashboard')}}" class="btn btn-white ">Back to Course</a>
               <!-- live demo -->
 <button  wire:loading.attr='hidden' class="btn btn-success" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
 Edit Course
 </button>
 <div wire:loading class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
 {{-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
   Button with data-bs-target
 </button> --}}

 <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
   <div class="offcanvas-header">
     <h5 class="offcanvas-title" id="offcanvasExampleLabel">My courses</h5>
     <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fe fe-x-circle "></i></button>
   </div>
   <div class="offcanvas-body">
     <div>
       Please select Courses you want to edit
     </div>
      <!-- list inline -->

 <div>
 <!-- Search input -->
 <div class="mb-3">
   <label for="search-input" class="form-label">Search</label>
   <input class="form-control" wire:model='search' type="search" id="search-input" value="Search course">
 </div>

@forelse($myCourses as $course)
   <h4 class="ls-xs"><a wire:click='edit({{$course->id}})' href="javascript:void(0)" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fe fe-x-circle"></i>
     {{$course->title}} @if($course->status == 1)<span class="badge rounded-pill bg-success">Live</span>@else <span class="badge rounded-pill bg-danger">pending</span>@endif
     </a>
   </h4>
  @empty
  <span>No course!</span>
  @endforelse
 </div>
   </div>
                              </div>
              {{-- <a href="instructor-courses.html" class="btn btn-success ">Save</a> --}}
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>  
  @if(empty(auth()->user()->first_name) && empty(auth()->user()->last_name) && empty(\App\Models\Instructor::where('instructor_id',auth()->user()->id)->first()->paypal_email))
  <p class="form control text-white bg-danger">This operation cannot succeed because some information is missing in your profile space</p>
@endif
  <div class="pb-12">
    <div class="container">
      <div id="courseForm" class="bs-stepper">
        <div class="row">
          <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
            <!-- Stepper Button -->
            <div class="bs-stepper-header shadow-sm " role="tablist">
          @for ($i = 1 ; $i <=count($pages) ; $i++)            
              <div class="step @if($current_Page == $i) active @endif" data-target="#test-l-1">
                <button wire:loading.attr='disabled' type="button" wire:click='land({{$i}})' class="step-trigger" role="tab" id="courseFormtrigger1" aria-controls="test-l-1">
                  <span class="bs-stepper-circle">{{$i}}</span>
                  <span class="bs-stepper-label">{{$pages[$i]['subheading']}}</span>
                </button>
              </div>
              <div class="bs-stepper-line"></div>
      @endfor

            </div>
            <!-- Stepper content -->
            <div class="bs-stepper-content mt-5">
              {{-- <form wire:submit.prevent='submit'> --}}

              <form onsubmit="return false"  enctype="multipart/form-data">
                <!-- Content one -->
                @if($current_Page == 1)
                <div id="test-l-1" >
                  <!-- Card -->
                  <div class="card mb-3 ">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Basic Information</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="courseTitle" class="form-label">Course Title</label>
                        <input wire:model.lazy='title'  id="courseTitle" class="form-control" type="text" placeholder="Course Title" />
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        <small>Write a 100 character course title.</small>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Courses category</label>                        <select class=" form-control"  wire:model.lazy='category_id' data-width="100%">
                          <option  value="">Select category</option> 
                          @foreach (\App\Models\Category::where('view',1)->get() as $category)
                          @if(\App\Models\Category::where('category_id',$category->id)->count() > 0)
                          @else
                          <option value="{{$category->id}}">{{$category->name}}</option>               
                          @endif
                          @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                        <small>Help people find your courses by choosing    
                          categories that represent your course.</small>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Courses level</label>
                        <select wire:model.lazy='level' class=" form-control" data-width="100%">
                          <option selected disabled value="">Select level</option>
                          <option>Beginners</option>
                          <option>Intermediate</option>
                          <option>Advance</option>
                          <option>Master</option>                          
                        </select>
                        @error('level') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Course Description</label>
                        <textarea wire:model.lazy='description' class="form-control" id="editor2">
                        </textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        <small>A brief summary of your courses.</small>
                      </div>
                    </div>
                  </div>
                  <!-- Button -->
                  <button wire:loading.attr='disabled' class="btn btn-dark" wire:click='goToNextPage'>
                    Next
                  </button>                  
                </div>
@elseif($current_Page == 2)
                <!-- Content two -->
                <div id="test-l-2" aria-labelledby="courseFormtrigger2">
                  <!-- Card -->
                  <div class="card mb-3  border-0">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Courses Media</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="custom-file-container" data-upload-id="courseCoverImg" id="courseCoverImg">
                        <label class="form-label">Course cover image
                          <a href="javascript:void(0)" class="custom-file-container__image-clear"
                            title="Clear Image"></a></label>
                          <input wire:loading.attr='hidden' wire:model.lazy='photo' type="file" class="form-control"
                            accept="image/*" /> 
                             <!-- flex placement right -->
<div wire:loading class="d-flex align-items-center">
  <strong wire:loading>Loading...</strong>
  <div wire:loading class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
</div>
                          <span></span>
                        </label><br><br>
                        @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                        <small class="mt-3 d-block">Upload your course image here. It must meet
                          our
                          course image quality standards to be accepted.
                          Important guidelines: 750x440 pixels; .jpg, .jpeg,.
                          gif, or .png. no text on the image.</small>
                                              <div
                        class="mt-3 d-flex justify-content-center position-relative rounded py-14 border-white border rounded bg-cover"
                        style="background-image: url(@if($photo!=null){{$photo->temporaryUrl()}} @else ../assets/images/course/course-javascript.jpg @endif);
                                       ">              </div>
                      </div><br><br>
                      <div>
                        <input type="url" wire:loading.attr='hidden' wire:model.lazy='video_url' class="form-control" placeholder="Video URL" />
                        
                        @error('video_url') <span class="text-danger">{{ $message }}</span> @enderror                        
                      </div>

                        <!-- flex placement right -->
<div wire:loading class="d-flex align-items-center">
  <strong wire:loading>Loading...</strong>
  <div wire:loading class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
</div>
                      <small class="mt-3 d-block">Enter a valid video URL. Students who watch a
                        well-made promo video are 5X more likely to enroll in
                        your course.
                      </small>
                   
                     <div
                        class="mt-3 d-flex justify-content-center position-relative rounded py-14 border-white border rounded bg-cover"
                        style="background-image: url(@if($photo!=null){{$photo->temporaryUrl()}} @else ../assets/images/course/course-javascript.jpg @endif);
                                       ">
                     {{-- <a href="#" _target class="popup-youtube icon-shape rounded-circle btn-play icon-xl text-decoration-none" data-bs-toggle="modal"       --}}
                        {{-- data-bs-target="#videomodal"> --}}
                        <a target="_blank" class="popup-youtube icon-shape rounded-circle btn-play icon-xl text-decoration-none" href="{{$video_url}}">
                         <i class="fe fe-play fs-3"></i></a>
                      </div> 
                                  
                    </div>
                  </div>
                  <!-- Button -->
                  <div class="d-flex justify-content-between">
                    <button class="btn btn-secondary" wire:click='goToPreviousPage' wire:loading.attr='disabled'>
                      Previous
                    </button>
                    <button class="btn btn-dark" wire:click='goToNextPage' wire:loading.attr='disabled'>                    
                      Next
                    </button>
                  </div>
                </div>
@elseif($current_Page == 3)                
                <div id="test-l-3" >
                  <!-- Card -->
                  <div class="card mb-3  border-0">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Curriculum</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body ">
                      {{-- <div class="bg-light rounded p-2 mb-4">
                        <h4>Introduction to JavaScript</h4>
                        <!-- List group -->
                        <div class="list-group list-group-flush border-top-0" id="courseList">
                          <div id="courseOne">
                            <div class="list-group-item rounded px-3 mb-1" id="introduction">
                              <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">
                                  <a href="#" class="text-inherit">
                                    <i class="fe fe-menu me-1 text-muted align-middle"></i>
                                    <span class="align-middle">Introduction</span>
                                  </a>
                                </h5>
                                <div><a href="#" class="me-1 text-inherit" data-bs-toggle="tooltip" data-placement="top"
                                    title="Edit"><i class="fe fe-edit fs-6"></i></a>
                                  <a href="#" class="me-1 text-inherit" data-bs-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fe fe-trash-2 fs-6"></i></a>
                                  <a href="#" class="text-inherit" aria-expanded="true" data-bs-toggle="collapse"
                                    data-bs-target="#collapselistOne" aria-controls="collapselistOne">
                                    <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span>
                                  </a>
                                </div>
                              </div>
                              <div id="collapselistOne" class="collapse show" aria-labelledby="introduction"
                                data-bs-parent="#courseList">
                                <div class="card-body">
                                  <a href="#" class="btn btn-secondary btn-sm">Add
                                    Article +</a>
                                  <a href="#" class="btn btn-secondary btn-sm">Add
                                    Description +</a>
                                </div>
                              </div>
                            </div>
                            <div class="list-group-item rounded px-3 mb-1" id="development">
                              <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">
                                  <a href="#" class="text-inherit">
                                    <i class="fe fe-menu me-1 text-muted align-middle"></i>
                                    <span class="align-middle">Installing
                                      Development Software</span>
                                  </a>
                                </h5>
                                <div><a href="#" class="me-1 text-inherit" data-bs-toggle="tooltip" data-placement="top"
                                    title="Edit"><i class="fe fe-edit fs-6"></i></a>
                                  <a href="#" class="me-1 text-inherit" data-bs-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fe fe-trash-2 fs-6"></i></a>
                                  <a href="#" class="text-inherit" data-bs-toggle="collapse"
                                    data-bs-target="#collapselistTwo" aria-expanded="false"
                                    aria-controls="collapselistTwo">
                                    <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span>
                                  </a>
                                </div>
                              </div>
                              <div id="collapselistTwo" class="collapse" aria-labelledby="development"
                                data-bs-parent="#courseList">
                                <div class="card-body">
                                  <a href="#" class="btn btn-secondary btn-sm">Add
                                    Article +</a>
                                  <a href="#" class="btn btn-secondary btn-sm">Add
                                    Description +</a>
                                </div>
                              </div>
                            </div>
                            <div class="list-group-item rounded px-3 mb-1" id="project">
                              <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">
                                  <a href="#" class="text-inherit">
                                    <i class="fe fe-menu me-1 text-muted align-middle"></i>
                                    <span class="align-middle">Hello World Project
                                      from GitHub</span>
                                  </a>
                                </h5>
                                <div><a href="#" class="me-1 text-inherit" data-bs-toggle="tooltip" data-placement="top"
                                    title="Edit"><i class="fe fe-edit fs-6"></i></a>
                                  <a href="#" class="me-1 text-inherit" data-bs-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fe fe-trash-2 fs-6"></i></a>
                                  <a href="#" class="text-inherit" data-bs-toggle="collapse"
                                    data-bs-target="#collapselistThree" aria-expanded="false"
                                    aria-controls="collapselistThree">
                                    <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span></a>
                                </div>
                              </div>
                              <div id="collapselistThree" class="collapse" aria-labelledby="project"
                                data-bs-parent="#courseList">
                                <div class="card-body">
                                  <a href="#" class="btn btn-secondary btn-sm">Add
                                    Article +</a>
                                  <a href="#" class="btn btn-secondary btn-sm">Add
                                    Description +</a>
                                </div>
                              </div>
                            </div>
                            <div class="list-group-item rounded px-3 mb-1" id="sample">
                              <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">
                                  <a href="#" class="text-inherit">
                                    <i class="fe fe-menu me-1 text-muted align-middle"></i>
                                    <span class="align-middle">Our Sample
                                      Website</span>
                                  </a>
                                </h5>
                                <div><a href="#" class="me-1 text-inherit" data-bs-toggle="tooltip" data-placement="top"
                                    title="Edit"><i class="fe fe-edit fs-6"></i></a>
                                  <a href="#" class="me-1 text-inherit" data-bs-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fe fe-trash-2 fs-6"></i></a>
                                  <a href="#" class="text-inherit" data-bs-toggle="collapse"
                                    data-bs-target="#collapselistFour" aria-expanded="false"
                                    aria-controls="collapselistFour">
                                    <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span></a>
                                </div>
                              </div>
                              <div id="collapselistFour" class="collapse " aria-labelledby="sample"
                                data-bs-parent="#courseList">
                                <div class="card-body">
                                  <a href="#" class="btn btn-secondary btn-sm">Add
                                    Article +</a>
                                  <a href="#" class="btn btn-secondary btn-sm">Add
                                    Description +</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <a href="#" class="btn btn-outline-dark btn-sm mt-3" data-bs-toggle="modal"
                          data-bs-target="#addLectureModal">Add Lecture +</a>
                      </div> --}}
@foreach ($fields as $field)
         
                      <div class="bg-light rounded p-2 mb-4">
                        <h4>{{$field->nameField}}</h4>                      
                      <a class="btn-sm btn-danger" wire:loading.attr='disabled' wire:click='removeField({{$field->id}})' href="javascript:;"><i class="text-sm fa fa-trash"></i></a>
                      <a wire:loading.attr='disabled'  data-bs-toggle="collapse" data-bs-target="#collapseedit{{$field->id}}" aria-expanded="false" aria-controls="collapseedit{{$field->id}}" class="btn-sm btn-primary"  href="javascript:;"><i class="text-sm fa fa-edit"></i></a>

        
<div class="collapse" id="collapseedit{{$field->id}}">
  <div class="card card-body col-3">
    <input type="text" wire:model.defer='editSection' >
    <small>Edit section title</small>
    @error('editSection')<small class="text-danger">{{$message}}</small>@enderror
    <br>    
    <button class="btn btn-primary" wire:loading.attr='disabled' wire:click='editSection({{$field->id}})'>Save Changes</button>
  </div>
</div>
                      

                        <!-- List group -->
                        <div class="list-group list-group-flush border-top-0" id="courseList{{$field->id}}">
                          <div id="course{{$field->id}}">

@forelse (App\Models\Lesson::where('lecture_id',$field->id)->where('user_id',$userId)->where('course_title',$title)->get() as $lesson)
                            <div class="list-group-item rounded px-3 mb-1" id="introduction{{$field->id}}">
                              <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">
                                  <a href="#" data-bs-toggle="collapse"
                                    data-bs-target="#collapselist{{$lesson->id}}" aria-expanded="false"
                                    aria-controls="collapselist{{$lesson->id}}" class="text-inherit">
                                    <i class="fe fe-menu me-1 text-muted align-middle"></i>
                                    <span class="align-middle">{{$lesson->title}}</span>
                                  </a>
                                </h5>
                                <div>
                                  <a href="javascript:void(0)" wire:click='deleteLesson({{$lesson->id}})'  class="me-1 text-inherit" data-bs-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fe fe-trash-2 fs-6"></i></a>
                                  <a href="#" class="text-inherit" data-bs-toggle="collapse"
                                    data-bs-target="#collapselist{{$lesson->id}}" aria-expanded="false"
                                    aria-controls="collapselist{{$lesson->id}}">
                                    <span class="chevron-arrow"><i class="fe fe-chevron-down"></i></span></a>
                                </div>
                              </div>
                              <div id="collapselist{{$lesson->id}}" class="collapse" aria-labelledby="introduction{{$field->id}}"
                                data-bs-parent="#courseList{{$field->id}}">
                                <div class="card-body">
                                  {{-- <a href="{{$lesson->video}}" _target="blank" class="btn btn-secondary btn-sm">
                                    Launch video</a> --}}
                                    <x-embed  url="{{$lesson->video}}" />
                                  {{-- <a href="#" class="btn btn-secondary btn-sm">Add
                                    Description +</a> --}}
                                </div>
                              </div>
                            </div>
                            @empty
@endforelse

                          </div>
                        </div>
                        
                          <a wire:loading.attr='disabled' href="javascript:void(0)" class="btn btn-outline-dark btn-sm mt-3"  data-bs-toggle="modal" 
                        data-bs-target="#addLectureModal{{$field->id}}" data-whatever="@mdo">Add Lecture + @mdo</a>

                         <div class="modal fade" id="addLectureModal{{$field->id}}" tabindex="-1" role="dialog" aria-labelledby="addLectureModalLabel{{$field->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addLectureModalLabel{{$field->id}}">
                    Add New Lecture
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

        </button>
            </div>
            <div class="modal-body">
            <label>Title</label>
                <input class="form-control mb-3" type="text" wire:model.defer='VideoTitle' placeholder="Add new lecture" />
                
                <label>Duration</label>
                <input class="form-control mb-3" type="time" wire:model.defer='duration' placeholder="Add Duration time" />
                
                {{-- <input class="form-control mb-3" type="link"  wire:model.defer='video'  placeholder="Add Url" /> --}}
      
        {{-- <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Type</button> --}}
        {{-- <ul class="dropdown-menu">
          <li><hr class="dropdown-divider"></li>
          <li><button class="dropdown-item" >{{$A}}</button></li>
          <li><hr class="dropdown-divider"></li>
          <li><button class="dropdown-item" >{{$V}}</button></li>          
          <li><hr class="dropdown-divider"></li>
          <li><button class="dropdown-item" >{{$F}}</button></li>
        </ul> --}}
        <label>Video Link</label>
        <input type="url" wire:model.defer='video' placeholder="video link" class="form-control" aria-label="Text input with dropdown button" required>
        {{-- <input type="file" class="form-control" placeholder="upload video" wire:model.defer='video'> --}}
      
        <small>Accept Youtube, Vimeo, slideshare, miro, fallback, dailymotion</small>

                <button data-bs-dismiss="modal" aria-label="Close" class="btn btn-dark" type="Button" wire:click='saveLesson({{$field->id}})'>
             Add New Lecture 
          </button> 
                <button class="btn btn-outline-white" data-bs-dismiss="modal" aria-label="Close">
            Close
          </button>
          
            </div>
        </div>
    </div>
</div> 


                        



                          <br>
                          {{-- @if(($show == true) && $lesson->id == $id_lesson) --}}
                        <!-- Validation Form -->

{{--     
  <div class="col-md-3">
    <label for="validationCustom01" class="form-label">Title</label>
    <input type="text" class="form-control" id="validationCustom01" wire:model.defer='VideoTitle' required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom02" class="form-label">Duration</label>
    <input type="time" class="form-control" id="validationCustom02" wire:model.defer='duration' required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>

  <div class="col-12">
    <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Url</label>
    <input type="url" class="form-control" wire:model.defer='video' id="validationCustom02"   placeholder="https://www.youtube.com/watch?v=obCvKM7p5ow" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-dark" type="submit" wire:loading.attr='hidden' wire:click.prevent='saveLesson({{$field->id}})'><i class="fe fe-play"></i>Add Video</button>
          <button wire:loading class="btn btn-dark" type="button" disabled>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    Loading...
  </button>
  </div><br><br> --}}
{{-- @endif --}}



                      </div>

@endforeach

					  
                      <a href="#" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal"
                        data-bs-target="#addSectionModal">Add Section</a>
                        <small class="mt-3 d-block">Create a section on your course section have. One section has many or one lesson </small>
                    </div>
                  </div>


                  <!-- Button -->
                  <div class="d-flex justify-content-between">
                    <button class="btn btn-secondary" wire:loading.attr='disabled' wire:click='goToPreviousPage'>
                      Previous
                    </button>
                    <button class="btn btn-dark" wire:loading.attr='disabled' wire:click='goToNextPage'>
                      Next
                    </button>
                  </div>
                </div>
@elseif($current_Page == 4)
                <!-- Content four -->
                 
                <div id="test-l-4"  >
                  <!-- Card -->
                  <div class="card mb-3  border-0">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Requirements</h4>
                    </div> 
                    <!-- Card body -->
                    <div class="card-body">
                      <b><label>Requirements</label></b><br>
                      <input wire:model='requirements' id="input" name='tags' class="form-control" value='jquery, bootstrap' autofocus>
                      
                      {{-- <input wire:model='requirement' data-role="tagsinput" autofocus> <button type="reset" wire:click='requirements' class="btn-sm btn-info">Add</button> --}}
                      @error('requirement') <span class="text-danger">{{ $message }}</span> @enderror
                    <span>Add requirements for this course!!</span>
                      @if($requirement!=null)<span class="text-success"> click to add "{{$requirement}}" please reset the input after click</span>@endif<br>
                      
                   <b> <label>Summary</label></b>
                    <textarea id="editor1" class="form-control" wire:model.lazy='summary'></textarea>
                    @error('summary') <span class="text-danger">{{ $message }}</span> @enderror<br>
                    <span>Talk summary of this course !!</span><br>
                    
                  <b><label>Short Description</label></b>
                    <textarea  class="form-control" wire:model.lazy='short_description'></textarea>
                    @error('short_description') <span class="text-danger">{{ $message }}</span> @enderror
                    <span>Talk short description of this course !!</span>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between mb-22">
                    <!-- Button -->
                    <button class="btn btn-secondary mt-5" wire:click='goToPreviousPage' wire:loading.attr='disabled'>
                      Previous
                    </button>
                    
                    
                  @if($courseId === null)
                    <button  type="submit" wire:click='submit' class="btn btn-danger mt-5" >
                      Submit For Review
            <span wire:loading class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    </button> 
                @endif
                  @if($courseId != null)<button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button><button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button><button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button><button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>   <button  type="submit" wire:click='submit' class="btn btn-primary mt-5" >
                      Save changes
            <span wire:loading class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    </button> @endif

                  </div>

                </div>


@endif
<div>
<br><br>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
                  <button  class="btn-lg btn-outline-dark"><i class="fe fe-arrow-down"></i></button>
        </div>
@if($courseId != null)
<h2>Post "<b>{{$title}}</b>" Course in Your Class   !!</h2>
  @if(\App\Models\ClassInstructor::where('user_id',auth()->user()->id)->count() > 0)
        @foreach ($classes as $class)
    
                <div class="col-lg-6 col-md-6 col-12"  data-spy="scroll" data-bs-target="#class" data-offset="0">
                  <!-- Card -->
                  <div class="card  mb-4 ">
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="d-lg-flex">
                        <div class="position-absolute ">
                          <img src="{{\App\Models\ClassSchool::find($class->class_id)->logo}}" alt=""
                            class="rounded-circle avatar">

                        </div>
                        <div class="ms-lg-9">
                          <h4 class="mb-0">{{\App\Models\ClassSchool::find($class->class_id)->name}}</h4>
                          <p class="fs-6 mb-1 text-warning"><span>{{\App\Models\ClassSchool::find($class->class_id)->school->title}}</span></p>
                          <p class="fs-6 text-muted"><span class="me-2">
                              Courses</span>
                              {{-- <span class="ms-2"><span class="text-dark fw-medium">sdskdlksldsd
                              </span>
                              Students</span> --}}
                          </p>
                          
                          @if(\App\Models\ClassCourse::where('course_id',$courseId)->where('school_id','!=',\App\Models\ClassSchool::find($class->class_id)->school_id)->count() == 0)
                          @if(\App\Models\ClassCourse::where('course_id',$courseId)->where('class_id',$class->class_id)->count() == 0)
                          <button wire:loading.attr='disabled' wire:click='class({{$class->class_id}})' class="btn btn-outline-white btn-sm">
                            Post
                          </button>
                          <span wire:loading class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                          @else
                          <button wire:loading.attr='disabled' wire:click='class({{$class->class_id}})' class="btn btn-outline-danger btn-sm">
                            Delete
                          </button>
                          <span wire:loading class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                          @endif
                          @endif
                          

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        @endforeach
      @endif
  @endif


              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  



{{-- modal --}}
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center d-flex">
                <h4 class="modal-title" id="paymentModalLabel">
                    Add New Payment Method
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

					</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <!-- Form -->
                    <form class="row mb-4">
                        <div class="mb-3 col-12 col-md-12 mb-4">
                            <h5 class="mb-3">Credit / Debit card</h5>
                            <!-- Radio button -->
                            <div class="d-inline-flex">
                            <div class="form-check me-2">
                                <input type="radio" id="paymentRadioOne" name="paymentRadioOne" class="form-check-input" />
                                <label class="form-check-label" for="paymentRadioOne"><img
											src="../assets/images/creditcard/americanexpress.svg" alt="" /></label>
                            </div>
                            <!-- Radio button -->
                            <div class="form-check me-2">
                                <input type="radio" id="paymentRadioTwo" name="paymentRadioOne" class="form-check-input" />
                                <label class="form-check-label" for="paymentRadioTwo"><img
											src="../assets/images/creditcard/mastercard.svg" alt="" /></label>
                            </div>

                            <!-- Radio button -->
                            <div class="form-check">
                                <input type="radio" id="paymentRadioFour" name="paymentRadioOne" class="form-check-input" />
                                <label class="form-check-label" for="paymentRadioFour"><img src="../assets/images/creditcard/visa.svg"
											alt="" /></label>
                            </div>
                        </div>
                        </div>
                        <!-- Name on card -->
                        <div class="mb-3 col-12 col-md-4">
                            <label for="nameoncard" class="form-label">Name on card</label>
                            <input id="nameoncard" type="text" class="form-control" name="nameoncard" placeholder="Name" required />
                        </div>
                        <!-- Month -->
                        <div class="mb-3 col-12 col-md-4">
                            <label class="form-label">Month</label>
                            <select class="selectpicker" data-width="100%">
									<option value="">Month</option>
									<option value="Jan">Jan</option>
									<option value="Feb">Feb</option>
									<option value="Mar">Mar</option>
									<option value="Apr">Apr</option>
									<option value="May">May</option>
									<option value="June">June</option>
									<option value="July">July</option>
									<option value="Aug">Aug</option>
									<option value="Sep">Sep</option>
									<option value="Oct">Oct</option>
									<option value="Nov">Nov</option>
									<option value="Dec">Dec</option>
								</select>
                        </div>
                        <!-- Year -->
                        <div class="mb-3 col-12 col-md-4">
                            <label class="form-label">Year</label>
                            <select class="selectpicker" data-width="100%">
									<option value="">Year</option>
									<option value="June">2018</option>
									<option value="July">2019</option>
									<option value="August">2020</option>
									<option value="Sep">2021</option>
									<option value="Oct">2022</option>
								</select>
                        </div>
                        <!-- Card number -->
                        <div class="mb-3 col-md-8 col-12">
                            <label for="cc-mask" class="form-label">Card Number</label>
                            <input type="text" class="form-control" id="cc-mask" data-inputmask="'mask': '9999 9999 9999 9999'" inputmode="numeric" placeholder="xxxx-xxxx-xxxx-xxxx" required />
                        </div>
                        <!-- CVV -->
                        <div class="mb-3 col-md-4 col-12">
                            <div class="mb-3">
                                <label for="cvv" class="form-label">CVV Code
										<i class="fas fa-question-circle ms-1" data-bs-toggle="tooltip" data-placement="top"
											title="A 3 - digit number, typically printed on the back of a card."></i></label>
                                <input type="password" class="form-control" name="cvv" id="cvv" placeholder="xxx" maxlength="3" inputmode="numeric" required />
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="col-md-6 col-12">
                            <button class="btn btn-dark" type="submit">
									Add New Card
								</button>
                            <button class="btn btn-outline-white" type="button" data-bs-dismiss="modal">
									Close
								</button>
                        </div>
                    </form>
                    <span><strong>Note:</strong> that you can later remove your card at
							the account setting page.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="addSectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addSectionModalLabel">
                    Add New Section
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

        </button>
            </div>
            <div class="modal-body">
                {{-- <input class="form-control mb-3" wire:model.lazy='videoLecture'  type="text" placeholder="Add new video title" /> --}}
                <input class="form-control mb-3" wire:model.defer='nameField'  type="text" placeholder="Add new section" />
                <button class="btn btn-dark" type="Button" wire:click='addField' data-bs-dismiss="modal" aria-label="Close">
            Add New Section
          </button>
                <button class="btn btn-outline-white" data-bs-dismiss="modal" aria-label="Close">
            Close
          </button>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="addLeconModal" tabindex="-1" role="dialog" aria-labelledby="addLeconModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addLeconModalLabel">
                    Add Lessons
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

        </button>
            </div>
            <div class="modal-body">
                {{-- <input class="form-control mb-3" wire:model.lazy='videoLecture'  type="text" placeholder="Add new video title" /> --}}
                {{-- <label> Title </label><input class="form-control mb-3" wire:model.defer='VideoTitle'  type="text" placeholder="Add new lesson title" />
                <label> Duration </label><input class="form-control mb-3" wire:model.defer='duration'  type="time" placeholder="03:23" />
                <label> Video </label> <input class="form-control mb-3" wire:model.defer='video' placeholder="lesson url"  type="url"  />
                <button class="btn btn-dark" type="Button" wire:click='saveLesson' data-bs-dismiss="modal" aria-label="Close"> --}}
            Save Lesson
          </button>
                <button class="btn btn-outline-white" data-bs-dismiss="modal" aria-label="Close">
            Close
          </button>
            </div>

        </div>
    </div>
</div>




{{-- video url --}}
<div class="modal fade" id="videomodal" tabindex="-1" role="dialog" aria-labelledby="videomodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">      
      <x-embed url="{{$video_url}}"/>
      
    </div>
</div>


<!-- Modal -->
{{-- <div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="addLectureModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addSectionModalLabel">
                    Add New Lecture
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

        </button>
            </div>
            <div class="modal-body">
                <input class="form-control mb-3" type="text" placeholder="Add new Section" />
                <button class="btn btn-dark" type="Button">
            Add New Section
          </button>
                <button class="btn btn-outline-white" data-bs-dismiss="modal" aria-label="Close">
            Close
          </button>
            </div>
        </div>
    </div>
</div> --}}




{{-- modal --}}
<div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header py-4 align-items-lg-center">
                <div class="d-lg-flex">
                    <div class="mb-3 mb-lg-0">
                        <img src="../assets/images/svg/feature-icon-1.svg" alt="" class=" bg-dark icon-shape icon-xxl rounded-circle">
                    </div>
                    <div class="ms-lg-4">
                        <h2 class="fw-bold mb-md-1 mb-3">Introduction to JavaScript <span class="badge bg-warning ms-2">Free</span></h2>
                        <p class="text-uppercase fs-6 fw-semi-bold mb-0"><span class="text-dark">Courses -
                  1</span> <span class="ms-3">6 Lessons</span> <span class="ms-3">1 Hour 12 Min</span></p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

          </button>
            </div>
            <div class="modal-body">
                <h3>In this course you’ll learn:</h3>
                <p class="fs-4">Vanilla JS is a fast, lightweight, cross-platform framework for building incredible, powerful JavaScript applications.</p>
                <ul class="list-group list-group-flush">
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-dark icon-sm rounded-circle me-2"><i
                      class="mdi mdi-play fs-4"></i></span>
                                <span>Introduction</span>
                            </div>
                            <div class="text-truncate">
                                <span>1m 7s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-dark icon-sm rounded-circle me-2"><i
                      class="mdi mdi-play fs-4"></i></span>
                                <span>Installing Development Software</span>
                            </div>
                            <div class="text-truncate">
                                <span>3m 11s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-dark icon-sm rounded-circle me-2"><i
                      class="mdi mdi-play fs-4"></i></span>
                                <span>Hello World Project from GitHub</span>
                            </div>
                            <div class="text-truncate">
                                <span>2m 33s</span>
                            </div>
                        </a>
                    </li>
                    <!-- List group item -->
                    <li class="list-group-item ps-0">
                        <a href="#" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                            <div class="text-truncate">
                                <span class="icon-shape bg-light text-dark icon-sm rounded-circle me-2"><i
                      class="mdi mdi-play fs-4"></i></span>
                                <span>Our Sample Javascript Files</span>
                            </div>
                            <div class="text-truncate">
                                <span>22m 30s</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>






</div>




