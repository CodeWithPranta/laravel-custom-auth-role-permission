<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>বারুইকাটি- আমার গ্রাম</title>
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="bootstrap" viewBox="0 0 118 94">
          <title>Bootstrap</title>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
        </symbol>
        <symbol id="facebook" viewBox="0 0 16 16">
          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
        </symbol>
    </svg>

    <header class="bg-light">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand text-danger" href="{{route('home')}}">বারুইকাটি</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <form class="d-flex mx-auto my-3 my-lg-0">
                <input class="form-control me-2" type="search" placeholder="আপনার শব্দটি লিখুন" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">খুঁজুন</button>
              </form>
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('home')}}">আমাদের সম্পর্কে</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">যোগাযোগ</a>
                </li>

                @if (Route::has('user.authenticate'))
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                      <li><a class="dropdown-item" href="#">আমার প্রোফাইল</a></li>
                      <li><a class="dropdown-item" href="#">এডিট প্রোফাইল</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <form action="{{route('user.logout')}}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">লগআউট</button>
                        </form>
                      </li>
                    </ul>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('user.login')}}">লগিন</a>
                  </li>
                  @if (Route::has('user.register'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('user.register')}}">রেজিস্টার</a>
                  </li>
                  @endif
                  @endauth
                @endif

              </ul>
            </div>
          </nav>
        </div>
    </header>


    <div class="container">
        @yield('content')
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-wrapper">
                    <div class="container">
                      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-5 border-top">
                        <div class="col-md-4 d-flex align-items-center">
                          <span class="text-muted">&copy; 2023, প্রান্ত মজুমদার</span>
                        </div>

                        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                          <li class="ms-3"><a class="text-muted" href="https://facebook.com/webmastermazumder"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                        </ul>
                      </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
