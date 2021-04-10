<!DOCTYPE html>
<html lang="en">

@include('admin.fixed.head')

<body>

@include('admin.fixed.header')

<div class="row col-lg-12 pl-0" id="middle-admin">
    @include('admin.fixed.nav')
    @yield('content')
</div>


@include('admin.fixed.scripts')

@yield('adminScripts')
</body>
</html>
