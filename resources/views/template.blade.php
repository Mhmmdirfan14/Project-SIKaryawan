<!DOCTYPE html>
<html lang="en">

@include('partials._head')


<body>
    @include('partials._nav')

    @includeIf('partials._sidebar')
    <main id="main" class="main">
        @yield('content')
    </main>
    <!-- End #main -->

    @include('partials._footer')

    @include('partials._scripts')
</body>

</html>
