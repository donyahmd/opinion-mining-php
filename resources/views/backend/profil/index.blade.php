@extends('layouts.app')
@section('title_page', 'Tentang')
@section('description_page', 'Saya')

@push('css')
    <style>
        .profile-user-img {
            width: 200px !important;
        }
    </style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('assets/img/PAS_FOTO.jpg') }}" alt="Profil Doni">
                <h3 class="profile-username text-center"><b>{{ $nama }}</b></h3>
                <p class="text-muted text-center"><b>{{ $nim }}</b></p>
                <p class="text-muted text-center">{{ $kelas }}</p>
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
