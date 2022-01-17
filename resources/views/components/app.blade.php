<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ZiddKh">
    <meta name="description" content="Laundry Web Application">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    @if($title != Null)
    <title>{{ $title }} - ZiLaundry</title>
    @else
    <title>ZiLaundry</title>
    @endif
    <x-link></x-link>
</head>
<body class="g-sidenav-show bg-gray-200">
    <x-aside></x-aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbar></x-navbar>
        <div class="container-fluid py-4">
            {{ $slot }}
            <x-footer></x-footer>
        </div>
    </main>
    <x-script></x-script>
    {{ $script }}
</body>
</html>