<!DOCTYPE html>
<html lang="en">
@include('layouts.frontend.partial.head')

<body>



    @include('layouts.frontend.partial.header')


    @yield('content')

    @include('layouts.frontend.partial.footer')
    @include('layouts.frontend.partial.script')
    @stack('scripts')

</body>

</html>