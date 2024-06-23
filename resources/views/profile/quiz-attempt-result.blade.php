@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')


<div class="col-lg-9 col-md-8 col-12">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="mb-3 mb-lg-0">
                <h3 class="mb-1">My Quiz Attempt</h3>
                <p class="mb-0">You can find all of your order Invoices.</p>
              </div>

            </div>
            <!-- table -->
            <div class="table-responsive">
              <table class="table text-nowrap text-lg-wrap table-hover table-centered" id="dataTableBasic">
                <thead class="table-light">
                  <tr>
                    <th>Quiz Info</th>
                    <th>Questions</th>
                    <th>Correct</th>
                    <th>Incorrect</th>
                    <th>Marks</th>
                    <th>Result</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($results as $result)
                  <tr>
                    <td>
                      <div>
                        <a href="javascript:;">
                          <h5 class="mb-1">{{\App\Models\Quiz::find($result->quizze_id)->title}}</h5>
                        </a>
                        <small> {{$result->created_at->diffForHumans()}}</small>
                      </div>
                    </td>
                    <td> {{\App\Models\StudentQcm::where([
                            'quiz_id' => $result->quizze_id,
                            'user_id' => auth()->user()->id
                        ])->count()}}</td>
                    <td>{{\App\Models\StudentQcm::where([
                            'quiz_id' => $result->quizze_id,
                            'points' => 1,
                            'user_id' => auth()->user()->id

                        ])->count()}}</td>
                    <td>
                    {{\App\Models\StudentQcm::where([
                            'quiz_id' => $result->quizze_id,
                            'points' => 0,
                            'user_id' => auth()->user()->id

                        ])->count()}}
                    </td>
                    <td>{{round($result->result/5,1)}}({{$result->result}}%)</td>
                    <td><span class="badge bg-{{$result->result < 50 ? 'danger' : 'success'}}">{{$result->result < 50 ? 'Fail' : 'Pass'}}</span>
                    </td>
                    <td><a class="btn-sm btn-success" href="{{route('restartQuiz',$result->quizze_id)}}">Restart</a></td>
                  </tr> 
                                    
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>


@endsection