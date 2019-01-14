  <div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <i class="fa fa-list-ul bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                        <div class="h5 text-secondary mb-0 mt-1"><?php echo $p_baru; ?></div>
                        <div class="text-muted text-uppercase font-weight-bold font-xs small">Perusahaan Baru</div>
                    </div>
                    <div class="b-b-1 pt-3"></div>
                    <hr>
                    <div class="more-info">
                        <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo base_url();?>Admin/userbaru">Lihat Selengkapnya <i class="fa fa-angle-right float-right font-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <i class="fa fa-list bg-flat-color-5 p-3 font-2xl mr-3 float-left text-light"></i>
                        <div class="h5 text-secondary mb-0 mt-1"><?php echo $p_terdaftar; ?></div>
                        <div class="text-muted text-uppercase font-weight-bold font-xs small">Perusahaan Terdaftar</div>
                    </div>
                    <div class="b-b-1 pt-3"></div>
                    <hr>
                    <div class="more-info">
                        <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo base_url();?>Admin/perusahaan">Lihat Selengkapnya <i class="fa fa-angle-right float-right font-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div id="chartContainer" style="height: 350px; width: 100%;"></div>
                    </div>
                    <div class="b-b-1 pt-3"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div id="chartContainer1" style="height: 350px; width: 100%;"></div>
                    </div>
                    <div class="b-b-1 pt-3"></div>
                    <hr>
                    <div class="more-info">
                        <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo base_url();?>Admin/rekap_pp">Lihat Selengkapnya <i class="fa fa-angle-right float-right font-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div id="chartContainer2" style="height: 350px; width: 100%;"></div>
                    </div>
                    <div class="b-b-1 pt-3"></div>
                    <hr>
                    <div class="more-info">
                        <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo base_url();?>Admin/rekap_pkb">Lihat Selengkapnya <i class="fa fa-angle-right float-right font-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div id="chartContainer3" style="height: 350px; width: 100%;"></div>
                    </div>
                    <div class="b-b-1 pt-3"></div>
                    <hr>
                    <div class="more-info">
                        <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo base_url();?>Admin/rekap_k3">Lihat Selengkapnya <i class="fa fa-angle-right float-right font-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div id="chartContainer4" style="height: 350px; width: 100%;"></div>
                    </div>
                    <div class="b-b-1 pt-3"></div>
                    <hr>
                    <div class="more-info">
                        <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo base_url();?>Admin/rekap_lks">Lihat Selengkapnya <i class="fa fa-angle-right float-right font-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div id="chartContainer5" style="height: 350px; width: 100%;"></div>
                    </div>
                    <div class="b-b-1 pt-3"></div>
                    <hr>
                    <div class="more-info">
                        <a class="font-weight-bold font-xs btn-block text-muted small" href="<?php echo base_url();?>Admin/rekap_wlkp">Lihat Selengkapnya <i class="fa fa-angle-right float-right font-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .content -->
