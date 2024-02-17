@if ($message = Session::get('success'))
    <div class="alert success-alert">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('danger'))
    <div class="alert danger-alert">
        <p>{{ $message }}</p>
    </div>
@endif
