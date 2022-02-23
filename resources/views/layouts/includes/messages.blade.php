@if(session()->has('success'))
    <div class="alert alert-success">
        <p>{{ session()->get('success') }}</p>
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger">
        <p>{{ session()->get('error') }}</p>
    </div>
@endif
