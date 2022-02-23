<!doctype html>
<html lang="en">
@include('layouts.includes.head')
<body>
@include('layouts.includes.nav')

<div class="container">
    @include('layouts.includes.messages')

    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
