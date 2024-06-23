@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')

				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card border-0">
					
						<!-- Card body -->
						<div class="card-body p-10">
						<div class="text-center">
							  <!-- img -->
                            <img src="https://codescandy.com/geeks-bootstrap-5/assets/images/svg/survey-img.svg" alt="" class="img-fluid">
  <!-- text -->
                            <div class="px-lg-18">
                                <h1>Welcome to Quiz</h1>
                                <p class="mb-0">Engage live or asynchronously with quiz and poll questions that participants complete at their own space.</p>
                            <a href="{{route('quizDetailStudent',\App\Models\Quiz::inRandomOrder()->first())}}" class="btn btn-primary mt-4">Start Random Quiz</a>
                            </div>

                                            <table class="table" id="dataTableBasic">
                  <tbody>

@foreach ($quizzes as $quiz)
@if(\App\Models\Order::where('user_id',auth()->user()->id)->where('status','SUCCESS..')->where('course_id',$quiz->course_id)->count() > 0 )
                    <tr class="text-nowrap">
                      <td class="px-0 pt-0">
                        <div class="d-flex align-items-center">
                        
                          <!-- quiz img -->
                          <a href="{{route('quizDetailStudent',$quiz->id)}}"> <img src="{{asset('storage/'.\App\Models\Course::find($quiz->course_id)->photo)}}" alt="{{\App\Models\Course::find($quiz->course_id)->title}}"
                              class="rounded img-4by3-lg" /></a>
                          <!-- quiz content -->
                          <div class="ms-3">
                            <h4 class="mb-2"><a href="{{route('quizDetailStudent',$quiz->id)}}" class="text-inherit">{{$quiz->title}}</a></h4>
                            <div>
                              <span><span class="me-2 align-middle"><i class="fe fe-list"></i></span>{{\App\Models\QuestionQuiz::where('quizze_id',$quiz->id)->count()}}
                                Questions</span>
                              <span class="ms-2"><span class="me-2 align-middle"><i class="fe fe-clock"></i></span>{{\App\Models\Quiz::quizMin($quiz->id)}}
                                seconds</span>
                              <a href="instructor-quiz-result.html" class="ms-2 text-body"><span
                                  class="me-2 align-middle"><i class="fe fe-file-text"></i></span>Result</a>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="text-end pe-0 align-middle pt-0">
                          <!-- icon -->
                        <div>
        
                        </div>
                      </td>
                    </tr>
    @endif
@endforeach
                  </tbody>
                </table>
                {{$quizzes->links()}}

                        </div>
						</div>
					</div>
				</div>

@endsection