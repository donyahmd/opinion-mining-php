@extends('layouts.app')
@section('title_page', 'Devices')
@section('description_page', 'Devices list')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('js')
<!-- DataTables -->
<script src="{{ asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script>
    $(function () {
      $('#example1').DataTable()
    })
  </script>
@endpush

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Devices</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Device</th>
                            <th>IP Address</th>
                            <th>Port</th>
                            <th>MAC Address</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>TV Samsung 14"</td>
                            <td>192.168.1.1</td>
                            <td>8888</td>
                            <td>11:22:33:44:55</td>
                            <td>Sudirman, Jakarta Utara</td>
                            <td>
                                <span class="label label-danger">not connected</span>
                            </td>
                            <td>Sukses</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>TV Samsung 14"</td>
                            <td>192.168.1.1</td>
                            <td>8888</td>
                            <td>11:22:33:44:55</td>
                            <td>Sudirman, Jakarta Utara</td>
                            <td>
                                <span class="label label-success">connected</span>
                            </td>
                            <td>Sukses</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Device</th>
                            <th>IP Address</th>
                            <th>Port</th>
                            <th>MAC Address</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Note</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
