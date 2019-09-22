@extends('layouts.app')
@section('title_page', 'Pengaturan Mining')
@section('description_page', 'Konfigurasi variabel pada Opinion Mining')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Nilai Probabilitas</h3>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label for="probabilitas_positif" class="col-sm-2 control-label">Positif</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="probabilitas_positif" placeholder="Nilai Probabilitas Positif">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="probabilitas_negatif" class="col-sm-2 control-label">Negatif</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="probabilitas_negatif" placeholder="Nilai Probabilitas Negatif">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Ubah</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
