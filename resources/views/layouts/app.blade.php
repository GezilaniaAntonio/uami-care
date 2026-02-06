<!DOCTYPE html>
<html lang="pt">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Uami Care Admin</title>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('admin/login/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/login/assets/css/style.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/img/uami.png') }}">
</head>
<body>

    {{-- CONTEÚDO DAS PÁGINAS --}}
    @yield('content')

    <!-- ===== JS ===== -->
    <script src="{{ asset('admin/login/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/login/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/login/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin/login/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin/login/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('admin/login/assets/js/jquery.cookie.js') }}"></script>

</body>
</html>
