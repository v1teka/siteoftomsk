@push('scripts')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endpush

@if ($canComment == 1)
    <div class="container-main" xmlns="http://www.w3.org/1999/html">
        <form method="POST" action="{{ route('points.addcomment', $point) }}">
            {{ csrf_field() }}
            @if ($errors->has('error'))
                <div class="alert alert-danger">
                    {!! $errors->get('error')[0] !!}
                </div>
            @endif
            <div class="form-group">
                <label for="message">Добавить комментарий</label>
                <textarea class="form-control {{ $errors->has('message') ? 'input_has-error' : '' }}" type="text" name="message" id="message" placeholder="Комментарий">{{ $message or old('message') }}</textarea>
                @if($errors->has('message'))
                    <div class="form-group__message form-group__message--error">{{ $errors->first('message') }}</div>
                @endif
            </div>
            <div class="g-recaptcha" data-sitekey="6Lft_TEUAAAAAJCmLC9Io66zr8wq9Clwxm87F_J7"></div>
            <div class="form-group">
                <button class="btn btn-success" type="submit" data-toggle="tooltop" title="Комментарий будет рассмотрен модератором">Отправить на проверку</button>
            </div>
        </form>
    </div>
@elseif ($canComment == 2)
    <div class="container-main" xmlns="http://www.w3.org/1999/html">
        <div class="alert alert-info">
            Для того, чтобы оставлять комментарии, необходимо <a href="{{ route('login') }}">авторизоваться</a>.
        </div>
    </div>
@else
    <div class="container-main" xmlns="http://www.w3.org/1999/html">
        <div class="alert alert-success">
            Ваш комментарий отправлен на проверку модератором.
        </div>
    </div>
@endif