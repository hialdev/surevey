@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="col-12">
            <div class="d-flex align-items-center my-4 justify-content-between">
                <h2>Manage Questions</h2>
                <a href="{{route('manage.create')}}" class="btn btn-success">Tambah Question</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Question</th>
                        <th>Type</th>
                        <th>Options</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $question->question }}</td>
                        <td>
                            @switch($question->input_type)
                                @case(1)
                                    Text
                                    @break
                                @case(2)
                                    Textarea
                                    @break
                                @case(3)
                                    Number
                                    @break
                                @case(4)
                                    Date
                                    @break
                                @case(5)
                                    Options
                                    @break
                                @default
                                    Unknown
                            @endswitch
                        </td>
                        <td>
                            @if($question->input_type == 5)
                                <ul>
                                    @foreach(json_decode($question->options) as $option)
                                        <li>{{ $option }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('manage.edit', $question->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('manage.delete', $question->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
