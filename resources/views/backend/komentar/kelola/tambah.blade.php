@extends('layouts.app')
@section('title_page', 'Tambah komentar')
@section('description_page', 'Menambahkan komentar')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Komentar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    {!! Form::open(['route' => 'komentar.kelola.simpan', 'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="komentar">Isi komentar</label>
                            {{ Form::textarea('komentar', null, [
                                'class' => 'form-control',
                                'id' => 'komentar',
                                'placeholder' => 'Pemasukan komentar pengguna',
                                'rows' => 5,
                                'cols' => 40
                            ]) }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {{ Form::button('Tambah Komentar', [
                    'type' => 'submit',
                    'class' => 'btn btn-success pull-left'
                ]) }}
            </div>
            {{ Form::close() }}
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
