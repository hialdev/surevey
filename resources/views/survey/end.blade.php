@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row align-items-center flex-column">
        <div class="col-12 col-md-6">
            <img src="/src/images/done.svg" alt="Start Illustration" class="d-block mx-auto" style="max-height:30em" />
        </div>
        <div class="col-12 col-md-6 text-center">
            <h3>Terimakasih Telah Mengisi Survey :*</h3>
            <a href="{{route('home')}}" class="btn btn-success">Beranda</a>
        </div>
    </div>
</div>
@endsection