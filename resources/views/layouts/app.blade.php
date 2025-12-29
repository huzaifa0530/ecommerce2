<!DOCTYPE html>
<html lang="en">
@include('layouts.partial.head')

<body>

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    @include('layouts.partial.nav')
    @include('layouts.partial.header')

    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('layouts.partial.script')
    @stack('scripts')

</body>

</html>