<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Kasir Minimarket</span>

            <div class="text-white">
                <strong>{{ session('username') }}</strong>
                <small class="ms-2 badge bg-primary">{{ session('role') }}</small>
                <small class="ms-2 badge bg-primary">{{ session('id') }}</small>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        @yield('content')
    </div>

</body>
</html>
