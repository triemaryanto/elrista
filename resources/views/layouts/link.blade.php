<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $description ?? get_setting()->description }}">
    <meta name="keywords" content="{{ $keywords ?? get_setting()->keywords }}">
    <meta name="author" content="{{ $description ?? get_setting()->description }}">
    <title>{{ $title ?? '' }}{{ get_setting()->site_name ?? config('app.name', 'Laravel') }}</title>
    <!-- Favicon -->
    <link rel="icon"
        href="{{ get_setting()->favicon ? route('helper.show-picture', ['path' => get_setting()->favicon]) : asset('multikart_all_in_one/assets/images/favicon/2.png') }}"
        type="image/x-icon">
    <link rel="shortcut icon"
        href="{{ get_setting()->favicon ? route('helper.show-picture', ['path' => get_setting()->favicon]) : asset('multikart_all_in_one/assets/images/favicon/2.png') }}"
        type="image/x-icon">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Core theme CSS -->
    <link rel="stylesheet" href="{{ asset('costum/') }}/linktree.css">
    @stack('css')
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>

<body>
    {{ $slot ?? '' }}
    @livewireScripts
</body>

</html>
