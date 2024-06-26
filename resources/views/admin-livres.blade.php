<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body class="overflow-x-hidden">
    <nav class="navbar navbar-expand-lg border-bottom-grey px-5 shadow-sm bg-green-secondary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-4 text-white" href="#">Ghezyid eBook</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn bg-white px-3 me-2 rounded-4" href="#">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn text-white" href="#">S'inscrire</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="row" style="height: 95vh !important">
        <section class="col-2 bg-lighter shadow p-0">
            <div class="mt-custom">
                <div class="mx-auto px-5 py-2 mb-3">
                    <a href="./admin-stat.html" class="text-decoration-none text-start text-dark fs-5">Statistique</a>
                </div>

                <div class="mx-auto px-5 py-2 mb-3">
                    <a href="./admin-liseur.html" class="text-decoration-none text-start text-dark fs-5">Liseurs</a>
                </div>
                <div class="mx-auto px-5 py-2 mb-3">
                    <a href="./admin-ecrivain.html" class="text-decoration-none text-start text-dark fs-5">Ecrivains</a>
                </div>
                <div class="mx-auto px-5 py-2 mb-3 bg-green">
                    <a href="./admin-livres.html" class="text-decoration-none text-start text-white fs-5">Livres</a>
                </div>
            </div>
        </section>
        <section class="col-10 row g-4 p-5">
            <div class="container">
                <h3 class="text-center">Livres</h3>
                <table class="table mt-5 mx-auto table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>Titre</th>
                            <th>Ecrivain</th>
                            <th>Caégorie</th>
                            <th>N: Lecteur</th>
                            <th>Avis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Wolf Hunter</td>
                            <td>Georges Millain</td>
                            <td>Horror</td>
                            <td>250</td>
                            <td>3.5/5</td>
                        </tr>
                        <tr>
                            <td>Wolf Hunter</td>
                            <td>Georges Millain</td>
                            <td>Horror</td>
                            <td>250</td>
                            <td>3.5/5</td>
                        </tr>
                        <tr>
                            <td>Wolf Hunter</td>
                            <td>Georges Millain</td>
                            <td>Horror</td>
                            <td>250</td>
                            <td>3.5/5</td>
                        </tr>
                        <tr>
                            <td>Wolf Hunter</td>
                            <td>Georges Millain</td>
                            <td>Horror</td>
                            <td>250</td>
                            <td>3.5/5</td>
                        </tr>
                        <tr>
                            <td>Wolf Hunter</td>
                            <td>Georges Millain</td>
                            <td>Horror</td>
                            <td>250</td>
                            <td>3.5/5</td>
                        </tr>
                        <tr>
                            <td>Wolf Hunter</td>
                            <td>Georges Millain</td>
                            <td>Horror</td>
                            <td>250</td>
                            <td>3.5/5</td>
                        </tr>
                        <tr>
                            <td>Wolf Hunter</td>
                            <td>Georges Millain</td>
                            <td>Horror</td>
                            <td>250</td>
                            <td>3.5/5</td>
                        </tr>
                        <tr>
                            <td>Wolf Hunter</td>
                            <td>Georges Millain</td>
                            <td>Horror</td>
                            <td>250</td>
                            <td>3.5/5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <!-- <footer
      class="bg-green-secondary d-flex justify-content-center align-items-center"
      style="height: 80px"
    >
      <div class="container d-flex align-items-center justify-content-center">
        <p class="text-white mt-2">@2024 Ghezyid eBook</p>
      </div>
    </footer> -->
</body>

</html>

<!--
  more catgories :
    - Science
    - Politique
-->
