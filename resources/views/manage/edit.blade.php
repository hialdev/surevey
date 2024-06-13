@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Question') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('manage.update', $question->id) }}">
                        @csrf
                        @method('POST')

                        <div class="form-group mb-3">
                            <label for="question">{{ __('Question') }}</label>
                            <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question', $question->question) }}" required autocomplete="question" autofocus>
                            @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="input_type">{{ __('Input Type') }}</label>
                            <select id="input_type" class="form-control @error('input_type') is-invalid @enderror" name="input_type" required>
                                <option value="1" {{ $question->input_type == 1 ? 'selected' : '' }}>Text</option>
                                <option value="2" {{ $question->input_type == 2 ? 'selected' : '' }}>Textarea</option>
                                <option value="3" {{ $question->input_type == 3 ? 'selected' : '' }}>Number</option>
                                <option value="4" {{ $question->input_type == 4 ? 'selected' : '' }}>Date</option>
                                <option value="5" {{ $question->input_type == 5 ? 'selected' : '' }}>Options</option>
                            </select>
                            @error('input_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="options-container" style="display: {{ $question->input_type == 5 ? 'block' : 'none' }}">
                            <label for="options">{{ __('Options') }}</label>
                            <div id="options-list">
                                @if($question->input_type == 5 && $options = json_decode($question->options))
                                    @foreach($options as $option)
                                        <div class="input-group mb-2">
                                            <input type="text" name="options[]" class="form-control" value="{{ $option }}" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-danger remove-option" type="button">Remove</button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button id="add-option" type="button" class="btn btn-secondary">Add Option</button>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Question') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const inputType = document.getElementById('input_type');
    const optionsContainer = document.getElementById('options-container');
    const optionsList = document.getElementById('options-list');
    const addOptionButton = document.getElementById('add-option');

    inputType.addEventListener('change', function () {
        if (inputType.value == 5) {
            optionsContainer.style.display = 'block';
        } else {
            optionsContainer.style.display = 'none';
        }
    });

    addOptionButton.addEventListener('click', function () {
        const newOption = document.createElement('div');
        newOption.classList.add('input-group', 'mb-2');
        newOption.innerHTML = `
            <input type="text" name="options[]" class="form-control" required>
            <div class="input-group-append">
                <button class="btn btn-danger remove-option" type="button">Remove</button>
            </div>
        `;
        optionsList.appendChild(newOption);
    });

    optionsList.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-option')) {
            e.target.closest('.input-group').remove();
        }
    });
});
</script>
@endsection
