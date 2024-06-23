@extends('layouts.layouts.layouts.app')
<base href="/public">
@section('content')






          		
        <div class="col-lg-9 col-md-8 col-12">
          <!-- Card -->
          <div class="card mb-4">

            <!-- Card body -->
            <div class="card-header">
              <h3 class="mb-0">Result - {{\Str::title($quiz->title)}} </h3>



            </div>
            <!-- card -->
            <div class="card-body border-bottom">
              <!-- row -->
              <div class="row row-cols-lg-3 row-cols-1">
                <div class="col">
                  <!-- card -->
                  <div class="card bg-light shadow-none mb-3 mb-lg-0">
                    <!-- card body -->
                    <div class="card-body">
                      <h4 class="mb-0">Participate</h4>
                      <div class="mt-5 d-flex justify-content-between align-items-center lh-1">
                        <div>
                          <span class="fs-3 text-dark fw-semi-bold">{{$results->count()}}</span>
                        </div>
                        <div class="align-middle">
                          <i class="fe fe-users h2 text-danger"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- col -->
                <div class="col">
                  <!-- card -->
                  <div class="card bg-light shadow-none mb-3 mb-lg-0">
                    <!-- card body -->
                    <div class="card-body">
                      <h4 class="mb-0">Scores</h4>
                      <div class="mt-5 d-flex justify-content-between align-items-center lh-1">
                        <div>
                          <span class="fs-3 text-dark fw-semi-bold">{{$average}}</span>
                        </div>
                        <div class="align-middle">
                          <i class="fe fe-clipboard h2 text-primary"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col">
                  <!-- card -->
                  <div class="card bg-light shadow-none mb-3 mb-lg-0">
                    <!-- card body -->
                    <div class="card-body">
                      <h4 class="mb-0">Average Time</h4>
                      <div class="mt-5 d-flex justify-content-between align-items-center lh-1">
                        <div>
                          <span class="fs-3 text-dark fw-semi-bold">00:00:42</span>
                        </div>
                        <div class="align-middle">
                          <i class="fe fe-clock h2 text-success"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>


            <!-- table -->
            <div class="table-responsive">
              <table class="table " id="dataTableBasic">
                <thead class="table-light">
                  <tr>
                    <th class="border-0">Students</th>
                    <th class="border-0">Score</th>
                    <th class="border-0">Attempt</th>
                    <th class="border-0">Finishing time</th>
                  </tr>
                </thead>
                <tbody>
@foreach ($results as $result)

                  <tr>
                    <td class="align-middle border-top-0">
                      <a href="#">
                        <div class="d-flex align-items-center">
                          <img src="{{\App\Models\User::findOrFail($result->user_id)->profile_photo_url}}" alt="" class="rounded-circle avatar-sm me-2">
                          <h5 class="mb-0">{{\App\Models\User::findOrFail($result->user_id)->name}}</h5>
                        </div>
                      </a>
                    </td>
                    <td class="align-middle border-top-0">{{$result->result}}</td>
                    <td class="align-middle border-top-0">1 attempt</td>
                    <td class="align-middle border-top-0"> {{\Carbon\Carbon::parse($result->created_at)->format('d M, Y H:i')}}</td>
                  </tr>
@endforeach
                </tbody>
              </table>

            </div>



          </div>

        </div>
      








@endsection