<div>
  <!-- Page header -->
  <div class="bg-dark py-4 py-lg-6">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
          <div>
            <h1 class="mb-0 text-white display-4">Filter Page</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content -->
  <div class="py-6">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
          <div class="row d-lg-flex justify-content-between align-items-center">
            <div class="col-md-6 col-lg-8 col-xl-9 ">
              <h4 class="mb-3 mb-lg-0">Displaying {{$courses->count()}} out of {{\App\Models\Course::where('status',1)->get()->count()}} courses</h4>
            </div>
            <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3 ">
              <div class="me-2">
                <!-- Nav -->
                <div class="nav btn-group flex-nowrap" role="tablist">
                  <button class="btn btn-outline-white active" data-bs-toggle="tab" data-bs-target="#tabPaneGrid" role="tab"
                    aria-controls="tabPaneGrid" aria-selected="true">
                    <span class="fe fe-grid"></span>
                  </button>
                  <button class="btn btn-outline-white" data-bs-toggle="tab" data-bs-target="#tabPaneList" role="tab"
                    aria-controls="tabPaneList" aria-selected="false">
                    <span class="fe fe-list"></span>
                  </button>
                </div>
              </div>
              <!-- List  -->
              <select class="form-control" data-width="100%">
                <option value="">Sort by</option>
                <option value="Newest">Newest</option>
                <option value="Free">Free</option>
                <option value="Most Popular">Most Popular</option>
                <option value="Highest Rated">Highest Rated</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-4 mb-lg-0">
          <!-- Card -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h4 class="mb-0">Filter</h4>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <span class="dropdown-header px-0 mb-2"> Category</span>
              
               <!-- Checkbox -->
               @foreach ($categories as $category)
              <div class="form-check mb-1">
                <input type="checkbox" wire:click='category({{$category->id}})' class="form-check-input" id="{{$category->name}}Check">
                <label class="form-check-label" for="{{$category->name}}Check">{{$category->name}}</label>
              </div>                   
               @endforeach

            </div>
            <!-- Card body -->
            <div class="card-body border-top">
              <span class="dropdown-header px-0 mb-2"> Ratings</span>
              <!-- Custom control -->
              <div class="custom-control custom-radio mb-1">
                <input wire:click='rating({{4.5}})' type="radio" class="form-check-input" id="starRadio1" name="customRadio">
                <label class="form-check-label" for="starRadio1">
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star text-warning "></i>
                  <span class="fs-6">4.5 & UP</span>
                </label>
              </div>
              <!-- Custom control -->
              <div class="custom-control custom-radio mb-1">
                <input type="radio" wire:click='rating({{4}})' class="form-check-input" id="starRadio2" name="customRadio" checked>
                <label class="form-check-label" for="starRadio2"> <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star text-warning "></i>
                  <span class="fs-6">4.0 & UP</span></label>
              </div>
              <!-- Custom control -->
              <div class="custom-control custom-radio mb-1">
                <input type="radio" class="form-check-input" wire:click='rating({{3.5}})' id="starRadio3" name="customRadio">
                <label class="form-check-label" for="starRadio3"> <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star text-warning "></i>
                  <span class="fs-6">3.5 & UP</span></label>
              </div>
              <!-- Custom control -->
              <div class="custom-control custom-radio mb-1">
                <input type="radio" wire:click='rating({{3}})' class="form-check-input" id="starRadio4" name="customRadio">
                <label class="form-check-label" for="starRadio4"> <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star me-n1 text-warning"></i>
                  <i class="mdi mdi-star text-warning "></i>
                  <span class="fs-6">3.0 & UP</span></label>
              </div>
            </div>
            <!-- Card body -->
            <div class="card-body border-top">
              <span class="dropdown-header px-0 mb-2"> Skill Level</span>
               <!-- Checkbox -->
              <div class="form-check mb-1">
                <input type="checkbox"   class="form-check-input" id="allTwoCheck" wire:click='level({{0}})'>
                <label class="form-check-label" for="allTwoCheck">All Level</label>
              </div>
               <!-- Checkbox -->
              <div class="form-check mb-1">
                <input type="checkbox" class="form-check-input" wire:model='Beginners' wire:click='level({{1}})' id="beginnerTwoCheck" checked>
                <label class="form-check-label" for="beginnerTwoCheck">Beginner</label>
              </div>
               <!-- Checkbox -->
              <div class="form-check mb-1">
                <input type="checkbox" wire:model='Intermediate' class="form-check-input" id="intermediateCheck" wire:click='level({{2}})'>
                <label class="form-check-label" for="intermediateCheck">Intermediate</label>
              </div>
               <!-- Checkbox -->
              <div class="form-check mb-1">
                <input type="checkbox" wire:model='Advance' class="form-check-input" id="AdvancedTwoCheck" wire:click='level({{3}})'>
                <label class="form-check-label" for="AdvancedTwoCheck">Advance</label>
              </div>
              
               <!-- Checkbox -->
              <div class="form-check mb-1">
                <input type="checkbox" wire:model='Master' class="form-check-input" id="MasterTwoCheck" wire:click='level({{4}})'>
                <label class="form-check-label" for="MasterTwoCheck">Master</label>
              </div>
            </div>
          </div>
        </div>
        <!-- Tab content -->
        <div class="col-xl-9 col-lg-9 col-md-8 col-12">
          <div class="tab-content">
            <!-- Tab pane -->
            <div class="tab-pane fade show active pb-4 " id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
              <div class="row">
