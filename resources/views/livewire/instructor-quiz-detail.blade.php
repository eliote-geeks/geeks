
    {{-- Care about people's approval and you will be their prisoner. --}}
    
        <div class="col-lg-12 col-md-12 col-12">
          <!-- Card -->
          <div class="card mb-4">

            <!-- Card body -->
            <div class="card-body">

              <!-- quiz -->
              <div class="d-lg-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                  <!-- quiz img -->
                  <a href="{{route('courses.show',$quiz->course_id)}}"> <img src="{{asset('storage/'.\App\Models\Course::find($quiz->course_id)->photo)}}" alt="{{$quiz->title}}"
                      class="rounded img-4by3-lg" /></a>
                  <!-- quiz content -->
                  <div class="ms-3">
                    <h3 class="mb-2"><a href="{{route('courses.show',$quiz->course_id)}}" class="text-inherit">{{$quiz->title}} </a></h3>
                    <div>
                      <span><span class="me-2 align-middle"><i class="fe fe-list"></i></span>{{\App\Models\QuestionQuiz::where('quizze_id',$quiz->id)->count()}}
                        Questions</span>
                      <span class="ms-2"><span class="me-2 align-middle"><i class="fe fe-clock"></i></span>{{\App\Models\Quiz::quizMin($quiz->id)}}</span>
                      <span class="ms-2"><span class="me-2 align-middle"><i
                            class="fe fe-file-text"></i></span>Result</span>
                    </div>
                  </div>
                </div>
                <div class="d-none d-lg-block">
                  <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQuizQuestionModal">Add
                    new Questions</a>
                </div>
              </div>

            </div>
          </div>

          @foreach ($questions as $question)             
          
           <!-- card -->
          <div class="card mb-4">

             <!-- card body -->
            <div class="card-body">
              <h3 class="mb-3">{{$question->question}}.</h3>
              
               <!-- list group -->
              <div class="list-group">
              @foreach (\App\Models\ResponseQuiz::inRandomOrder()->where('question_quizze_id',$question->id)->get() as $res)                 
                <div class="list-group-item list-group-item-action " aria-current="true">

                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="{{$res->response}}">
                    <label class="form-check-label" for="{{$res->response}}">
                      {{$res->response}} 
                    </label>
                    @if($question->response == $res->response)
                    <span class="badge bg-success">True response</span>
                    @endif
                  </div>
                </div>
                @endforeach
                 
              </div>
               <!-- buttons -->
              <div class="mt-3">                
                <button  class="btn btn-outline-danger ms-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{$quiz->id}}">Delete</button>
                <div class="modal fade" id="exampleModalCenter{{$quiz->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Confirmation delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to remove "<b>{{$question->question}}</b>" ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" wire:click='deleteQuiz({{$question->id}})'>Delete</button>
      </div>
    </div>
  </div>
</div>
              </div>

            </div>
          </div>

        @endforeach
{{$questions->links()}}
      <div class="modal fade " id="addQuizQuestionModal" tabindex="-1" aria-labelledby="addQuizQuestionModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
<!-- modal body -->
          <div class="modal-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h4 class="modal-title" id="addQuizQuestionModalLabel">Add Quiz Question</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
              <!-- form -->
              <form>
                <div class="mb-5">
                  <h4 class="mb-3">General</h4>
                  <div class="mb-3">
                    <label class="form-label">Write your question</label>
                    <input type="text" wire:model.defer='question' class="form-control" placeholder="Quiz title">
                    @error('question') <span class="text-danger">{{ $message }}</span> @enderror                        
                  </div>

                </div>
                <div class="">
                  <h4 class="mb-3">Answer</h4>
                  <div class="mb-2">
                    <div class="mb-2 d-flex justify-content-between align-items-center">
                      <div>
                        <h5 class="mb-0 fw-normal">Choice 1</h5>
                      </div>
                      <div class="">
                        <div class="d-flex align-items-center lh-1"><span>Correct answer</span>
                          <div class="form-check form-switch ms-2">

                            <input class="form-check-input me-0"  name="response" type="checkbox" role="switch"  wire:model.defer='response1' 
                              id="flexSwitchCheckDefault" checked>
                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                          </div>
                        </div>

                      </div>

                    </div>
                    <input type="text" wire:model.defer='response1' placeholder="Write the answer" class="form-control">
                    @error('response1') <span class="text-danger">{{ $message }}</span> @enderror                        
                  </div>
                  <div class="mb-2">
                    <div class="mb-2 d-flex justify-content-between align-items-center">
                      <div>
                        <h5 class="mb-0 fw-normal">Choice 2</h5>
                      </div>


                    </div>
                    <input type="text" placeholder="Write the answer" class="form-control" wire:model.defer='response2'>
                    @error('response2') <span class="text-danger">{{ $message }}</span> @enderror                        
                  </div>
                  <div class="mb-2">
                    <div class="mb-2 d-flex justify-content-between align-items-center">
                      <div>
                        <h5 class="mb-0 fw-normal">Choice 3</h5>
                      </div>


                    </div>
                    <input type="text" placeholder="Write the answer" class="form-control" wire:model.defer='response3'>
                    @error('response3') <span class="text-danger">{{ $message }}</span> @enderror                        
                  </div>
                  <div class="mb-2">
                    <div class="mb-2 d-flex justify-content-between align-items-center">
                      <div>
                        <h5 class="mb-0 fw-normal">Choice 4</h5>
                      </div>


                    </div>
                    <input type="text" placeholder="Write the answer" class="form-control " wire:model.defer='response4'>
                    @error('response4') <span class="text-danger">{{ $message }}</span> @enderror                        
                  </div>

                  {{-- <div class="mb-4">
                    <label class="form-label">Point for this answer</label>
                    <textarea class="form-control " placeholder="Give point to the answer" rows="3"></textarea>
                  </div> --}}

                  <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ms-2" data-bs-dismiss="modal" wire:click='saveQuiz'>Add Quiz</button>
                  </div>

                </div>

              </form>

            </div>
          </div>

        </div>
      </div>
    </div>





        </div>




