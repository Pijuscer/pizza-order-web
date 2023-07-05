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
            <div class="container container_edit_sizes_prices mt-4">
                <div class="d-flex justify-content-center">
                  <div class="col-md-10">
                    <a href="{{ url('/all_sizes_prices') }}" class="btn btn-primary btn-lg atgal">Back</a>
                    <h1 class="edit_sizes_prices text-center p-4">Edit pizza size and price</h1>
                      @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                      <form action="" method="POST" class="row g-3 transboxaboutadd sizes_prices_edit_form">
                        @csrf
                          <div class="col-md-6 label_input">
                            <label for="pizza_size" class="form-label add_label_text">Pizza size</label>
                            <input value="{{ $sizeprices->pizza_size}}" type="text" class="form-control" placeholder="Pizza size" aria-label="pizza_size" id="pizza_size" name="pizza_size">
                          </div>
                          <div class="col-md-6 label_input">
                            <label for="pizza_price" class="form-label add_label_text">Attachment price</label>
                            <input value="{{ $sizeprices->pizza_price }}" type="text" class="form-control" placeholder="Pizza price" aria-label="pizza_price" id="pizza_price" name="pizza_price">
                          </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end button_save">
                            <button type="submit" class="btn btn-success btn-lg">Save</button>
                        </div>
                      </form>
                      </div>           
                  </div>
              </div>
        </main>
        <footer>
            <div class="footer text-center p-3" >© 2023 Copyright Pijus Černiauskas</div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>