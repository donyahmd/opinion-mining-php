@extends('layouts.app')
@section('title_page', 'Confusion Matrix')
@section('description_page', 'List confusion matrix')

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
        @if (!$confusion_matrix_kosong)
            $('#tabel_komentar').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('komentar.data_confusion_matrix') }}",
                columns: [
                    { data: 'komentar', name: 'komentar' , orderable: false},
                    { data: 'klasifikasi', name: 'klasifikasi' , orderable: true},
                    { data: 'confusion_matrix', name: 'confusion_matrix' , orderable: false},
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
        @else
            $('#modal-preproses').modal('show');
        @endif
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
                @if (!$confusion_matrix_kosong)
                <table id="tabel_komentar" class="table table-bordered table-hover striped">
                    <thead>
                        <tr>
                            <th>Komentar</th>
                            <th>Klasifikasi</th>
                            <th>Confusion Matrix</th>
                        </tr>
                    </thead>
                </table>
                @endif
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

@if ($confusion_matrix_kosong)
<div class="modal fade" id="modal-preproses">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Preproses Komentar</h4>
            </div>
            <div class="modal-body">
                <p>Preproses Komentar <b>kosong</b> atau <b>belum dijalankan</b>. Jalankan sekarang?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                {!! Form::open(['route' => 'komentar.mining.klasifikasi', 'method' => 'post']) !!}
                <button type="submit" class="btn btn-success">Jalankan</button>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endif
@endsection
