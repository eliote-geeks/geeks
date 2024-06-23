              <div class="row">
@foreach ($enrolls as $enroll)
@if($enroll->course->status == 1)
                               
                <div class="col-lg-3 col-md-6 col-12">
                  <!-- Card -->
                  <div class="card  mb-4 card-hover">
                    <a wire:loading.attr='disabled' href="{{route('courses.show',$enroll->course)}}" class="card-img-top"><img src="{{asset('storage/'.$enroll->course->photo)}}" alt=""
                        class="card-img-top rounded-top-md"></a>
                    <!-- Card body -->
                    <div class="card-body">
                      <h3 class="h4 mb-2 text-truncate-line-2 "><a wire:loading.attr='disabled' href="{{route('courses.show',$enroll->course)}}" class="text-inherit">{{$enroll->course->title}}</a>
                      </h3>
                      <!-- List inline -->
                     <ul class="mb-1 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>{{\App\Models\Course::hourCourse($enroll->course->title)}}</li>
                                    <li class="list-inline-item">
                                            @if($enroll->course->level == 'Beginners')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$enroll->course->level}}
                </span>
                            </span>
                            
                    @elseif($enroll->course->level == 'Intermediate')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$enroll->course->level}}
                </span>
                            </span>
                    @elseif($enroll->course->level == 'Advance')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$enroll->course->level}}
                </span>
                            </span>
                            
                        @elseif($enroll->course->level == 'Master')                            
                            <span class="text-white ms-4 d-none d-md-flex">
                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="3" y="8" width="2" height="6" rx="1" fill="#000"></rect>
                  <rect x="7" y="5" width="2" height="9" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>
                  <rect x="11" y="2" width="2" height="12" rx="1" fill="#000"></rect>                  
                </svg>
                <span class="align-top" style="margin-top:-3px; color:#000;">
                  {{$enroll->course->level}}
                </span>
                            </span>

                @endif
                         
                                    </li>
                                </ul>
                           <div class="lh-1">
                  
<span>
                @for ($k = 1 ; $k <= round(\App\Models\Course::rating($enroll->course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-warning"></i>
                @endfor
                @for ($k = 1 ; $k <= 5 - round(\App\Models\Course::rating($enroll->course->id)[0],0) ; $k++)
                <i class="mdi mdi-star me-n1 text-light"></i>
                @endfor
                  </span>
            <span class="text-warning">{{\App\Models\Course::rating($enroll->course->id)[0]}}</span>
                                    <span class="fs-6 text-muted">({{\App\Models\Course::rating($enroll->course->id)[1]}})</span>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="{{$enroll->course->user->profile_photo_url}}" class="rounded-circle avatar-xs" alt="">
                                    </div>
                                    <div class="col ms-2">
                                        <span>{{$enroll->course->user->first_name}} {{$enroll->course->user->last_name}}</span>
                                    </div>
                                    
                                    <div class="col-auto">
                                    
                                @auth
                                @if(App\Models\Enroll::where('course_id',$enroll->course->id)->where('user_id',auth()->user()->id)->get()->count() > 0 )                                
                                        <a href="javascript:void(0)" wire:click.prevent='unrolled({{App\Models\Enroll::where('course_id',$enroll->course->id)->where('user_id',auth()->user()->id)->get()}})' class="removeBookmark" wire:loading.attr='disabled'>
                                            <i class="fas fa-bookmark "></i>
                                        </a>
                                @endif     
                                       @if(App\Models\Enroll::where('course_id',$enroll->course->id)->where('user_id',auth()->user()->id)->get()->count() == 0)
                                       <a href="javascript:void(0)" wire:click.prevent='enrolled({{$enroll->course->id}})' class="text-dark bookmark" wire:loading.attr='disabled'>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endif
                                    @endauth
                                 @guest
                                    <a href="{{route('login')}}" class="text-muted bookmark" wire:loading.attr='disabled'>
                                            <i class="fe fe-bookmark  "></i>
                                        </a>
                                    @endguest
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                @endif
@endforeach              

              </div>
