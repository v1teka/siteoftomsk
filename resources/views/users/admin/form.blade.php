@can('update', $user)
    <form method="POST" action="{{ route('users.admin.update', $user) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label class="form-group__label" for="roles">Роли</label>
            <select class="select select-multiply {{ $errors->has('roles') ? 'select_has-error' : '' }}" multiple="multiple" id="roles" name="roles[]">
                @foreach ($roles as $role)
                    <option class="select__option" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @if($errors->has('roles'))
                <div class="form-group__message form-group__message--error">{{ $errors->first('roles') }}</div>
            @endif
        </div>
        <div class="form-group">
            <button class="button button_success" type="submit">Сохранить</button>
        </div>
    </form>
@else
    <div class="form-group">
        <label class="form-group__label">Роли</label>
        @if($user->roles->count())
            <div class="form-group__value">
                {!! $user->rolesToStr('<br>') !!}
            </div>
        @else
            <div class="form-group__value">Нет назначенных ролей</div>
        @endif
    </div>
@endcan
