@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>All Responses</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($responses as $response)
                    <tr>
                        <td>{{ $response->user_id }}</td>
                        <td>{{ $response->name }}</td>
                        <td>{{ $response->email }}</td>
                        <td><a href="{{ route('responses.show', $response->user_id) }}">View Details</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
