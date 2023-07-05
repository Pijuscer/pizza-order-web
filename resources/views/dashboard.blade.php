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
                <div class="row">
                    <div>
                        <div>
                            <h1 class="welcome_title">This is <span>Pizza Get</span></h1>
                        </div>
                        <div>
                            <h2 class="welcome_footer">The tastiest pizzas in your city - <span>Kaunas</span></h2>
                        </div>
                        @if (session('message_orders_add'))
                        <div class="alert alert-success">{{session('message_orders_add')}}</div>
                        @endif
                    </div>
                    <div class="row ">
                        @foreach ($pizzas as $pizza)
                        <form action="/orders" method="POST" class="col-sm mx-auto d-flex justify-content-center form_style">
                        @csrf
                            <div class="card card_style  " style="width: 20rem;">
                                <img src="{{ asset('storage/'.$pizza->pizza_foto) }}" class="card-img-top pizzas_dashboard" alt="..." name="pizza_foto">
                                <div class="card-body">
                                    <h5 class="card-title dashboard_card_title">{{$pizza->pizza_name}}</h5>
                                    <input hidden name="pizza_id" value="{{$pizza->id}}">
                                    <p class="card-text dashboard_card_text">{{$pizza->pizza_ingredients}}</p>
                                </div>
                                <h5 class="card-title dashboard_card_title2">Pizza size</h5>
                                <div class="d-flex flex-row check_input mx-auto">
                                    @foreach ($sizeprices as  $key=>$sizeprice)
                                        <div class="form-check dashboard_form_check">
                                            <input class="form-check-input" type="radio" name="pizza_size" value="{{$key+1}}">
                                            <label class="form-check-label">
                                                {{$sizeprice->pizza_size}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <h5 class="card-title dashboard_card_title2">Additional ingredients</h5>
                                <div class="d-flex flex-row mx-auto">
                                    @foreach ($attachments as $key=>$attachment)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="pizza_attachments_id[]" value="{{$key+1}}">
                                            <label class="form-check-label">
                                                {{$attachment->attachment_name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-success btn-lg">Buy</button>
                            </div>
                            </form>
                        @endforeach
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
