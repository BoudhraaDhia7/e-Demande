@if (session()->get('success'))
    <div class="alert alert-success mb-3">
        {{ session()->get('success') }}
    </div>
@endif
@if (session()->get('danger'))
    <div class="alert alert-danger mb-3">
        {{ session()->get('danger') }}
    </div>
@endif
@if (session()->get('warning'))
    <div class="alert alert-warning mb-3">
        {{ session()->get('warning') }}
    </div>
@endif
<div class="from-group has-danger">
    @if ($errors->has('username'))
        <div class="alert alert-danger mb-3">
            <span id="name-error" class="error" for="input-name">{{ $errors->first('username') }}</span>
        </div>
    @endif
    @if ($errors->has('password'))
        <div class="alert alert-danger mb-3">
            <span id="name-error" class="error" for="input-name">{{ $errors->first('password') }}</span>
        </div>
    @endif
    @if ($errors->has('name'))
        <div class="alert alert-danger mb-3">
            <span id="name-error" class="error" for="input-name">{{ $errors->first('name') }}</span>
        </div>
    @endif
    @if ($errors->has('email'))
        <div class="alert alert-danger mb-3">
            <span id="name-error" class="error" for="input-name">{{ $errors->first('email') }}</span>
        </div>
    @endif
    @if ($errors->has('cin'))
        <div class="alert alert-danger mb-3">
            <span id="name-error" class="error" for="input-name">{{ $errors->first('cin') }}</span>
        </div>
    @endif
</div>
<br>