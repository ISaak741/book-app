<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/index.css" />
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
                <!--
            <form class="input-group ms-5" style="width: 50%" role="search">
            <select class="form-select">
              <option value="">Catégorie</option>
              <option value="">Fiction</option>
              <option value="">Science Fiction</option>
              <option value="">Young Adult</option>
              <option value="">Children's Books</option>
            </select>
            <input
              class="form-control w-50"
              type="search"
              placeholder="Titre du livre"
              aria-label="Search"
            />
            <button class="btn bg-light" type="submit">
              <i class="bi bi-search text-success"></i>
            </button>
          </form>
           -->

                <ul class="navbar-nav ms-auto">
                    @if (session('auth'))
                        @if (session('userType') == 'writer')
                            <li class="nav-item">
                                <a class="btn bg-white px-3 me-2 rounded-4" href="#">Mes Livres Téléversé</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="btn bg-white px-3 me-2 rounded-4" href="#">Ma Liste de Lecture</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown ms-3">
                                <button
                                    style=" color: #000; width: 40px; height:
                        40px; border-radius: 50%; display: flex; justify-content: center; align-items:
                        center; background-color: #ffffff; "
                                    class="btn btn-white text-white dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span
                                        class="text-dark px-1 position-absolute">{{ strtoupper(substr(session()->get('name'), 0, 1)) }}</span>
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
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn bg-white px-3 me-2 rounded-4"
                                href="{{ route('login.form', ['type' => 'reader']) }}">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn text-white px-3"
                                href="{{ route('register', ['type' => 'reader']) }}">S'inscrire</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="bg-lighter p-4 shadow-sm">
            <form class="d-flex justify-content-center align-items-center">
                <div class="d-flex w-75">
                    <div class="form-group me-4 p-3 d-flex align-items-center w-50 justify-content-end">
                        <label class="form-label me-4 mt-2 fs-5 fw-bold text-green">Catégorie</label>
                        <select class="form-select w-75">
                            <option value="">Horror</option>
                            <option value="">Enfant</option>
                            <option value="">Anime</option>
                            <option value="">Romane</option>
                        </select>
                    </div>
                    <div class="form-group me-4 p-3 d-flex align-items-center w-50">
                        <label class="form-label me-4 mt-2 fs-5 fw-bold text-green">Langue</label>
                        <select class="form-select w-75">
                            <option value="">Arabe</option>
                            <option value="">Anglais</option>
                            <option value="">Français</option>
                            <option value="">Espagnol</option>
                        </select>
                    </div>
                </div>
                <div>
                    <button class="btn bg-green-secondary px-4 rounded-4 shadow-sm text-white">
                        Search
                    </button>
                </div>
            </form>
        </div>
        <div class="container">
            @foreach($books as $book)
            <div class="card my-5 border-0">
                <div class="row g-0">
                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                        <img src="./img/books/book-2.jpg" class="img-fluid rounded-start" width="200"
                            height="250" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title fw-bold">{{ $book['title'] }}</h2>
                            <p class="text-body-secondary fs-3">{{$book['genre']}}</p>
                            <p class="fs-6">{{$book['language']}}</p>
                            <p class="card-text mt-3 text-dark">
                                {{$book['description']}}
                            </p>
                            <div class="mt-4 fs-4">
                                <i class="bi bi-star-fill text-green"></i><i class="bi bi-star-fill text-green"></i><i
                                    class="bi bi-star-fill text-green"></i>
                                <i class="bi bi-star text-secondary"></i>
                                <i class="bi bi-star text-secondary"></i>
                                <i class="bi bi-star text-secondary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                        <h3 class="text-end fw-bold">40 Lus</h3>
                    </div>
                </div>
                <hr class="mt-5 text-green" />
            </div>
            @endforeach
        </div>
    </main>
    <footer class="bg-green-secondary d-flex justify-content-center align-items-center"
        style="height: 80px; margin-top: 10rem !important">
        <div class="container d-flex align-items-center justify-content-center">
            <p class="text-white mt-2">@2024 Ghezyid eBook</p>
        </div>
    </footer>
</body>

</html>

<!--
  more catgories :
    - Science
    - Politique
-->