</div>
<script src="<?php echo base_url('assets/vendors/highchart/highcharts.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/highchart/exporting.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/highchart/offline-exporting.js');?>"></script>
<script src="<?php echo base_url('assets/vendors/highchart/export-data.js');?>"></script>
<script type="text/javascript">
    Highcharts.chart('chartContainer', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Data Perusahaan'
    },
    credits: {
        enabled: false
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
          allowPointSelect: true,
          showInLegend: true,
          cursor: 'pointer',
          colors: ['#2ecc71','#e74c3c','#3498db '],
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
            distance: -50,
            filter: {
              property: 'percentage',
              operator: '>',
              value: 4
          }
      }
  }
},
series: [{
    name: 'Share',
    data: [
    {  name: 'Perusahaan Aktif',
    y: <?php echo $p_terdaftar; ?>
}, {
  name: 'Perusahaan Ditolak',
  y: <?php echo $p_blokir; ?>
}, {
  name: 'Perusahaan Baru',
  y: <?php echo $p_baru; ?>,
    sliced: true,
    selected: true }
  ]
}]
});
</script>
<script type="text/javascript">
    Highcharts.chart('chartContainer1', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'PP'
    },
    credits: {
        enabled: false
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
          allowPointSelect: true,
          showInLegend: true,
          cursor: 'pointer',
          colors: ['#2ecc71','#e74c3c','#3498db '],
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
            distance: -50,
            filter: {
              property: 'percentage',
              operator: '>',
              value: 4
          }
      }
  }
},
series: [{
    name: 'Presentase',
    data: [
    {  name: 'PP Aktif',
    y: <?php echo $pp_aktif; ?>
}, {
  name: 'PP Kadaluarsa',
  y: <?php echo $pp_kadaluarsa; ?>,
    sliced: true,
    selected: true
}, {
  name: 'PP Belum Tersedia',
  y: <?php echo $pp_perbarui; ?> }
  ]
}]
});
</script>
<script type="text/javascript">
    Highcharts.chart('chartContainer2', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'PKB'
    },
    credits: {
        enabled: false
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
          allowPointSelect: true,
          showInLegend: true,
          cursor: 'pointer',
          colors: ['#2ecc71','#e74c3c','#3498db '],
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
            distance: -50,
            filter: {
              property: 'percentage',
              operator: '>',
              value: 4
          }
      }
  }
},
series: [{
    name: 'Presentase',
    data: [
    {  name: 'PKB Aktif',
    y: <?php echo $pkb_aktif; ?>,
    sliced: true,
    selected: true
}, {
  name: 'PKB Kadaluarsa',
  y: <?php echo $pkb_kadaluarsa; ?>
}, {
  name: 'PKB Belum Tersedia',
  y: <?php echo $pkb_perbarui; ?> }
  ]
}]
});
</script>
<script type="text/javascript">
    Highcharts.chart('chartContainer3', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'K3'
    },
    credits: {
        enabled: false
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
          allowPointSelect: true,
          showInLegend: true,
          cursor: 'pointer',
          colors: ['#2ecc71','#e74c3c','#3498db '],
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
            distance: -50,
            filter: {
              property: 'percentage',
              operator: '>',
              value: 4
          }
      }
  }
},
series: [{
    name: 'Presentase',
    data: [
    {  name: 'K3 Aktif',
    y: <?php echo $k3_aktif; ?>,
    sliced: true,
    selected: true
}, {
  name: 'K3 Kadaluarsa',
  y: <?php echo $k3_kadaluarsa; ?>
}, {
  name: 'K3 Belum Tersedia',
  y: <?php echo $k3_perbarui; ?> }
  ]
}]
});
</script>
<script type="text/javascript">
    Highcharts.chart('chartContainer4', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'LKS'
    },
    credits: {
        enabled: false
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
          allowPointSelect: true,
          showInLegend: true,
          cursor: 'pointer',
          colors: ['#2ecc71','#e74c3c','#3498db '],
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
            distance: -50,
            filter: {
              property: 'percentage',
              operator: '>',
              value: 4
          }
      }
  }
},
series: [{
    name: 'Presentase',
    data: [
    {  name: 'LKS Aktif',
    y: <?php echo $lks_aktif; ?>
}, {
  name: 'LKS Kadaluarsa',
  y: <?php echo $lks_kadaluarsa; ?>,
    sliced: true,
    selected: true
}, {
  name: 'LKS Belum Tersedia',
  y: <?php echo $lks_perbarui; ?> }
  ]
}]
});
</script>
<script type="text/javascript">
    Highcharts.chart('chartContainer5', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'WLKP'
    },
    credits: {
        enabled: false
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
          allowPointSelect: true,
          showInLegend: true,
          cursor: 'pointer',
          colors: ['#2ecc71','#e74c3c','#3498db '],
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
            distance: -50,
            filter: {
              property: 'percentage',
              operator: '>',
              value: 4
          }
      }
  }
},
series: [{
    name: 'Presentase',
    data: [
    {  name: 'WLKP Aktif',
    y: <?php echo $wlkp_aktif; ?>
}, {
  name: 'WLKP Kadaluarsa',
  y: <?php echo $wlkp_kadaluarsa; ?>
}, {
  name: 'WLKP Belum Tersedia',
  y: <?php echo $wlkp_perbarui; ?>,
    sliced: true,
    selected: true }
  ]
}]
});
</script>