<?php $this->view('includes/header',$data)?>
<link href="../../assets/demo/demo.css" rel="stylesheet" />
</head>
<body>
<?php $this->view('includes/sidebar',$data)?> 

<div class="wrapper ">
<div class="main-panel" >
<?php $this->view('includes/nav',$data)?> 
<div class="panel-header panel-header-sm"  style="height: 70px;padding:0">
</div>
    
            <div class="content mt-2">
              <div class="container-fluid">
                 <div class="row">
                      <div class="col-md-7">
                        <div class="card p-3">
                          <img src="../../assets/img/POLITE Desk.png" class="card-img img-fluid" alt="">
                        </div>
                      </div>
                    </div>
                 </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-6">
                          <div class="card card-chart">
                            <div class="card-header">
                              <!-- <h5 class="card-category">2018 Sales</h5> -->
                              <h4 class="card-title">Categories</h4>
                              <div class="dropdown">
                                <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                  <i class="now-ui-icons loader_gear"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <a class="dropdown-item" href="#">Something else here</a>
                                  <a class="dropdown-item text-danger" href="#">Remove Data</a>
                                </div>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="chart-area">
                              <div class="panel-header panel-header-lg">
                                <canvas id="categories"></canvas>
                              </div>
                              </div>
                            </div>
                            <div class="card-footer">
                            
                            </div>
                          </div>
                        </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-6">
                          <div class="card card-chart">
                            <div class="card-header">
                              <!-- <h5 class="card-category">2018 Sales</h5> -->
                              <h4 class="card-title">Sub Categories</h4>
                              <div class="dropdown">
                                <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                  <i class="now-ui-icons loader_gear"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <a class="dropdown-item" href="#">Something else here</a>
                                  <a class="dropdown-item text-danger" href="#">Remove Data</a>
                                </div>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="chart-area">
                              <div class="panel-header panel-header-lg">
                                <canvas id="SubCategories"></canvas>
                              </div>
                              </div>
                            </div>
                            <div class="card-footer">
                            
                            </div>
                          </div>
                        </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-6">
                          <div class="card card-chart">
                            <div class="card-header">
                              <!-- <h5 class="card-category">2018 Sales</h5> -->
                              <h4 class="card-title">Root Cause Categories</h4>
                              <div class="dropdown">
                                <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                                  <i class="now-ui-icons loader_gear"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <a class="dropdown-item" href="#">Something else here</a>
                                  <a class="dropdown-item text-danger" href="#">Remove Data</a>
                                </div>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="chart-area">
                              <div class="panel-header panel-header-lg">
                                <canvas id="RootCauseCategory"></canvas>
                              </div>
                              </div>
                            </div>
                            <div class="card-footer">
                            
                            </div>
                          </div>
                        </div>
                  </div>
              </div>
            </div>

</div>

  <!--   Core JS Files   -->
  <?php $this->view('includes/footer',$data)?>
    <!-- Chart JS -->
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script src="../../assets/demo/demo.js"></script>
    
    <script>
    
    $(document).ready(function() {

    chart('categories');
    chart('SubCategories');
    chart('RootCauseCategory');
   function chart($getElementId){
    chartColor = "#FFFFFF";
      var ctx = document.getElementById($getElementId).getContext("2d");

var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
gradientStroke.addColorStop(0, '#80b6f4');
gradientStroke.addColorStop(1, chartColor);

var gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
    datasets: [{
      label: "Behavioral Assessment",
      borderColor: "#FFA500",
      pointBorderColor: "#FFA500",
      pointBackgroundColor: "#FFA500",
      pointHoverBackgroundColor: "#FFA500",
      pointHoverBorderColor: "#FFA500",
      pointBorderWidth: 1,
      pointHoverRadius: 7,
      pointHoverBorderWidth: 2,
      pointRadius: 5,
      fill: true,
      backgroundColor: gradientFill,
      borderWidth: 2,
      data: [50, 150, 100, 190, 130, 90, 150, 160, 120, 140, 100, 300]
    },{
      label: "Quality Assurance Evaluation Scores Discussion",
      borderColor: chartColor,
      pointBorderColor: chartColor,
      pointBackgroundColor: "#1e3d60",
      pointHoverBackgroundColor: "#1e3d60",
      pointHoverBorderColor: chartColor,
      pointBorderWidth: 1,
      pointHoverRadius: 7,
      pointHoverBorderWidth: 2,
      pointRadius: 5,
      fill: true,
      backgroundColor: gradientFill,
      borderWidth: 2,
      data: [50, 150, 100, 190, 130, 90, 150, 160, 120, 140, 190, 1000]
    }]
  },
  options: {
    layout: {
      padding: {
        left: 20,
        right: 20,
        top: 0,
        bottom: 0
      }
    },
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: '#fff',
      titleFontColor: '#333',
      bodyFontColor: '#666',
      bodySpacing: 4,
      xPadding: 12,
      mode: "nearest",
      intersect: 0,
      position: "nearest"
    },
    legend: {
      position: "bottom",
      fillStyle: "#FFF",
      display: false
    },
    scales: {
      yAxes: [{
        ticks: {
          fontColor: "rgba(255,255,255,0.4)",
          fontStyle: "bold",
          beginAtZero: true,
          maxTicksLimit: 5,
          padding: 10
        },
        gridLines: {
          drawTicks: true,
          drawBorder: false,
          display: true,
          color: "rgba(255,255,255,0.1)",
          zeroLineColor: "transparent"
        }

      }],
      xAxes: [{
        gridLines: {
          zeroLineColor: "transparent",
          display: false,

        },
        ticks: {
          padding: 10,
          fontColor: "rgba(255,255,255,0.4)",
          fontStyle: "bold"
        }
      }]
    }
  }
});

   }   // Javascript method's body can be found in assets/js/demos.js

    });
  </script>
  </body>
</html>

