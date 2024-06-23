                <div class="row" >
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-0">Earnings</h4>
                                </div>
                                <div>
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="courseDropdown1">
                                            <span class="dropdown-header">Settings</span>
                                            <a class="dropdown-item" href="#"><i
                            class="fe fe-external-link dropdown-item-icon "></i>Export</a>
                                            <a class="dropdown-item" href="#"><i class="fe fe-mail dropdown-item-icon "></i>Email
                          Report</a>
                                            <a class="dropdown-item" href="#"><i
                            class="fe fe-download dropdown-item-icon "></i>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Earning chart -->
                                {{-- <div id="mon-chart"  width="400" height="900"></div> --}}
                                <div class="apex-charts" id="mon-chart" style="height: 400px; width: 800px;" ></div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header align-items-center card-header-height  d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-0">Traffic</h4>
                                </div>
                                <div>
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="courseDropdown2">
                                            <span class="dropdown-header">Settings</span>
                                            <a class="dropdown-item" href="#"><i
                            class="fe fe-external-link dropdown-item-icon "></i>Export</a>
                                            <a class="dropdown-item" href="#"><i class="fe fe-mail dropdown-item-icon "></i>Email
                          Report</a>
                                            <a class="dropdown-item" href="#"><i
                            class="fe fe-download dropdown-item-icon "></i>Download</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <div id="mon-second-chart"  style="height: 400px; width: 800px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
{{-- https://chartisan.dev/documentation/customizing --}}

<script src="https://www.gstatic.com/charts/loader.js"></script>
{{-- <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Catégories', 'courses'],
      @foreach ($categories as $category) // On parcourt les catégories
      [ "{{ $category->name }}", {{ $category->courses->count() }} ], // Proportion des produits de la catégorie
      @endforeach
    ]);

    var options = {
      title: 'Proportion des cours par catégorie', // Le titre
      is3D : true // En 3D
    };

    // On crée le chart en indiquant l'élément où le placer "#mon-chart"
    var chart = new google.visualization.PieChart(document.getElementById('mon-chart'));

    // On désine le chart avec les données et les options
    chart.draw(data, options);
  }
</script> --}}
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Catégory', 'courses', 'Orders' ],
      @foreach ($categories as $category) // On parcourt les catégories
      [ '{{ $category->name }}', {{ $category->courses->count() }}, {{ $category->orders->count() }} ],
      @endforeach
    ]);

    var options = {
      chart: {
        title: 'Performance Category - Courses - Orders',
        subtitle: 'Cours, Order by Category',
      },
      bars: 'vertical' // Direction "verticale" pour les bars
    };

    var chart = new google.charts.Bar(document.getElementById('mon-chart'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<script type="text/javascript">
  
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
  
    function drawChart() {
  
    var data = google.visualization.arrayToDataTable([
        ['Month Name', 'Register Users Count'],
  
  @php
            foreach($users as $key => $value) 
                  echo "['".$key."', ".$value."],";
            
            
  @endphp
    ]);
  
    var options = {
      title: 'Register Users Month Wise',
      curveType: 'function',
      legend: { position: 'bottom' }
    };
  
      var chart = new google.visualization.LineChart(document.getElementById('mon-second-chart'));
  
      chart.draw(data, options);
    }
</script>


{{-- <script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['User', 'courses', 'Orders' ],
      @foreach ($users as $user) // On parcourt les catégories
      [ '{{ $user->name }}', {{ $user->courses->count() }}, {{ $user->orders->count() }} ],
      @endforeach
    ]);

    var options = {
      chart: {
        title: 'Performance Category - Courses - Orders',
        subtitle: 'Cours, Order by Category',
      },
      bars: 'vertical' // Direction "verticale" pour les bars
    };
    //var chart = new google.visualization.PieChart(document.getElementById('mon-second-chart'));

    
    //chart.draw(data, options);

    var chart = new google.charts.Bar(document.getElementById('mon-second-chart'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
     

      ['User', 'orders'],
      @foreach ($users as $user) // On parcourt les catégories
      [ '{{ $user->name }}', {{ $user->orders->count() }} ],
      @endforeach
    ]);

    var options = {
      title: 'Pourcentage de commandes en fonction des Utilisateurs', // Le titre
      is3D : true // En 3D
    };

    // On crée le chart en indiquant l'élément où le placer "#mon-chart"
    var chart = new google.visualization.PieChart(document.getElementById('mon-second-chart'));

    // On désine le chart avec les données et les options
    chart.draw(data, options);
  }
</script> --}}
 {{-- <script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`@php echo $data['chart_data']; @endphp`);
      var ctx = $("#pie-chart");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Last Week Registered Users -  Day Wise Count",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  });
</script> --}}
   {{-- <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
 
        function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
            ['Month Name', 'Register Users Count'],
 
                @php
                foreach($lineChart as $d) {
                    echo "['".$d->month_name."', ".$d->count."],";
                }
                @endphp
        ]);
 
        var options = {
          title: 'Register Users Month Wise',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
 
          var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));
 
          chart.draw(data, options);
        }
        
    </script>
     --}}