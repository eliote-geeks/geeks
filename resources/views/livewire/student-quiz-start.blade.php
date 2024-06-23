        <div class="col-lg-9 col-md-8 col-12">
          <div id="courseForm" class="bs-stepper">

            <!-- Stepper Button -->

            <!-- Stepper content -->
            <div class="bs-stepper-content">
              <div class=" " role="tablist">
                <div class="step" data-target="#test-l-1">
                  <div class="step-trigger visually-hidden" role="tab" id="courseFormtrigger1" aria-controls="test-l-1">

                  </div>
                </div>

                <div class="step" data-target="#test-l-2">
                  <button type="button" class="step-trigger visually-hidden" role="tab" id="courseFormtrigger2"
                    aria-controls="test-l-2">

                  </button>
                </div>


              </div>
              <form onSubmit="return false">
                <!-- Content one -->




                <div id="test-l-1" >

                  <div class="card mb-4">
                    <!-- Card body -->
                    <div class="card-body">
{{-- @php $i = 0; @endphp --}}
                      <!-- quiz -->
                      <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">

                        <div class="d-flex align-items-center">
                          <!-- quiz img -->
                          <a href="{{route('courses.show',$quiz->course_id)}}"> <img src="{{asset('storage/'.\App\Models\Course::find($quiz->course_id)->photo)}}" alt=""
                              class="rounded img-4by3-lg"></a>
                          <!-- quiz content -->
                          <div class="ms-3">
                            <h3 class="mb-0"><a href="{{route('courses.show',$quiz->course_id)}}" class="text-inherit">{{$quiz->title}} </a></h3>

                          </div>
                        </div>
                        <div>
                          <span class="text-danger"><i class="fe fe-clock me-1 align-middle"></i>00:05:55</span>
                        </div>
                      </div>
                      
                      
                          
                      
                      {{-- <div class="mt-3">
                        <!-- text -->
                        <div class="d-flex justify-content-between">
                          <span>Exam Progress:
                          </span>
                          <span> Question {{$i}} out of {{\App\Models\QuestionQuiz::where('quizze_id',$quiz->id)->count()}}</span>
                        </div>
                        <!-- progress bar -->
                        <div class="mt-2">
                          <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 15%"
                              aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>

                      </div>
         --}}
                      <!-- text -->
                      

@if(session()->has('yes'))
<p class="text-lg form-control bg-success text-white text-center">
 {{session()->get('yes')}}</p>
@elseif(session()->has('no'))
<p class="text-danger text-lg bg-danger text-white form-control text-center">{{session()->get('no')}}</p>
@else
@endif                      


@if(session()->has('message'))
  <p class="text-lg form-control bg-info text-center text-dark">{{session()->get('message')}}</p>
@endif
@if(\App\Models\StudentQcm::where([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,            
        ])->count() < \App\Models\QuestionQuiz::where('quizze_id',$this->quiz->id)->count())
        @foreach ($questions as $question)
                      <div class="mt-5">
                        {{-- <span>Question {{$i}}</span> --}}
                        <h3 class="mb-3 mt-1">{{$question->question}}</h3>
                        <!-- list group -->
                        <div class="list-group">
                        @foreach (\App\Models\ResponseQuiz::inRandomOrder()->where('question_quizze_id',$question->id)->get() as $res)                 
                <div class="list-group-item list-group-item-action " aria-current="true">

                  <div class="form-check">
              <button wire:loading.attr='disabled' @if($yes ==$res->response ) class="btn btn-outline-success form-control" @elseif($no == $res->response) class="btn btn-outline-danger form-control" @else class="btn btn-outline-dark form-control" @endif wire:click='response({{$res->id}})'>
                      {{$res->response}}
              </button>

                  </div>
                </div>
                  @error('responses') <span class="text-danger">{{$message}}</span>@enderror                  
                @endforeach
                        </div>


                      </div>
                      
                            @endforeach      
                            @endif
                    </div>
                  </div>
                  <div class="d-flex justify-content-between text-center">
            {{$questions->links()}}
                  </div>
                </div>

              </form>
            </div>

@if(\App\Models\StudentQcm::where([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,            
        ])->count() == \App\Models\QuestionQuiz::where('quizze_id',$this->quiz->id)->count())
      <div class="row mt-0 mt-md-12">
        
        <div class="col-lg-12 col-md-12 col-12">
          <!-- card -->
          <div class="card">
            <!-- card body -->
            <div class="card-body p-10 text-center">
              <!-- text -->
              <div class="mb-4 ">
              @if((\App\Models\StudentQcm::where([
                'user_id' => auth()->user()->id,
                'quiz_id' => $this->quiz->id,
                'points' => 1
            ])->count() * 100)/\App\Models\StudentQcm::where([
                'user_id' => auth()->user()->id,
                'quiz_id' => $this->quiz->id,
            ])->count() >= 50)
                <h2>🎉 Congratulations. You passed!</h2>
                <p class="mb-0 px-lg-14">You are successfully completed the quiz. Now you click on
                  finish and back to your quiz page.</p>
              </div>
              @else
<h2>🎉 Oh no!!. You passed!</h2>
                <p class="mb-0 px-lg-14">You are successfully completed the quiz. Now you click on
                  finish and back to your quiz page.</p>
              </div>
              @endif
              <!-- chart -->
              <div class="d-flex justify-content-center">
                <div class="resultChart"></div>

              </div>
              <!-- text -->
              <div class="mt-3">
                <span>Your Score: <span class="text-dark">
                
                
                        @if(\App\Models\StudentQcm::where([
            'user_id' => auth()->user()->id,
            'quiz_id' => $this->quiz->id,            
        ])->count() == \App\Models\QuestionQuiz::where('quizze_id',$this->quiz->id)->count())
        
          {{round((\App\Models\StudentQcm::where([
                'user_id' => auth()->user()->id,
                'quiz_id' => $this->quiz->id,
                'points' => 1
            ])->count() * 100)/\App\Models\StudentQcm::where([
                'user_id' => auth()->user()->id,
                'quiz_id' => $this->quiz->id,
            ])->count(),2)}}%
        @endif
                
                
                

                            (@if(\App\Models\StudentQcm::where([
            'user_id' => auth()->user()->id,
            'quiz_id' => $this->quiz->id,            
        ])->count() == \App\Models\QuestionQuiz::where('quizze_id',$this->quiz->id)->count())
        
          {{round((\App\Models\StudentQcm::where([
                'user_id' => auth()->user()->id,
                'quiz_id' => $this->quiz->id,
                'points' => 1
            ])->count() * 100)/\App\Models\StudentQcm::where([
                'user_id' => auth()->user()->id,
                'quiz_id' => $this->quiz->id,
            ])->count(),2)}}
        @endif
                  
                  
                   points)</span></span><br>
                   {{-- @if(\App\Models\StudentQuiz::where('quizze_id',$this->quiz->id)->orderByDesc('result')->count() > 0) --}}
                   
                   @foreach(\App\Models\StudentQuiz::where('quizze_id',$this->quiz->id)->orderByDesc('result')->take(10)->get() as $b)
                      <span class="mt-2 d-block"> Passing Score: <span class="text-dark">{{$b->result}}% : <b>{{\App\Models\User::find($b->user_id)->name}}</b></span></span>
                    @endforeach
                    {{-- @endif --}}
              </div>
              <!-- btn -->
              <div class="mt-5">
                <a href="javascript:;" wire:loading.attr='disabled' wire:click='save' class="btn btn-primary">Finish</a>
                <a href="javascript:;" class="btn btn-outline-white ms-2">Share <i class="fe fe-external-link"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
@endif
          </div>
        </div>

