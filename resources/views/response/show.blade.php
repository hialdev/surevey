@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('responses.index')}}" class="btn btn-dark mb-3 d-inline-flex p-2 px-3 align-items-center gap-2 rounded-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="m2.87 7.75l1.97 1.97a.75.75 0 1 1-1.06 1.06L.53 7.53L0 7l.53-.53l3.25-3.25a.75.75 0 0 1 1.06 1.06L2.87 6.25h9.88a3.25 3.25 0 0 1 0 6.5h-2a.75.75 0 0 1 0-1.5h2a1.75 1.75 0 1 0 0-3.5z" clip-rule="evenodd"/></svg>
                Kembali
            </a>
        </div>
        <div class="col-md-12">
            <h1>Responses for User ID: {{ $responses->first()->user_id }}</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($responses as $response)
                    <tr>
                        <td>{{ $response->question->question }}</td>
                        <td>{{ $response->response }}</td>
                        <td>{{ $response->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