@forelse ($courses as $course)
@if((\App\Models\Course::rating($course->id)[0]) >= $rating)
                <div class="col-lg-4 col-md-6 col-12">
                  <!-- Card -->
                  <div class="card  mb-4 card-hover">
                    <a href="{{route('courses.show',\App\Models\Course::find($course->id))}}" class="card-img-top"><img src="{{asset('storage/'.$course->photo)}}" alt=""
                        class="card-img-top rounded-top-md"></a>
                    <!-- Card body -->
                    <div class="card-body">
                      <h4 class="mb-2 text-truncate-line-2 "><a href="{{route('courses.show',\App\Models\Course::find($course->id))}}" class="text-inherit">
                          {{$course->title}}</a>
                      </h4>
                       <!-- List inline -->
                      <ul class="mb-3 list-inline">
   <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{\App\Models\Course::hourCourse($course->title)}}</li>
                      <li class="list-inline-item">
                                            @if($course->level == 'Beginners')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$course->level}}
                </span>
                            </span>
                            
                    @elseif($course->level == 'Intermediate')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;color:#000;">
                  {{$course->level}}
                </span>
                            </span>
                    @elseif($course->level == 'Advance')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;color:#000;">
                  {{$course->level}}
                </span>
                            </span>
                            
                        @elseif($course->level == 'Master')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;color:#000;">
                  {{$course->level}}
                </span>
                            </span>

                @endif
                      
                                    </li>
                      </ul>
                           <div class="lh-1">
                  
<span>
                @for ($k = 1 ; $k <= round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-warning"></i>
                @endfor
                @for ($k = 1 ; $k <= 5 - round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-light"></i>
                @endfor
                  </span>
            <span class="text-warning">{{\App\Models\Course::rating($course->id)[0]}}</span>
                                    <span class="fs-6 text-muted">({{\App\Models\Course::rating($course->id)[1]}})</span>
                                </div>
                            </div>
                    <!-- Card footer -->
                                                <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="{{App\Models\Course::find($course->id)->user->profile_photo_url}}" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                    
                                        <span>{{App\Models\Course::find($course->id)->user->name}}</span>
                                    </div>
                                    <div class="col-auto">
                                @auth
                                @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() > 0 )                                
                                        <a href="{{route('courses.enroll',App\Models\Course::find($course->id))}}" class="removeBookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fas fa-bookmark "></i>
                                        </a>
                                @endif     
                                       @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() == 0)
                                       <a href="{{route('courses.enroll',App\Models\Course::find($course->id))}}"  class="text-dark bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endif
                                    @endauth
                                    @guest
                                    <a href="{{route('login')}}" class="text-muted bookmark"><div wire:loading class="pinner-grow text-dark "></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
