<div>


  <div class="{{$mask == 0 ? '' : 'course-container'}} ">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
         <!-- labels --> 
           <!-- Tab content -->
          <div class="tab-content content" id="course-tabContent">
            <div class="tab-pane fade show active" id="course-intro" role="tabpanel" aria-labelledby="course-intro-tab">
              <div class="d-flex align-items-center justify-content-between mb-4">           
              <i><a href="javascript:void(0)" wire:click='mask' class=""><i class="{{$mask == 1 ? 'fe fe-angle-double-right' : 'fe fe-angle-double-right'}}"></i>{{$mask == 1 ? 'Show' : 'Mask'}} Questions</a></i>
                <div>
                  <h3 class=" mb-0  text-truncate-line-2">{{$url->title}}</h3>
                </div>
                <div>
                   <!-- Dropdown -->
                  <span class="dropdown">
                    <a href="javascript:;"  class="ms-2 text-danger" title="report abuse"  wire:click='report({{$url->id}})'
                    {{-- <a href="javascript:;" wire:click='question' class="ms-2 text-muted" id="dropdownInfo" data-bs-toggle="dropdown" --}}
                      aria-expanded="false">
                      <i class="fa fa-flag"></i> Report Abuse
                    </a>
                    <span class="dropdown-menu dropdown-menu-lg p-3 dropdown-menu-end" aria-labelledby="dropdownInfo">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      cupiditate consequatur rerum eius ad ut officiis
                    </span>
                  </span>
                  <!-- Dropdown -->
                  <span class="dropdown">
                    <a class="text-muted text-decoration-none" href="#" role="button" id="shareDropdown1"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <span class="dropdown-menu dropdown-menu-end" aria-labelledby="shareDropdown1">
                      <span class="dropdown-header">Share</span>
                      <a class="dropdown-item" href="#"><i class="fab fa-facebook dropdown-item-icon"></i>Facebook</a>
                      <a class="dropdown-item" href="#"><i class="fab fa-twitter dropdown-item-icon"></i>Twitter</a>
                      <a class="dropdown-item" href="#"><i class="fab fa-linkedin dropdown-item-icon"></i>Linked In</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-copy dropdown-item-icon"></i>Copy Link</a>
                      {{-- <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom" class="dropdown-item" href="#"><i class="fe fe-flag dropdown-item-icon"></i>Post a question</a> --}}
                    </span>
                  </span>
                </div>
              </div>
              <!-- Video -->
              <div class="embed-responsive  position-relative w-100 d-block overflow-hidden p-0" style="height: 600px;">
      
      




<div style=" margin-left:350px; margin-top:200px;" wire:loading class="d-absolute align-items-center">
  <strong wire:loading>Loading...</strong>
  <div wire:loading class="spinner-border lg-auto" role="status" aria-hidden="true"></div>  
</div>




<div class="progress" >
  <div class="progress-bar {{$this->per == 100 ? 'bg-success' : ''}} progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{$this->per}}%;" aria-valuenow="{{$this->per}}" aria-valuemin="0" aria-valuemax="100">{{$this->per == 100 ? 'complete' : $this->per.'%' }}</div>
</div>
<div wire:loading.attr='hidden'>
       <x-embed url="{{$url->video}}"/>
</div>
          </div>
            </div>
            <!-- Tab pane -->
            <div class="tab-pane fade" id="course-development" role="tabpanel" aria-labelledby="course-development-tab">
              <div class="d-lg-flex align-items-center justify-content-between mb-4">
                <div>
                  <h2 class="h3 mb-0">Installing Development Software</h2>
                </div>
                <div>
                  <!-- Dropdown -->
                  <span class="dropdown">
                    <a href="#" class="ms-2 text-muted" id="dropdownInfo2" data-bs-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <i class="fe fe-help-circle"></i>
                    </a>
                    <span class="dropdown-menu dropdown-menu-lg p-3" aria-labelledby="dropdownInfo2">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      cupiditate consequatur rerum eius ad ut officiis
                    </span>
                  </span>
                  <!-- Dropdown -->
                  <span class="dropdown ">
                    <a class="text-muted text-decoration-none" href="#" role="button" id="shareDropdown2"
                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <span class="dropdown-menu dropdown-menu-end" aria-labelledby="shareDropdown2">
                      <span class="dropdown-header">Share</span>
                      <a class="dropdown-item" href="#"><i class="fab fa-facebook dropdown-item-icon"></i>Facebook</a>
                      <a class="dropdown-item" href="#"><i class="fab fa-twitter dropdown-item-icon"></i>Twitter</a>
                      <a class="dropdown-item" href="#"><i class="fab fa-linkedin dropdown-item-icon"></i>Linked In</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-copy dropdown-item-icon"></i>Copy Link</a>
                    </span>
                  </span>
                </div>
              </div>
              <!-- Video -->
              <div class="embed-responsive  position-relative w-100 d-block overflow-hidden p-0" style="height: 600px;">
            <iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100" src="https://www.youtube.com/embed/PkZNo7MFNFg"></iframe>
          </div>
            </div>
            <!-- Tab pane -->
            <div class="tab-pane fade" id="course-project" role="tabpanel" aria-labelledby="course-project-tab">
              <div class="d-lg-flex align-items-center justify-content-between mb-4">
                <div>
                  <h2 class="h3 mb-0">Hello World Project from GitHub</h2>
                </div>
                <div>
                  <!-- Dropdown -->
                  <span class="dropdown">
                    <a href="#" class="ms-2 text-muted" id="dropdownInfo3" data-bs-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <i class="fe fe-help-circle"></i>
                    </a>
                    <span class="dropdown-menu dropdown-menu-lg p-3" aria-labelledby="dropdownInfo3">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      cupiditate consequatur rerum eius ad ut officiis
                    </span>
                  </span>
                  <!-- Dropdown -->
                  <span class="dropdown ">
                    <a class="text-muted text-decoration-none" href="#" role="button" id="shareDropdown3"
                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <span class="dropdown-menu dropdown-menu-end" aria-labelledby="shareDropdown3">
                      <span class="dropdown-header">Share</span>
                      <a class="dropdown-item" href="#"><i class="fab fa-facebook dropdown-item-icon"></i>Facebook</a>
                      <a class="dropdown-item" href="#"><i class="fab fa-twitter dropdown-item-icon"></i>Twitter</a>
                      <a class="dropdown-item" href="#"><i class="fab fa-linkedin dropdown-item-icon"></i>Linked In</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-copy dropdown-item-icon"></i>Copy Link</a>
                    </span>
                  </span>
                </div>
              </div>
              <!-- Video -->
              <div class="embed-responsive  position-relative w-100 d-block overflow-hidden p-0" style="height: 600px;">
            <iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100" src="https://www.youtube.com/embed/PkZNo7MFNFg"></iframe>
          </div>
            </div>
            <!-- Tab pane -->
            <div class="tab-pane fade" id="course-website" role="tabpanel" aria-labelledby="course-website-tab">
              <div class="d-lg-flex align-items-center justify-content-between mb-4">
                <div>
                  <h2 class="h3 mb-0">Our Sample Website</h2>
                </div>
                <div>
                  <!-- Dropdown -->
                  <span class="dropdown">
                    <a href="#" class="ms-2 text-muted" id="dropdownInfo4" data-bs-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <i class="fe fe-help-circle"></i>
                    </a>
                    <span class="dropdown-menu dropdown-menu-lg p-3" aria-labelledby="dropdownInfo4">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      cupiditate consequatur rerum eius ad ut officiis
                    </span>
                  </span>
                  <!-- Dropdown -->
                  <span class="dropdown ">
                    <a class="text-muted text-decoration-none" href="#" role="button" id="shareDropdown4"
                      data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <span class="dropdown-menu dropdown-menu-end" aria-labelledby="shareDropdown4">
                      <span class="dropdown-header">Share</span>
                      <a class="dropdown-item" href="#"><i class="fab fa-facebook dropdown-item-icon"></i>Facebook</a>
                      <a class="dropdown-item" href="#"><i class="fab fa-twitter dropdown-item-icon"></i>Twitter</a>
                      <a class="dropdown-item" href="#"><i class="fab fa-linkedin dropdown-item-icon"></i>Linked In</a>
                      <a class="dropdown-item" href="#"><i class="fas fa-copy dropdown-item-icon"></i>Copy Link</a>
                    </span>
                  </span>
                </div>
              </div>
              <!-- Video -->
              <div class="embed-responsive  position-relative w-100 d-block overflow-hidden p-0" style="height: 600px;">
            <iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100" src="https://www.youtube.com/embed/PkZNo7MFNFg"></iframe>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

                          

  </div>
  <!-- Card -->
  @if($mask == 1)
    
    <div class="card course-sidebar " id="courseAccordion">
        <!-- List group -->
        <ul class="list-group list-group-flush course-list">
            <li class="list-group-item">
            <h4 class="mb-0">Table of Content</h4>  
            </li>
            <!-- List group item -->
            
            @forelse (\App\Models\Lecture::where('course_title',$course->title)->get() as $lecture)          
                                          
                    <!-- List group item -->
        <li class="list-group-item ">
          <!-- Toggle -->
          <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
            href="#course{{$lecture->id}}" role="button" aria-expanded="false" aria-controls="course{{$lecture->id}}">
            <div class="me-auto">
              <!-- Title -->
              {{$lecture->nameField}}
            </div>
            <!-- Chevron -->
            <span class="chevron-arrow  ms-4">
              <i class="fe fe-chevron-down fs-4"></i>
            </span>
          </a>
          <!-- Row -->
          <!-- Collapse -->
          <div class="collapse {{$lecture->id == $pp ? 'show' : ''}}" id="course{{$lecture->id}}" data-bs-parent="#courseAccordion">
            <div class="py-4 nav" id="course-tab{{$lecture->id}}" role="tablist" aria-orientation="vertical"
              style="display: inherit;">
              
            @foreach (App\Models\Lesson::where('lecture_id',$lecture->id)->where('user_id',$course->user->id)->where('course_title',$course->title)->get() as $lesson)  
              <a class="mb-2 d-flex justify-content-between align-items-center text-decoration-none @if($url->id == $lesson->id) form-control bg-outline-primary @endif" 
                id="course-{{$lesson->id}}-tab2" data-bs-toggle="pill" href="javascript:void(0)" wire:click='url({{$lesson->id}})' role="tab" aria-controls="course-{{$lesson->id}}"
                aria-selected="true">
                <div class="text-truncate">
                  
                  {{-- <span class="icon-shape bg-light text-primary icon-sm  rounded-circle me-2 order-1"><i --}}
                  <span class="icon-shape bg-light text-{{(\App\Models\ProgressLesson::where('lesson_id',$lesson->id)->where('user_id',auth()->user()->id)->count() == 0) ? 'primary' : 'success' }} icon-sm    rounded-circle me-2 "><i
                                      class="mdi mdi-{{$url->id == $lesson->id ? 'pause' : 'play'}} fs-4"></i></span>
                  <span>{{$lesson->title}}</span>
                  
                </div>
                <div class="text-truncate">
                  <span>{{\App\Models\Course::lessonMin($lesson->id)}}</span>
                </div>
              </a>
              @endforeach
            </div>
          </div>
        </li>
            @endforeach            
        </ul>
    </div>    
    
  @endif


@if($mask == 0)
  <div class="card-body ">
                              <div class="mb-4">
                                <h2 class="text-center mb-0">Ask A Question</h2>
                                <span class="text-center">Let question in this section. Your unstructor reply you</span>
                              </div>
                              <!-- row -->
                              <div class="row">
                                <div class="mb-3 col-9">
                                  <!-- label -->
                                  <label class="form-label" for="school">Question<span
                                      class="text-danger">*</span></label>
                                  <!-- input -->
                                  <textarea wire:model.defer='content' id="school" class="form-control"
                                    placeholder="Ex: are you sure ?">
                                    </textarea>
                                </div><br><br><br><br><br><br>
                                <div class="mt-8 col-3">
                                 <a wire:loading.attr='disabled' href="javascript:;" wire:click='comments' class="btn-lg btn-success text-center "><i class="fa fa-paper-plane"></i></a>
                               </div>
                               </div>


                                 <!-- Basic List -->
 <ul class="list-group">
 @foreach ($comments as $comment)
     
 <div class="modal fade" id="exampleModalCenter{{$comment->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">What would you say to {{$comment->user->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input wire:model.defer='response' text="text" placeholder="post your respond" class='form-control'>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button wire:click='response({{$comment->id}})' type="button" data-bs-dismiss="modal" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


  <li class="list-group-item text-break lh-sm"><img class="avatar avatar-sm" src="{{$comment->user->profile_photo_url}}"> {{$comment->user->first_name.' '.$comment->user->last_name}} @if($course->user->id == auth()->user()->id) <i class="badge bg-primary">author</i> @endif<br><br>
  <span>{{$comment->content}} .</span>
  @if($comment->user->id == auth()->user()->id)
  <a wire:loading.attr='disabled' href="javascript:;" wire:click='deleteComment({{$comment->id}})' class="text-sm text-danger"><i class="fe fe-trash"></i></a>
  <a wire:loading.attr='disabled' href="#editComment{{$comment->id}}"  class="text-sm text-primary"><i class="fe fe-edit"></i></a>
  <div class="collapse" id="editComment{{$comment->id}}">
  <textarea class="form-control" rows="4"></textarea>
  </div>
  
  @endif
  

   <a class="text-sm text-warning" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{$comment->user->id}}">   
    <i class="fa fa-reply"></i>
  </a>
  @if(\App\Models\Response::where('comment_type','App\Models\LessonResponse')->where('comment_id',$comment->id)->count() > 0)

    <a class="text-lg text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$comment->id}}" aria-expanded="false" aria-controls="collapseExample{{$comment->id}}">
    <i class="fa fa-comments"></i>
    </a>
  @endif
</p>
<div class="collapse" id="collapseExample{{$comment->id}}">
@foreach (\App\Models\Response::where('comment_type','App\Models\LessonResponse')->where('comment_id',$comment->id)->get() as $response)
  <div class="card card-body">
<img class="rounded-circle avatar-sm" src="{{$response->author->profile_photo_url}}">
                              <span>{{$response->author->name}}   
                                 @if($response->author->id == $course->user->id)<i class="fa fa-star text-dark"></i> @endif {{$response->created_at->diffForHumans()}}</span>                                    

                                 <p class="lh-sm">{{$response->content}}. </p>
                                 @if($response->author_id == auth()->user()->id)
                                 <a class="text-danger" href="javascript:;" wire:loading.attr='disabled' wire:loading.class="text-success"  wire:click='deleteResponse({{$response->id}})'><i class=" fe fe-trash"></i></a>
                                 @endif
  </div>
@endforeach
</div>
  </li>
 @endforeach 
  

</ul>
                            </div>
                            {{$comments->links()}}
</div>     
@endif



                            <!-- Card body -->
                            


</div>
