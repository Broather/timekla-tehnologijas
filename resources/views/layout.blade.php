<!doctype html>
<html lang="lv">

    <head>
        <meta charset="utf-8">
        <title>PD 2 - {{ $title }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>

    <body>
        <div class="bg-light mb-4 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <header class="navbar navbar-light">
                            <span class="navbar-brand mb-0 h1">Markuss Grinhāgens</span>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-4">
            <div class="row">
                <main class="col-md-12">
                    @yield('content')
                </main>
            </div>
        </div>
        <div class="bg-primary text-white py-4 mt-4">
            <div class="container">
                <div class="row">
                    <footer class="col-md-12">
                        Ventspils Augstskola, 2022
                    </footer>
                </div>
            </div>
        </div>
    </body>

</html>