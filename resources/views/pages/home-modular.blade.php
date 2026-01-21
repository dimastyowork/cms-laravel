<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS Asa Bunda - Rumah Sakit Terpercaya</title>
    <meta name="description" content="RS Asa Bunda menyediakan layanan kesehatan berkualitas tinggi dengan fasilitas modern dan tenaga medis profesional.">
    <meta name="keywords" content="rumah sakit, kesehatan, konsultasi dokter, radiologi, laboratorium">

    <!-- Favicons -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    <link href="{{ asset('favicon.ico') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/home-style.css') }}">

    <!-- Vite CSS (jika menggunakan Vite) -->
    @vite(['resources/css/app.css'])

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>

<body>
    <!-- Navbar Component -->
    @include('components.navbar')

    <!-- Hero Section Component -->
    @include('components.hero-section')

    <!-- Services Section Component -->
    @include('components.services')

    <!-- Footer Component -->
    @include('components.footer')

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</body>

</html>
