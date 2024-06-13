@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col-12">
            <form method="POST" action="{{route('finish')}}">
                @csrf

                @foreach ($questions as $question)
                    @if ($question->input_type == 1)
                        @include('forms.input', ['question' => $question])
                    @elseif ($question->input_type == 2)
                        @include('forms.textarea', ['question' => $question])
                    @elseif ($question->input_type == 3)
                        @include('forms.number', ['question' => $question])
                    @elseif ($question->input_type == 4)
                        @include('forms.date', ['question' => $question])
                    @elseif ($question->input_type == 5)
                        @include('forms.option', ['question' => $question])
                    @endif
                @endforeach
                <button type="submit" class="btn btn-success mt-3">Submit Survey</button>
            </form>
        </div>
    </div>
</div>
@endsection
