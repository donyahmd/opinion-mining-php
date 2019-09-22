@extends('layouts.app')
@section('title_page', 'Komentar')
@section('description_page', 'List komentar')

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
      $('#tabel_komentar').DataTable({
        "language": {
            "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ komentar",
            "paginate": {
                "previous": "Sebelumnya",
                "next": "Selanjutnya"
            },
            "sLengthMenu": "Tampilkan _MENU_",
            "emptyTable": "Data Kosong",
            "search": "Pencarian"
        }
      })
    })
  </script>
@endpush

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Komentar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="tabel_komentar" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Komentar (Sebelum di proses)</th>
                            <th>Komentar (Setelah di proses)</th>
                            <th>Nilai Klasifikasi</th>
                            <th>Hasil Klasifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pak Isran tidak pantas menjadi gubernur</td>
                            <td>Pak Isran tidak pantas menjadi gubernur</td>
                            <td>0.32</td>
                            <td>
                                <span class="label label-danger">Negatif</span>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pak Isran pantas menjadi gubernur</td>
                            <td>Pak Isran pantas menjadi gubernur</td>
                            <td>1.56</td>
                            <td>
                                <span class="label label-success">Positif</span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Komentar (Sebelum di proses)</th>
                            <th>Komentar (Setelah di proses)</th>
                            <th>Nilai Klasifikasi</th>
                            <th>Hasil Klasifikasi</th>
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
