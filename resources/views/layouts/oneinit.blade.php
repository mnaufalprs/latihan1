<!DOCTYPE html>
{{-- <html> --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-8G_I5wm8.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-BLODRgGG.js') }}"> --}}
    <title>Halaman {{ $title }}</title>
</head>
<body>
    {{-- <div class="row justify-content-center">
        <div class="col-md-4">
            
        </div>
    </div> --}}
    
    
    <main class="">
        @yield('LoginClass')
    </main>

    
        @yield('RegisterClass')
    
      
      

{{-- <script src="../../node_modules/flowbite/dist/flowbite.min.js"></script> --}}
{{-- <script src="{{ asset('build/assets/app-BLODRgGG.js') }}"></script> --}}
</body>
</html>