				<div class="col-lg-9 col-md-8 col-12">
<div>
					<div class="row">
						<div class="col-lg-4 col-md-12 col-12">
							<!-- Card -->
							<div class="card mb-4">
								<div class="p-4">
									<span class="fs-6 text-uppercase fw-semi-bold">Revenue</span>
									<h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
										${{round($earning,2)}}
									</h2>
									<span class="d-flex justify-content-between align-items-center">
										<span>Earning this month</span>
										<span class="badge bg-success ms-2">${{round($orders_month,2)}}</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 col-12">
							<!-- Card -->
							<div class="card mb-4">
								<div class="p-4">
									<span class="fs-6 text-uppercase fw-semi-bold">students Enrollments</span>
									<h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
										{{$enroll}}
									</h2>
									{{-- <span class="d-flex justify-content-between align-items-center">
										<span>New this month</span>
										<span class="badge bg-info ms-2">120+</span>
									</span> --}}
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<!-- Card -->
							<div class="card mb-4">
								<div class="p-4">
									<span class="fs-6 text-uppercase fw-semi-bold">Courses Rating</span>
									<h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
										{{\App\Models\Instructor::rating(auth()->user()->id)}}
									</h2>
									{{-- <span class="d-flex justify-content-between align-items-center">
										<span>Rating this month</span>
										<span class="badge bg-warning ms-2">10+</span>
									</span> --}}
								</div>
							</div>
						</div>
					</div>


					
    					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="h4 mb-0">Earnings</h3>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<div id="my-earning" class="apex-charts"></div>
						</div>
					</div>
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="h4 mb-0">Order</h3>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<div id="orders" class="apex-charts"></div>
						</div>
					</div>


					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header border-bottom-0">
							<h3 class="h4 mb-0">Best Selling Courses</h3>
						</div>
						<!-- Table -->
						<div class="table-responsive border-0">
							<table class="table mb-0">
								<!-- Table head -->
								<thead class="table-light">
									<tr>
										<th scope="col" class="border-0">COURSES</th>
										<th scope="col" class="border-0">SALES</th>
										<th scope="col" class="border-0">AMOUNT</th>
										<th scope="col" class="border-0"></th>
									</tr>
								</thead>
								<!-- Table body -->
								<tbody>
                                @forelse($courses as $course)
									<tr>
										<td class="align-middle border-top-0">
											<a href="{{route('courses.show',$course->id)}}">
												<div class="d-lg-flex align-items-center">
													<img src="{{asset('storage/'.$course->photo)}}" alt="" class="rounded img-4by3-lg" />
													<h5 class="mb-0 ms-lg-3 mt-2 mt-lg-0 text-dark-hover">
														{{Str::title($course->title)}}                                                        
													</h5>
												</div>
											</a>
										</td>
										<td class="align-middle border-top-0">{{$course->count}}</td>
										<td class="align-middle border-top-0">${{number_format($course->total)}}</td>
										<td class="text-muted align-middle border-top-0">
											<span class="dropdown dropstart">
												<a class="text-muted text-decoration-none" href="" role="button" id="courseDropdown1"
													data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
													<i class="fe fe-more-vertical"></i>
												</a>
												<span class="dropdown-menu" aria-labelledby="courseDropdown1">
													<span class="dropdown-header">Setting </span>
													<a class="dropdown-item" href="{{route('courses.create')}}"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
													<a class="dropdown-item" href="{{route('courses.destroy',\App\Models\Course::find($course->id))}}"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
												</span>
											</span>
										</td>
									</tr>
                                    @empty
                                    <span>NO Best selling</span>
@endforelse

								</tbody>
							</table>

    <script src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
  
  
     google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
  
    function drawChart() {
  
    var data = google.visualization.arrayToDataTable([
        ['Month Name', 'Amount'],
  
  @php
            foreach($amounts as $key => $value) 
                  echo "['".$key."', ".$value."],";
            
            
  @endphp
    ]);
  
    var options = {
      title: 'Amounts',
      curveType: 'function',
      legend: { position: 'bottom' }
    };
  
      var chart = new google.visualization.LineChart(document.getElementById('my-earning'));
  
      chart.draw(data, options);
    }

</script>


     <script type="text/javascript">
  
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  
    function drawChart() {
  
    var data = google.visualization.arrayToDataTable([
        ['Month Name', 'Orders'],
  
  @php
            foreach($orders as $key => $value) 
                  echo "['".$key."', ".$value."],";
            
            
  @endphp
    ]);
  
    var options = {
      title: 'Orders',
      curveType: 'function',
      legend: { position: 'bottom' }
    };
  
      var chart = new google.visualization.LineChart(document.getElementById('orders'));
  
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

</div>
