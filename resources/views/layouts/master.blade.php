<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Document')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
    display: flex;
    flex-direction: column;
    height: 80vh;
}

.container-fluid {
    flex: 1;
    display: flex;
    flex-direction: row;
}

.main-content {
    order: 1; /* Ensures that main content is at the top in case there are flex issues */
}

.footer {
    order: 2;
}

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Left Column: Navbar (Loaded from a partial) -->
            <div class="col-md-3 col-lg-2 bg-light vh-100 p-3">
                @include('partials.nav')
            </div>

            <!-- Right Column: Main Content -->
            <div class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <!-- Main content should be on top -->
                <main>
                    @yield('main')
                </main>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
