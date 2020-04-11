@extends('layouts.app')
@section('title_page', 'Beranda')
@section('description_page', 'Aplikasi')

@push('css')
<style>
    .paragraf {
        font-size: 1.2em;
        text-align: justify;
    }
</style>
@endpush

@push('js')
<!-- Sparkline -->
<script src="{{ asset('AdminLTE/bower_components/chart.js/Chart.js') }}"></script>

<script>
    $(function () {
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
        var pieChart       = new Chart(pieChartCanvas);
        var PieData        = [
            {
                value    : {{ $persentase_negatif }},
                color    : '#f56954',
                highlight: '#f56954',
                label    : 'Negatif'
            },
            {
                value    : {{ $persentase_positif }},
                color    : '#00a65a',
                highlight: '#00a65a',
                label    : 'Positif'
            },
        ];
        var pieOptions     = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke    : true,
            //String - The colour of each segment stroke
            segmentStrokeColor   : '#fff',
            //Number - The width of each segment stroke
            segmentStrokeWidth   : 3,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps       : 100,
            //String - Animation easing effect
            animationEasing      : 'easeOutBounce',
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate        : true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale         : false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive           : true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio  : true,
            // String - Template string for single tooltips
            tooltipTemplate      : "<%if (label){%> Persentase <%=label %>: <%}%><%= value + ' %' %>",
            //String - A legend template
            legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
        }

        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Pie(PieData, pieOptions)
    })
  </script>
@endpush

@section('content')

<!-- Info boxes -->
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-commenting"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Komentar</span>
          <span class="info-box-number">{{ $total_komentar }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-plus"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Komentar Positif</span>
          <span class="info-box-number">{{ round($persentase_positif, 2) }} %</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-minus"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Komentar Negatif</span>
          <span class="info-box-number">{{ round($persentase_negatif, 2) }} %</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-code-fork"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Confusion Matrix</span>
          <span class="info-box-number">{{ round($confusion_matrix['akurasi'], 2) }} %</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h2>Observasi</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p class="paragraf">
                    Pada penelitian ini akan menggunakan teknik pengumpulan data secara observasi dikarenakan data yang diambil berasal dari pengguna Instagram. Sehingga peneliti dapat melihat, mengukur, serta merekam sikap dari pengguna/responden Instagram.
                    <br><br>
                    Data komentar diambil dari akun Instagram <a target="_blank" href="https://www.instagram.com/kabar_samarinda/"><b>@kabar_samarinda</b></a>, pada postingan di <a target="_blank" href="https://www.instagram.com/p/By9rekGFvnl/"><b>tautan ini</b></a> pada tanggal <b>21 Juni 2019</b>. Dimana akun ini mempublikasikan post tentang tanggapan gubernur Kaltim terhadap aktivitas pertambangan di tengah kota Samarinda.
                    <br><br>
                    <img class="img-responsive" src="{{ asset('assets/img/isran.png') }}" alt="Gubernur Kalimantan Timur">
                </p>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h2>10 komentar negatif teratas</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">Nomor</th>
                    <th>Komentar</th>
                    <th style="width: 40px">Hasil</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $index = 1;
                  @endphp
                  @foreach ($komentar_negatif_teratas as $komentar)
                  <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $komentar->preproses_komentar }}</td>
                    <td>{{ $komentar->nilai_negatif * 100 }}%</td>
                  </tr>
                  @php
                  $index++;
                  @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="box">
        <div class="box-header">
            <h2>Persentase Klasifikasi</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <p class="paragraf">Dapat dilihat pada grafik hasil Klasifikasi dibawah menunjukan bahwa klasifikasi komentar <b>Negatif</b> lebih besar dengan persentase sebesar <b>{{ $persentase_negatif }}%</b> dari klasifikasi komentar <b>Positif</b> yang hanya memiliki persentase sebesar <b>{{ $persentase_positif }}%</b>.</p>
            <canvas id="pieChart" style="height:500px"></canvas>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <div class="col-md-6">
    <div class="box">
        <div class="box-header">
            <h2>Confusion Matrix</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <p class="paragraf">Dapat dilihat pada grafik hasil Klasifikasi dibawah menunjukan bahwa klasifikasi komentar <b>Negatif</b> lebih besar dengan persentase sebesar <b>{{ $persentase_negatif }}%</b> dari klasifikasi komentar <b>Positif</b> yang hanya memiliki persentase sebesar <b>{{ $persentase_positif }}%</b>.</p>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection
