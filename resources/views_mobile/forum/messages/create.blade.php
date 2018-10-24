<form method="POST" action="{{ route('forum.messages.send', $topic) }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="form-group__label" for="message">Сообщение</label>
        <textarea class="textarea {{ $errors->has('message') ? 'textarea_has-error' : '' }}" name="message" id="message" placeholder="Введите сообщение..." rows="4"></textarea>
        @if($errors->has('message'))
            <div class="form-group__message form-group__message--error">{{ $errors->first('message') }}</div>
        @endif
    </div>
    <div class="form-group">
        <button class="button button--success" type="submit">Отправить</button>
    </div>
</form>
