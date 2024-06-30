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

<body>
    <nav class="navbar navbar-expand-lg border-bottom-grey px-5 shadow-sm bg-green-secondary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-4 text-white" href="{{ route('home') }}">Ghezyid eBook</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    @if (session('auth'))
                        @if (session('userType') == 'writer')
                            <li class="nav-item">
                                <a class="nav-link text-light px-3 me-2" href="{{ route('books.uploaded') }}">Mes
                                    Livres Téléversé</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light px-3 me-2"
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
        <header class="d-flex justify-content-between align-items-center"
            style="height: 100vh !important ; padding-bottom: 10rem">
            <div class="w-50">
                <div class="container mt-5 p-5 ms-5">
                    <h1 class="mt-5 fw-bolder text-blue">
                        Bienvenue sur Ghezyid eBook
                    </h1>
                    <p class="lh-2 fs-5 fw-light text-secondary my-4 w-100">
                        Explorez un monde histoire captivante avec
                        <span class="fw-bold">Ghezyid eBook</span>
                        <br />
                        Votre destination pour des ebooks qui inspirent,
                        <br />divertissent et enrichissent votre esprit.
                    </p>
                    <a href="{{ route('books.search') }}" class="btn px-3 py-2 text-white bg-green custom-shadow">
                        Commence votre lecture
                    </a>
                </div>
            </div>
            <div class="w-50 overflow-hidden">
                <div class="container d-flex justify-content-center">
                    <img src="./img/man-1.png" width="800" height="500" class="mt-5"
                        style="margin-right: 200px !important" />
                </div>
            </div>
        </header>
        <section class="container mb-5">
            <div class="d-flex justify-content-between align-items-center container px-4">
                <div class="text-bg-white rounded rounded-4 px-5 py-4 custom-shadow">
                    <h6 class="py-2 px-5 text-green f-s-5">Nos catégories</h6>
                </div>
                <div class="text-bg-white rounded rounded-4 px-5 py-4 custom-shadow">
                    <h6 class="py-2 px-5 text-green f-s-5">A propos de nous</h6>
                </div>
                <div class="text-bg-white rounded rounded-4 px-5 py-4 custom-shadow">
                    <h6 class="py-2 px-5 text-green f-s-5">Contactez-nous</h6>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center" style="margin: 8rem 0 7rem">
                <div class="w-50 d-flex justify-content-center">
                    <img src="./img/line.png" width="700" height="5" />
                </div>
            </div>
        </section>

        <section class="my-5 py-4 container">
            <h5 class="text-center text-green fw-bold mb-5">Nos Catégories</h5>
            <div class="row g-2">
                @foreach ($categories as $category)
                    <div class="col-4">
                        <div class="p-2 border border-1 rounded-1 d-flex">
                            <div class="category-img">
                                <img src="{{ asset('storage/' . $category?->picture) }}" width="120"
                                    height="120" />
                            </div>
                            <div class="category-content mx-auto d-flex flex-column">
                                <h6 class="pt-3 text-secondary fw-bold f-s-5">{{ $category->name }}</h6>
                                <p class="f-s-1 mt-auto text-secondary mb-0">
                                    {{ "$category->books_count Livres Disponible" }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="container">
                <button class="mt-4 mx-auto btn d-block">
                    <img src="./img/more.jpg" width="40" height="40" alt="" />
                </button>
            </div> --}}
            <div class="w-50 d-flex justify-content-center mx-auto my-5">
                <img src="./img/line.png" width="700" height="5" />
            </div>
        </section>
        <section class="my-5 py-4 container">
            <div>
                <h5 class="text-center text-green fw-bold mb-5">A propos de nous</h5>
                <div class="d-flex align-items-center rounded-2 custom-shadow p-4">
                    <div class="porpos-img d-flex justify-content-center w-25">
                        <img src="./img/logo.jpg" width="150" height="200" alt="" />
                    </div>
                    <div
                        class="justify-content-center d-flex border border-end-0 border-top-0 border-bottom-0 py-2 px-5 w-75">
                        <div class="wrapper">
                            <h1 class="text-green fw-bold">Ghezyid eBook</h1>
                            <div class="f-s-2 text-secondary">
                                <p class="mb-4">
                                    Bienvenue sur <span class="fw-bold">Ghezyid eBook</span>,
                                    votre destination incontournable pour les livres en ligne!
                                    <br />
                                    Nous offrons une expérience de lecture numérique moderne et
                                    accessible, <br />
                                    conçue pour répondre aux besoins de tous les passionnés de
                                    littérature. <br />
                                    Avec une vaste gamme de titres disponibles et des offres
                                    attractives, <br />
                                    nous facilitons l'accès à une lecture enrichissante et
                                    flexible.
                                    <br />
                                </p>
                                <p class="mb-4">
                                    Notre Mission <br />
                                    Chez <span class="fw-bold">Ghezyid eBook</span>, nous
                                    croyons que la lecture est une porte ouverte sur de <br />
                                    nouvelles idées, cultures, et perspectives. Notre mission
                                    est de rendre cette expérience <br />
                                    aussi simple et agréable que possible en proposant : <br />
                                </p>
                                <p>
                                    <span class="text-green fw-bold">Une Large Sélection :</span>
                                    Explorez notre collection diversifiée qui comprend des
                                    romans,
                                    <br />
                                    des thrillers, des ouvrages de non-fiction, des classiques,
                                    des livres pour enfants, et <br />
                                    bien plus encore. <br />
                                    <span class="text-green fw-bold">Accès Facile :</span> Lisez
                                    vos livres préférés directement sur vos compte et , Nos
                                    e-books
                                    <br />
                                    sont compatibles avec toutes les principales plateformes et
                                    appareils de lecture. <br />
                                    <span class="text-green fw-bold">Offres Spéciales :</span>
                                    Profitez de nos offres flexibles et de nos abonnements
                                    adaptés à
                                    <br />
                                    vos habitudes de lecture. Que vous soyez un lecteur
                                    occasionnel ou un passionné <br />
                                    insatiable, nous avons une offre qui correspond à vos
                                    besoins.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="my-5 text-center text-green fw-bold">
                    Pourquoi Choisir Ghezyid eBook ?
                </h2>
                <p class="text-center fs-6 text-secondary mb-4">
                    <span class="text-green fw-bold">Accès Immédiat :</span>
                    Lisez vos livres préférés dès l'achat, directement sur notre site,
                    <br />
                    sans attente ni téléchargement.
                </p>
                <p class="text-center fs-6 text-secondary mb-4">
                    <span class="text-green fw-bold">Prix Compétitifs : </span>
                    Profitez de nos offres et promotions régulières pour économiser tout
                    <br />
                    en accédant à une large gamme de lectures.
                </p>
                <p class="text-center fs-6 text-secondary mb-4">
                    <span class="text-green fw-bold"> Interface Intuitive : </span>
                    Notre site est conçu pour une navigation fluide et intuitive, <br />
                    vous permettant de trouver et de lire vos livres facilement.
                </p>
                <p class="text-center fs-6 text-secondary mb-4">
                    <span class="text-green fw-bold"> Paiement Sécurisé :</span>
                    Réalisez vos achats en toute confiance grâce <br />
                    à notre système de paiement sécurisé et pratique.
                </p>
            </div>
            <div class="w-50 d-flex justify-content-center mx-auto my-5">
                <img src="./img/line.png" width="700" height="5" />
            </div>
        </section>
        <section class="my-5 py-4 container">
            <h5 class="text-center text-green fw-bold mb-5">Contactez-nous</h5>
            <form class="d-flex p-4 rounded-4"
                style="
            background: url('./img/contact-bg.png') !important ;
            background-size: cover !important;
            background-repeat: no-repeat !important;
          ">
                <div class="w-50 align-self-end">
                    <div class="wrapper" style="margin-bottom: 8rem !important">
                        <div class="mb-4">
                            <h5 class="text-green fw-bold">Emplacement</h5>
                            <p>Sidi Bel Abbes , Algérie</p>
                        </div>
                        <div>
                            <h5 class="text-green fw-bold">Souivez Nous</h5>
                            <img src="./img/social.png" width="200" height="45" alt="" />
                        </div>
                    </div>
                    <div class="f-s-2">@ 2024 Politique de confidentialité</div>
                </div>
                <div class="w-50">
                    <h3 class="text-green mb-3 fw-bold">Formulaire de contact</h3>
                    <input type="text" class="form-control mb-3" placeholder="Entrez votre nom" />
                    <input type="email" class="form-control mb-3"
                        placeholder="Entrez votre adresse e-mail valide" />
                    <textarea class="form-control mb-3" id="" placeholder="Entrez votre message" rows="10"></textarea>
                    <button class="btn bg-white custom-shadow px-4">Soumettre</button>
                </div>
            </form>
        </section>
    </main>
    <footer class="bg-green-secondary d-flex justify-content-center align-items-center" style="height: 80px">
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
