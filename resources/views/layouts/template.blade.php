<!DOCTYPE html>
<html lang="en">

@include('frontend.fixed.head')

<body>

<!-- #region HEADER - logo + navigation menu-->
@include('frontend.fixed.nav')
<!--#endregion-->


<!--Content -->
@yield('content')

<!-- #region FOOTER-->
@include('frontend.fixed.footer')
<!-- #endregion FOOTER-->

<!-- Js -->
@include('frontend.fixed.scripts')

@yield('javascript')
</body>
</html>
