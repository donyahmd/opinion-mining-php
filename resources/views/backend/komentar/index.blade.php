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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {
      $('#tabel_komentar').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('komentar.data_komentar') }}",
        columns: [
            { data: 'komentar', name: 'komentar' , orderable: false},
        ],
        // "lengthChange": false,
        "language": {
            "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ komentar",
            "paginate": {
                "previous": "Sebelumnya",
                "next": "Selanjutnya"
            },
            "sLengthMenu": "Tampilkan _MENU_",
            "emptyTable": "Data Kosong",
            "infoFiltered": "(disaring dari _MAX_ data)",
            "search": "Pencarian"
        },
      })
    })
  </script>
@endpush

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kelola data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <a href="{{ route('komentar.kelola.tambah') }}" type="button" class="btn btn-success">Tambah Komentar</a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Komentar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="tabel_komentar" class="table table-bordered table-hover striped">
                    <thead>
                        <tr>
                            <th>Komentar</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
