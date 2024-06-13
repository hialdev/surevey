<div class="form-group mb-2 rounded-3 p-4 bg-white">
    <label for="question_{{ $question->id }}" class="mb-1">{{ $question->question }}</label>
    <input type="text" class="form-control" id="question_{{ $question->id }}" name="responses[{{ $question->id }}]" required>
</div>
