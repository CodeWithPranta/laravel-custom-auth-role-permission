<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Posts</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="{{route('user.logout')}}" method="post">
                        @csrf
                        <button type="submit" class="nav-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="container-fluid mb-5">
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


    <!-- Bootstrap 5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
