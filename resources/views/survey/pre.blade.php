@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-6">
            <h3>Selamat Datang di Survey Sama-sama Healthy Dental Clinic</h3>
            <p>Demi meningkatkan kualitas, pelayanan, dan produk pada Sama-sama Healthy, Berharap responden dapat meluangkan waktu dan memberikan pandangannya. Terimakasih banyak</p>
            <a href="{{route('going')}}" class="btn btn-success">Mulai</a>
        </div>
        <div class="col-12 col-md-6">
            <img src="/src/images/start.svg" alt="Start Illustration" class="d-block">
        </div>
    </div>
</div>
@endsection