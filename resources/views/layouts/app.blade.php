<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.partials._head')
    </head>
    <body>
        <div id="app">
            @include('layouts.partials._navigation')
            <div class="container">
                @include('layouts.partials._alerts')
                @yield('content')
            </div>
        </div>

        <!-- Scripts -->
        @include('layouts.partials._footer')
    </body>
</html>