@endif
@empty
<span>No courses</span>
@endforelse

                

              </div>
            </div>
            <!-- Tab pane -->
            <div class="tab-pane fade pb-4" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
              
              
              <!-- Card -->
              @foreach ($courses as $course)
              @if((\App\Models\Course::rating($course->id)[0]) >= $rating)
              <div class="card mb-4 card-hover">
                <div class="row g-0">
                  <a class="col-12 col-md-12 col-xl-3 col-lg-3 bg-cover img-left-rounded"
                    style="background-image: url({{asset('storage/'.$course->photo)}});" href="{{route('courses.show',\App\Models\Course::find($course->id))}}">
                    <img src="{{asset('storage/'.$course->photo)}}" alt="..." class="img-fluid d-lg-none invisible">
                  </a>
                  <div class="col-lg-9 col-md-12 col-12">
                    <!-- Card body -->
                    <div class="card-body">
                      <h3 class="mb-2 text-truncate-line-2 "><a href="{{route('courses.show',\App\Models\Course::find($course->id))}}" class="text-inherit">{{$course->title}}</a></h3>
                           <!-- List inline -->

                    <ul class="mb-5 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{\App\Models\Course::hourCourse($course->title)}}</li>
                                    <li class="list-inline-item">
                          @if($course->level == 'Beginners')                            
                        <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;color:#000;">
                  {{$course->level}}
                </span>
                            </span>
                            
                    @elseif($course->level == 'Intermediate')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;color:#000;">
                  {{$course->level}}
                </span>
                            </span>
                    @elseif($course->level == 'Advance')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;color:#000;">
                  {{$course->level}}
                </span>
                            </span>
                            
                        @elseif($course->level == 'Master')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px;color:#000;">
                  {{$course->level}}
                </span>
                            </span>

                @endif
                                    </li>
                                </ul>
                                <div class="">
                  
<span>
                @for ($k = 1 ; $k <= round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-warning"></i>
                @endfor
                @for ($k = 1 ; $k <= 5 - round(\App\Models\Course::rating($course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-light"></i>
                @endfor
                  </span>
                    <span class="text-warning">{{\App\Models\Course::rating($course->id)[0]}}</span>
                                    <span class="fs-6 text-muted">({{\App\Models\Course::rating($course->id)[1]}})</span>
                                </div>
                       <!-- Row -->
                      <div class="row align-items-center g-0">
                        <div class="col-auto">
                          <img src="{{\App\Models\Course::find($course->id)->user->profile_photo_url}}" class="rounded-circle avatar-xs" alt="">
                        </div>
                        <div class="col ms-2">
                          <span>{{\App\Models\Course::find($course->id)->user->first_name.' '.\App\Models\Course::find($course->id)->user->last_name}}</span>
                        </div>
                        <div class="col-auto">
                                                         @auth
                                @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() > 0 )                                
                                        <a href="{{route('courses.enroll',App\Models\Course::find($course->id))}}" class="removeBookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fas fa-bookmark "></i>
                                        </a>
                                @endif     
                                       @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() == 0)
                                       <a href="{{route('courses.enroll',App\Models\Course::find($course->id))}}"  class="text-dark bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endif
                                    @endauth
                                    @guest
                                    <a href="{{route('login')}}" class="text-muted bookmark"><div wire:loading class="pinner-grow text-dark "></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endguest
                        </div>
                          </div>
                        <div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>                  
              @endif
              @endforeach
              

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
