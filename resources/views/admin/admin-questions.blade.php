@extends('layouts.layouts.app')
<base href="/public">
@section('content')


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
Add Question
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Post a Question</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('admin.freqQuestionsStore')}}">
      @csrf
        <div class="mt-3">
        <label>Question Title</label>
        <input type="text" name="title" class="form-control" placeholder="Question Title">
        </div>
        
        <div class="mt-3">
        <label>Question Response</label>
        <textarea name="response" class="form-control" rows="4"></textarea>
        </div>
        
        
     <div class="mt-3">
        <button class="btn btn-primary" type="submit">Submit</button>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>




<div class="py-lg-10 py-5">
		<div class="container">
			<div class="row">
				<!-- Row -->
				<div class="col-md-12 col-12">
					<div class="mb-8 text-center">
						<h2 class="h1">Frequently Asked Questions</h2>
					</div>
				</div>
			</div>
			<!-- Row -->
			<div class="row">
@foreach ($questions as $question)
       
				<div class="col-md-6 col-lg-4 col-12 mb-3">

					<h4>{{$question->title}} <a class="text-danger" title="delete question" href="{{route('frequentlyQuestion.delete',$question->id)}}"><i class="fe fe-trash"></i> </a></h4>
					<p>
						{{$question->response}}
					</p>
				</div>

    			<!-- Col -->
	@endforeach
			</div>
		</div>
	</div>


@endsection