    <div class="pb-lg-8 pt-lg-3 py-6">
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <h2 class="mb-2" style="font-size:17px;">Trending</h2>
                </div>

            </div>
            <div class="position-relative">
                <ul class="controls" id="sliderThirdControls">
                    <li class="prev">
                        <i class="fe fe-chevron-left"></i>
                    </li>
                    <li class="next">
                        <i class="fe fe-chevron-right"></i>
                    </li>
                </ul>
                <div class="sliderThird">
                @forelse($courses_tren as $course)

                    <div class="item">
                        <!-- Card -->
                        <div class="card  mb-4 card-hover">
                            <a href="{{route('courses.show',$course)}}" class="card-img-top"><img src="{{asset('storage/'.$course->photo)}}" alt="" class="card-img-top rounded-top-md"></a>
                            <!-- Card Body -->
                            <div class="card-body">
                        <h4 class="mb-1 text-truncate-line-1 "><a href="{{route('courses.show',$course)}}" class="text-inherit">
                        {{\Str::title($course->title)}}</a></h4>
                                <!-- List -->
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
                <span class="align-top" style="margin-top:-3px; color:#000;">
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
                <span class="align-top" style="margin-top:-3px; color:#000;">
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
                <span class="align-top" style="margin-top:-3px; color:#000;">
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
                                              {{-- <span class="avatar avatar-xs "> --}}
                                {!!\App\Models\Course::showClass($course->id)!!}
                            {{-- </span> --}}
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="{{$course->user->profile_photo_url}}" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>{{$course->user->first_name}} {{$course->user->last_name}}</span>
                                    </div>
                                    
                                    <div class="col-auto">
                                    @auth
                                @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() > 0 )                                
                                        <a href="{{route('courses.enroll',$course)}}"  class="removeBookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fas fa-bookmark "></i>
                                        </a>
                                @endif     
                                       @if(App\Models\Enroll::where('course_id',$course->id)->where('user_id',auth()->user()->id)->get()->count() == 0)
                                       <a href="{{route('courses.enroll',$course)}}"  class="text-dark bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endif
                                    @endauth
                                 @guest
                                    <a  href="{{route('login')}}" class="text-muted bookmark"><div wire:loading class="spinner-border"></div>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                   
                    

                    @empty
                    <span>No trending Course!!</span>

                    @endforelse
                </div>
            </div>
        </div>
    </div>
    

