<div>
    @if ($errors->has('name'))
        <div class="mt-3 alert alert-{{ $error }}">
            <p class="icon-asterisk">{{ $errors->first('name') }}</p>
        </div>
    @endif
</div>