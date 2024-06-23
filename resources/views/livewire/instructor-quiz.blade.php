
    {{-- The Master doesn't talk, he acts. --}}
        <div class="col-lg-9 col-md-8 col-12">
          <!-- Card -->
          <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header d-flex align-items-center justify-content-between">
              <div class="">
                <h3 class="mb-0">Quiz</h3>
              </div>
              <div>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-2">
    Add new Quiz
</button>


                <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Quiz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                
                <!-- Input -->
<div class="mb-3">
  <label class="form-label" for="textInput">Course</label>
<select class="form-control" name="course" wire:model.defer='course_id'>
    <option value="">Select Course</option>
    @foreach ($courses as $course)
        <option value="{{$course->id}}">{{$course->title}}</option>
    @endforeach    
</select>
@error('course_id') <span class="text-danger">{{ $message }}</span> @enderror                        
</div>

<div class="mb-3">
  <label class="form-label" for="textInput">Title</label>
  <input type="text" id="textInput"  wire:model.defer='title' class="form-control" placeholder="Quiz title">
  @error('title') <span class="text-danger">{{ $message }}</span> @enderror                        
</div>

<div class="mb-3">
  <label class="form-label" for="textInput">Duration</label>
  <input type="time" id="textInput"  wire:model.defer='duration' class="form-control" placeholder="Quiz title">
  @error('duration') <span class="text-danger">{{ $message }}</span> @enderror                        
</div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click='saveQuiz'>Save</button>
            </div>
        </div>
    </div>
</div>
              </div>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <div class="table-responsive">
              @if($edit == 1)
<div class="mb-3">
  <label class="form-label" for="textInput">Course</label>
<select class="form-control" name="course" wire:model.defer='course_id'>
    <option disabled>Select Course</option>
    @foreach ($courses as $course)
        <option value="{{$course->id}}">{{$course->title}}</option>
    @endforeach    
</select>
@error('course_id') <span class="text-danger">{{ $message }}</span> @enderror                        
</div>

<div class="mb-3">
  <label class="form-label" for="textInput">Title</label>
  <input type="text" id="textInput"  wire:model.defer='title' class="form-control" placeholder="Quiz title">
  @error('title') <span class="text-danger">{{ $message }}</span> @enderror                        
</div>

<div class="mb-3">
  <label class="form-label" for="textInput">Duration</label>
  <input type="time" id="textInput"  wire:model.defer='duration' class="form-control" placeholder="Quiz title">
  @error('duration') <span class="text-danger">{{ $message }}</span> @enderror                        
</div>
<button wire:loading.attr='disabled' type="button" class="btn btn-primary"  wire:click='saveQuiz'>Save</button>
<button wire:loading.attr='disabled' type="button" class="btn btn-dark"  wire:click='resetField'>refresh</button>



              @else
                <table class="table" id="dataTableBasic">
                  <tbody>

@foreach ($quizzes as $quiz)
                    <tr class="text-nowrap">
                      <td class="px-0 pt-0">
                        <div class="d-flex align-items-center">
                        
                          <!-- quiz img -->
                          <a href="{{route('quizDetail',$quiz->id)}}"> <img src="{{asset('storage/'.\App\Models\Course::find($quiz->course_id)->photo)}}" alt="{{\App\Models\Course::find($quiz->course_id)->title}}"
                              class="rounded img-4by3-lg" /></a>
                          <!-- quiz content -->
                          <div class="ms-3">
                            <h4 class="mb-2"><a href="{{route('quizDetail',$quiz->id)}}" class="text-inherit">{{$quiz->title}}</a></h4>
                            <div>
                              <span><span class="me-2 align-middle"><i class="fe fe-list"></i></span>{{\App\Models\QuestionQuiz::where('quizze_id',$quiz->id)->count()}}
                                Questions</span>
                              <span class="ms-2"><span class="me-2 align-middle"><i class="fe fe-clock"></i></span>{{\App\Models\Quiz::quizMin($quiz->id)}}
                                seconds</span>
                              <a href="{{route('resultQuiz',$quiz->id)}}" class="ms-2 text-body"><span
                                  class="me-2 align-middle"><i class="fe fe-file-text"></i></span>Result</a>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="text-end pe-0 align-middle pt-0">
                          <!-- icon -->
                        <div>
                <button wire:click='editQuiz({{$quiz->id}})' class="text-inherit"><i class="fe fe-settings"></i></button>
    
                          <button class="ms-2 link-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><i class="fe fe-trash-2"></i></button>

                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Confirmation delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete This QCM ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" wire:click='deleteQuiz({{$quiz->id}})' class="btn btn-danger">Save changes</button>
      </div>
    </div>
  </div>
</div>
                        </div>
                      </td>
                    </tr>
@endforeach
                  </tbody>
                </table>
                {{$quizzes->links()}}
                @endif
              </div>
            </div>
          </div>
        </div>



