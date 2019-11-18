@extends('layouts.app')
@section('title_page', 'Beranda')
@section('description_page', 'Beranda Aplikasi')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('js')
<!-- DataTables -->
<script src="{{ asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

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
            tooltipTemplate: "<%if (label){%> Persentase <%=label %>: <%}%><%= value + ' %' %>",
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
<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Hasil Klasifikasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <canvas id="pieChart" style="height:500px"></canvas>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
