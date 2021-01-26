<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Crush it Able The most popular Admin Dashboard template and ui kit">
    <meta name="author" content="PuffinTheme the theme designer">

    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon"/>

    <title>Admin - ObConsultores</title>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.css') }}" />

    <!-- Core css -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/theme4.css') }}" id="stylesheet"/>


    @yield('myStyles')

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
