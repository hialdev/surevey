@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center mb-4">Create Question</h2>
    <form method="POST" action="{{ route('manage.store') }}">
        @csrf
        <div class="form-group">
            <label for="question">Question</label>
            <input id="question" type="text" class="form-control" name="question" value="{{ old('question') }}" required>
        </div>
        <div class="form-group">
            <label for="input_type">Input Type</label>
            <select id="input_type" class="form-control" name="input_type" required onchange="toggleOptions(this.value)">
                <option value="1" {{ old('input_type') == 1 ? 'selected' : '' }}>Text</option>
                <option value="2" {{ old('input_type') == 2 ? 'selected' : '' }}>Textarea</option>
                <option value="3" {{ old('input_type') == 3 ? 'selected' : '' }}>Number</option>
                <option value="4" {{ old('input_type') == 4 ? 'selected' : '' }}>Date</option>
                <option value="5" {{ old('input_type') == 5 ? 'selected' : '' }}>Option</option>
            </select>
        </div>
        <div class="form-group" id="options-group" style="display: none;">
            <label>Options</label>
            <div id="options-container">
                <div class="input-group mb-2 option-item">
                    <input type="text" class="form-control option-input" name="options[]" placeholder="Option">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger btn-remove" onclick="removeOption(this)">Remove</button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary mt-2" onclick="addOption()">Add Option</button>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Create Question</button>
    </form>
</div>
<script>
    function toggleOptions(value) {
        const optionsGroup = document.getElementById('options-group');
        if (value == 5) {
            optionsGroup.style.display = 'block';
        } else {
            optionsGroup.style.display = 'none';
        }
    }

    function addOption() {
        const container = document.getElementById('options-container');
        const optionItem = document.createElement('div');
        optionItem.className = 'input-group mb-2 option-item';
        optionItem.innerHTML = `
            <input type="text" class="form-control option-input" name="options[]" placeholder="Option">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger btn-remove" onclick="removeOption(this)">Remove</button>
            </div>`;
        container.appendChild(optionItem);
    }

    function removeOption(button) {
        const optionItem = button.closest('.option-item');
        optionItem.remove();
    }

    document.addEventListener("DOMContentLoaded", function() {
        const inputType = document.getElementById('input_type');
        toggleOptions(inputType.value);
    });
</script>
@endsection