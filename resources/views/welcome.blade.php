<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pizza Get</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('/css1/style.css') }}" />
    </head>
    <body class="antialiased">
        <nav class="colorNavbar navbar sticky-top navbar-expand-lg ">
            <div class="container-fluid">
                <a href="{{ url('') }}" class="navbar-brand font-italic">Pizza Get</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-collapse justify-content-end" id="navbarCollapse">
                    <div class="navbar-nav">
                        
                        @if (Route::has('login'))
                <div class="d-flex hidden fixed top-0 right-0 px-6 py-4 sm:block ">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="link nav-link text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="link nav-link text-sm text-gray-700 dark:text-gray-500 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="link nav-link ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
                    @endif
                    </div>
                </div>
            </div>
        </nav> 
        <main>
            <div class="container mt-4">
                <div class="row">
                    <div>
                        <div>
                            <h1 class="welcome_title">This is <span>Pizza Get</span></h1>
                        </div>
                        <div>
                            <h2 class="welcome_footer">The tastiest pizzas in your city - <span>Kaunas</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer_welcome">
            <div class="footer text-center p-3" >© 2023 Copyright Pijus Černiauskas</div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
