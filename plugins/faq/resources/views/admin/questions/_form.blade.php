@csrf

<div class="form-group">
    <label for="nameInput">{{ trans('messages.fields.name') }}</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', $question->name ?? '') }}" required>

    @error('name')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>

<div class="form-group">
    <label for="answerInput">{{ trans('faq::messages.fields.answer') }}</label>
    <textarea class="form-control @error('answer') is-invalid @enderror" id="answerInput" name="answer" rows="3">{{ old('answer', $question->answer ?? '') }}</textarea>

    @error('answer')
    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
    @enderror
</div>
