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
                                <a class="nav-link text-light px-3 me-2" href="{{ route('books.uploaded') }}">Mes
                                    Livres Téléversé</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light px-3 me-2 rounded-3"
                                    href="{{ route('book.upload.form') }}">Téléverser un Livre</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link text-light px-3 me-2" href="{{ route('books.reading') }}">Ma Liste de
                                Lecture</a>
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
        <section class="container">
            <div class="card my-5 border-0">
                <div class="row g-0">
                    <div class="col-md-4 p-3 border border-1 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/books/book-2.jpg') }}" class="img-fluid rounded-start" width="250"
                            height="300" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title fw-bold">{{$book->title}}</h2>
                            <p class="text-body-secondary fs-3">{{$book->genre}}</p>
                            <p class="fs-6">{{$book->language}}</p>
                            <p class="card-text mt-3 text-dark">
                                {{$book->description}}
                            </p>
                            <div>
                            <form id="add-to-list-form" action="{{ route('mylist.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <button class="btn bg-green px-4 mt-5 text-white shadow fw-bold">
                                    Ajouter
                                </button>
                            </form>
                            </div>
                            <div class="mt-4 fs-4">
                                <i class="bi bi-star-fill text-green"></i><i class="bi bi-star-fill text-green"></i><i
                                    class="bi bi-star-fill text-green"></i>
                                <i class="bi bi-star text-secondary"></i>
                                <i class="bi bi-star text-secondary"></i>
                                <i class="bi bi-star text-secondary"></i>
                                <span class="ms-4 text-green"> 3 / 6 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <img src="{{ asset('img/line.png') }}" width="700" height="5" />
            </div>
        </section>
        <section class="container">
            <h5 class="text-center text-green fw-bold my-5">Livres Similaire</h5>
            <div class="d-flex justify-content-between mb-5">
                <div class="w-20 d-flex justify-content-center align-items-center" style="height: 25rem !important">
                    <img src="{{ asset('img/books/book-1.jpeg') }}" width="250" height="400" alt="" />
                </div>
                <div class="w-20 p-2 d-flex justify-content-center align-items-center"
                    style="height: 25rem !important">
                    <img src="{{ asset('img/books/book-3.jpg') }}" width="250" height="400" alt="" />
                </div>
                <div class="w-20 p-2 d-flex justify-content-center align-items-center"
                    style="height: 25rem !important">
                    <img src="{{ asset('img/books/book-4.jpg') }}" width="250" height="400" alt="" />
                </div>
                <div class="w-20 p-2 d-flex justify-content-center align-items-center"
                    style="height: 25rem !important">
                    <img src="{{ asset('img/books/book-5.jpg') }}" width="250" height="400" alt="" />
                </div>
            </div>
        </section>
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
