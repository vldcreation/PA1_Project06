<!-- Info boxes -->
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fa fa-newspaper-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Berita</span>
        <span class="info-box-number">
          <?php echo $this->dasbor_model->berita()->total; ?>
          <small>Post</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fa fa-download"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">File Unduhan</span>
        <span class="info-box-number"><?php echo $this->dasbor_model->download()->total; ?>
        <small>File</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-image"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Galeri</span>
        <span class="info-box-number"><?php echo $this->dasbor_model->galeri()->total; ?>
        <small>File</small>
        </span>
        
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->


  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fa fa-lock"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Team</span>
        <span class="info-box-number">
          <?php echo $this->dasbor_model->user()->total; ?>
          <small>User</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fa fa-lock"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Member</span>
        <span class="info-box-number">
          <?php echo $this->dasbor_model->member()->total; ?>
          <small>User</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fa fa-calendar"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Agenda</span>
        <span class="info-box-number"><?php echo $this->dasbor_model->agenda()->total; ?>
        <small>List</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-film"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Video</span>
        <span class="info-box-number"><?php echo $this->dasbor_model->video()->total; ?>
        <small>Content</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
 
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-quote-left" aria-hidden="true"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Kutipan </span>
        <span class="info-box-number"><?php echo $this->dasbor_model->quotes()->total; ?>
        <small>Kutipan </small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->


<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.paddingRight = 20;

// Add data
chart.data = [
<?php 
$kunjungan = $this->dasbor_model->kunjungan();
foreach($kunjungan as $kunjungan) {
  ?>
{
  "year": "<?php echo date('d-m-Y',strtotime($kunjungan->hari)) ?>",
  "value": <?php echo $kunjungan->total; ?>
}, 
<?php } ?>
];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.minGridDistance = 50;
categoryAxis.renderer.grid.template.location = 0.5;
categoryAxis.startLocation = 0.5;
categoryAxis.endLocation = 0.5;

// Pre zoom
chart.events.on("datavalidated", function () {
  categoryAxis.zoomToIndexes(Math.round(chart.data.length * 0.4), Math.round(chart.data.length * 0.55));
});

// Create value axis
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.baseValue = 0;

// Create series
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "value";
series.dataFields.categoryX = "year";
series.strokeWidth = 2;
series.tensionX = 0.77;

var range = valueAxis.createSeriesRange(series);
range.value = 0;
range.endValue = 1000;
range.contents.stroke = am4core.color("#FF0000");
range.contents.fill = range.contents.stroke;

// Add scrollbar
var scrollbarX = new am4charts.XYChartScrollbar();
scrollbarX.series.push(series);
chart.scrollbarX = scrollbarX;

chart.cursor = new am4charts.XYCursor();

}); // end am4core.ready()
</script>

<!-- HTML -->
<div class="col-12 col-sm-12 col-md-12">
            <!-- interactive chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Statistik Kunjungan User
                </h3>

                <div class="card-tools">
                  Refresh
                  <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                    <a href="<?php echo base_url('admin/dasbor') ?>" class="btn btn-default btn-sm active">GO</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="chartdiv" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->



        </div>
        <!-- /.row -->

        <script>
        
        var interactive_plot = $.plot('#chartdiv', [
        {
          data: getRandomData(),
        }
      ],
      {
        grid: {
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor: '#f3f3f3'
        },
        series: {
          color: '#3c8dbc',
          lines: {
            lineWidth: 2,
            show: true,
            fill: true,
          },
        },
        yaxis: {
          min: 0,
          max: 100,
          show: true
        },
        xaxis: {
          show: true
        }
      }
    )

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */
        </script>



            <!-- FLOT CHARTS -->
<script src="<?php echo base_url('assets/admin/') ?>plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url('assets/admin/') ?>plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url('assets/admin/') ?>plugins/flot-old/jquery.flot.pie.min.js"></script>