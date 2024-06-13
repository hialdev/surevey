<div class="form-group bg-white rounded-3 p-4 mb-2">
    <label class="mb-1" for="question_{{ $question->id }}">{{ $question->question }}</label>
    <input type="date" class="form-control" id="question_{{ $question->id }}" name="responses[{{ $question->id }}]" required>
</div>
