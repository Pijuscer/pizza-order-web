<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pizza Get</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ url('/css1/style.css') }}" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ url('/css1/style.css') }}" />
    </head>
    <body class="antialiased">
        <nav class="colorNavbar navbar sticky-top navbar-expand-lg ">
        <div class="container-fluid">
                <a href="{{ url('dashboard') }}" class="navbar-brand font-italic">Pizza Get</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav navbar-collapse justify-content-end">
                        @if (auth()->user()->roles==1)
                            <a href="{{ url('/pizzas') }}" class="link nav-link">Add pizza</a>
                            <a href="{{ url('/attachments') }}" class="link nav-link">Attachments</a>
                            <a href="{{ url('/sizes_prices') }}" class="link nav-link">Size and price</a>
                        @else
                        @endif
                        <a href="{{ url('/orders') }}" class="link nav-link">Orders</a>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <button type="submit" class="dropdown-item nav_dropdown">Log out</button>
                                </form>
                            </ul>
                        </div> 
                    </div>
                </div>
            </div>
        </nav> 
        <main>
            <div class="container mt-4">
                <a href="{{ url('/pizzas') }}" class="btn btn-primary btn-lg">Back</a>
                @if (session('message_pizzas_delete'))
                    <div class="alert alert-success">{{session('message_pizzas_delete')}}</div>
                @endif
                @if (session('message_pizzas_edit'))
                    <div class="alert alert-success">{{session('message_pizzas_edit')}}</div>
                @endif
                <h1 class="pizzas text-center p-4">All pizzas</h1>
                <div class="all_pizzas row justify-content-center">
                    <div class="col-lg-8 ">
                        <table class="table table_style" >
                            <thead class="table1">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="th_style">Pizza name</th>
                                <th scope="col" class="th_style">Pizza ingredients</th>
                                <th scope="col" class="th_style">Pizza foto</th>
                                <th scope="col"></th>
                                <th scope="col" class="th_style">Edit</th>
                                <th scope="col" class="th_style">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($pizzas as $pizzas2)
                            <tr class="tr_style">
                                <th scope="row">{{ $pizzas2->id }}</th>
                                <td class="th_style">{{$pizzas2->pizza_name }}</td>
                                <td class="th_style">{{$pizzas2->pizza_ingredients }}</td>
                                <td class="th_style"><img src="{{ asset('storage/'.$pizzas2->pizza_foto) }}" width="50" height="50" class="img img-responsive"/></td>
                                <td>{{ Str::limit($pizzas2->description, 50) }}</td>
                                <td class="th_style">
                                <a class='no-underline btn btn-warning btn-sm' href="/edit_pizzas/edit/{{$pizzas2->id }}">Edit</a>
                                </td>
                                <td class="th_style">
                                <a class='no-underline btn btn-danger btn-sm' href="/all_pizzas/remove/{{$pizzas2->id }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="attachments_footer">
            <div class="footer text-center p-3" >© 2023 Copyright Pijus Černiauskas</div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>