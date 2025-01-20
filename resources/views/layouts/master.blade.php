<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin LTE | @yield('title', 'Dashboard') </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    @includeFirst(['layouts.metadata.requirements'])
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->

    <div class="app-wrapper">

        {{-- Navigation --}}
        @include('layouts.pages.topbar')

        {{-- Dashboard --}}
        @include('layouts.pages.sidebar')

        {{-- Content Section --}}
        <main class="app-main">
            @yield('content')
        </main>

    </div>

    {{-- scripts --}}
    @include('layouts.metadata.scripts')
</body>

</html>