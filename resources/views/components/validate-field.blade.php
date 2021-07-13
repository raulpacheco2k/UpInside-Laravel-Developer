<div>
    @if ($errors->has('name'))
        <div class="alert-{{ $error }}">
            <p class="icon-asterisk">{{ $errors->first('name') }}</p>
        </div>
    @endif
</div>