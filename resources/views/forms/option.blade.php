<div class="form-group bg-white p-4 rounded-3 mb-2">
    <label class="mb-1">{{ $question->question }}</label>
    @foreach (json_decode($question->options) as $option)
        <div class="form-check">
            <input class="form-check-input" type="radio" name="responses[{{ $question->id }}]" id="option_{{ $question->id }}_{{ $loop->index }}" value="{{ $option }}" required>
            <label class="form-check-label" for="option_{{ $question->id }}_{{ $loop->index }}">
                {{ $option }}
            </label>
        </div>
    @endforeach
</div>
