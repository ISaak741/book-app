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
            <a class="navbar-brand fw-bold fs-4 text-white" href="{{ route('home') }}">Ghezyid eBook</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ms-auto">
                    <div class="dropdown ms-3">
                        <button
                            style=" color: #000; width: 40px; height:
                            40px; border-radius: 50%; display: flex; justify-content: center; align-items:
                            center; background-color: #ffffff; "
                            class="btn btn-white text-white dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="text-dark px-1 position-absolute">{{ 'A' }}</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" style="font-size: 14px" href="{{ route('logout') }}">
                                    <i class="bi bi-box-arrow-left me-2"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="row" style="height: 95vh !important">
        <section class="col-2 bg-lighter shadow p-0">
            <div class="mt-custom">
                <div class="mx-auto px-5 py-2 mb-3">
                    <a href="{{ route('admin.stats') }}"
                        class="text-decoration-none text-start text-dark fs-5">Statistique</a>
                </div>

                <div class="mx-auto px-5 py-2 mb-3 bg-green">
                    <a href="{{ route('admin.readers') }}"
                        class="text-decoration-none text-start text-white fs-5">Liseurs</a>
                </div>
                <div class="mx-auto px-5 py-2 mb-3">
                    <a href="{{ route('admin.writers') }}"
                        class="text-decoration-none text-start text-dark fs-5">Ecrivains</a>
                </div>
                <div class="mx-auto px-5 py-2 mb-3">
                    <a href="{{ route('admin.books') }}"
                        class="text-decoration-none text-start text-dark fs-5">Livres</a>
                </div>
            </div>
        </section>
        <section class="col-10 row g-4 p-5">
            <div class="container">
                <h3 class="text-center">Liseurs</h3>
                <table class="table mt-5 mx-auto table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>Pseudo</th>
                            <th>Adresse</th>
                            <th>Pack</th>
                            <th>Livres Lus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($readers as $reader)
                            <tr>
                                <td>{{ $reader->name }}</td>
                                <td>{{ $reader->email }}</td>
                                @php
                                    $planType = $reader->plans()->first()->planType;
                                @endphp
                                <td>
                                    <div
                                        class="badge {{ $planType == 'Gratuit' ? 'bg-danger' : ($planType == 'Basique' ? 'bg-success' : 'bg-warning') }}">
                                        {{ $planType }}</div>
                                </td>
                                <td>{{ $reader->mylist()->count() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="text-bg-warning text-center">0 livres</div>
                                </td>
                            </tr>
                        @endforelse
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
