<div class="form-group rounded-3 p-4 bg-white mb-2">
    <label for="question_{{ $question->id }}" class="mb-1">{{ $question->question }}</label>
    <textarea class="form-control" id="question_{{ $question->id }}" name="responses[{{ $question->id }}]" rows="3" required></textarea>
</div>
