@include('layouts._include.admin.header')
@include('layouts._include.admin.navbar')

<main id="main" class="main">
    @include('components.alerts')
    @yield('content')
</main>

@include('layouts._include.admin.footer')
