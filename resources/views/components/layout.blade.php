<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presto.it</title>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Roboto:ital,wght@0,100..900;1,100..900&family=Tiny5&display=swap" rel="stylesheet">
    
    
    <!-- Swiper CSS -->
    <link
    rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>    
    
    {{-- navbar --}}
    <x-navbar/>
    {{-- navbar end --}}
    
    {{$slot}}

    <!-- footer -->
    <x-footer/>
    <!-- footer end -->
    
    
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7612e640f7.js" crossorigin="anonymous"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    @livewireScripts
</body>

</html>