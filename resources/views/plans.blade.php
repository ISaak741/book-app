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
    <div class="container">
        <div class="my-5 text-center">
            <h3 class="text-green-seconadry text-center" style="font-weight: 100 !important">
                Nos offres d'abonnement
            </h3>
            <h4 class="fw-bold text-green-seconadry text-uppercase mb-3">
                Ghezyid eBook
            </h4>
            <p>Sélecionez le pack qui vous convient le mieux</p>
        </div>
        <div class="row g-3 my-5">
            <div class="col-4">
                <form method="POST" action="{{ route("register.$type.submit") }}"
                    class="rounded-3 text-center rounded-3 shadow py-3 w-75 mx-auto">
                    @csrf
                    <input type="hidden" name="pack-type" value="gratuit">
                    <h2 class="text-danger my-3 fw-bold">GRATUIT</h2>
                    <p class="my-5 fs-4">
                        <span class="text-green-seconadry"><span><i class="bi bi-check me-3"></i></span>2</span>
                        <span>Livres</span>
                    </p>
                    @if ($type == 'writer')
                        <p class="my-5 fs-4">
                            <span class="text-green-seconadry"><span><i class="bi bi-check me-3"></i></span><i
                                    class="bi bi-infinity"></i></span>
                            <span>Téléverser Livres</span>
                        </p>
                    @endif
                    <span class="text-secondary fs-2"><span class="fw-bold">0</span> <sub>DA</sub>
                    </span>
                    <button class="d-block mx-auto my-5 btn bg-success px-5 text-white fw-bold">
                        Choisir
                    </button>

                </form>
            </div>
            <div class="col-4">
                <div class="rounded-3 text-center rounded-3 shadow py-3 w-75 mx-auto">
                    @csrf
                    <input type="hidden" name="pack-type" value="basique">
                    <h2 class="text-green-seconadry my-3 fw-bold">BASIQUE</h2>
                    <p class="my-5 fs-4">
                        <span class="text-green-seconadry"><span><i class="bi bi-check me-3"></i></span>20</span>
                        <span>Livres</span>
                    </p>
                    @if ($type == 'writer')
                        <p class="my-5 fs-4">
                            <span class="text-green-seconadry"><span><i class="bi bi-check me-3"></i></span><i
                                    class="bi bi-infinity"></i></span>
                            <span>Téléverser Livres</span>
                        </p>
                    @endif
                    <span class="text-secondary fs-2"><span class="fw-bold">3 999</span> <sub>DA / Année</sub>
                    </span>
                    <button style="margin-top: 5rem !important"
                        class="d-block mx-auto my-5 btn bg-success px-5 text-white fw-bold" data-bs-toggle="modal"
                        data-bs-target="#paymentFormBasique">
                        Choisir
                    </button>
                </div>
            </div>
            <div class="col-4">
                <div class="rounded-3 text-center rounded-3 shadow py-3 w-75 mx-auto">
                    <input type="hidden" name="pack-type" value="premium">
                    <h2 class="text-warning my-3 fw-bold">PREMIUM</h2>
                    <p class="my-5 fs-4">
                        <span class="text-green-seconadry"><span><i class="bi bi-check me-3"></i></span><i
                                class="bi bi-infinity"></i></span>
                        <span>Livres</span>
                    </p>
                    @if ($type == 'writer')
                        <p class="my-5 fs-4">
                            <span class="text-green-seconadry"><span><i class="bi bi-check me-3"></i></span><i
                                    class="bi bi-infinity"></i></span>
                            <span>Téléverser Livres</span>
                        </p>
                    @endif
                    <span class="text-secondary fs-2"><span class="fw-bold">7 999</span> <sub>DA / Année</sub>
                    </span>
                    <button class="d-block mx-auto my-5 btn bg-success px-5 text-white fw-bold" data-bs-toggle="modal"
                        data-bs-target="#paymentFormPremium">
                        Choisir
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<form class="modal fade" id="paymentFormBasique" method="POST" action="{{ route("register.$type.submit") }}"
    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @csrf
    <input type="hidden" name="pack-type" value="basique">
    <div class="modal-dialog modal-lg">
        <div class="modal-content mx-auto">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Confirmer Le Payement
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-5">
                    <h2 class="text-center">
                        <span class="text-blue text-uppercase me-3 fw-bold">total</span>
                        <span class="text-secondary"><span class="fw-bold">3 999</span> <sub>DA</sub></span>
                    </h2>
                </div>
                <div class="form-group d-flex align-items-center mb-2">
                    <label for="card" class="form-label w-35 me-1">Numéro de la carte de crédit</label>
                    <input id="card" type="number" class="form-control w-50" maxlength="16" required />
                </div>
                <div class="form-group d-flex align-items-center mb-2">
                    <label class="form-label w-35 me-1">Date d'expiration</label>
                    <div class="d-flex w-35">
                        <select class="form-select" required>
                            <option value="1">Jan</option>
                            <option value="2">Fev</option>
                            <option value="3">Mar</option>
                            <option value="4">Avr</option>
                            <option value="5">Mai</option>
                            <option value="6">Jui</option>
                            <option value="7">Juil</option>
                            <option value="8">Aut</option>
                            <option value="9">Sep</option>
                            <option value="10">Oct</option>
                            <option value="12">Nov</option>
                            <option value="12">Dec</option>
                        </select>
                        <select class="form-select ms-1" required>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                            <option value="2032">2032</option>
                        </select>
                    </div>
                </div>
                <div class="form-group d-flex align-items-center mb-2">
                    <label for="name" class="form-label w-35 me-1">Votre nom</label>
                    <input id="name" type="text" class="form-control w-50" required />
                </div>
                <div class="form-group d-flex align-items-center mb-2">
                    <label for="code" class="form-label w-35 me-1">Entrez le code CVC2/CVV2</label>
                    <input id="code" type="password" class="form-control w-50" maxlength="3" required />
                </div>
                <div class="d-flex justify-content-center mt-5 mb-3">
                    <button type="submit" class="btn bg-green me-2 px-3 rounded-2 text-white">
                        Confirmer
                    </button>
                    <button type="reset" class="btn btn-secondary px-3 rounded-2">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<form class="modal fade" id="paymentFormPremium" method="POST" action="{{ route("register.$type.submit") }}"
    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @csrf
    <input type="hidden" name="pack-type" value="premium">
    <div class="modal-dialog modal-lg">
        <div class="modal-content mx-auto">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Confirmer Le Payement
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-5">
                    <h2 class="text-center">
                        <span class="text-blue text-uppercase me-3 fw-bold">total</span>
                        <span class="text-secondary"><span class="fw-bold">7 999</span> <sub>DA</sub></span>
                    </h2>
                </div>
                <div class="form-group d-flex align-items-center mb-2">
                    <label for="card" class="form-label w-35 me-1">Numéro de la carte de crédit</label>
                    <input id="card" type="number" class="form-control w-50" maxlength="16" required />
                </div>
                <div class="form-group d-flex align-items-center mb-2">
                    <label class="form-label w-35 me-1">Date d'expiration</label>
                    <div class="d-flex w-35">
                        <select class="form-select" required>
                            <option value="1">Jan</option>
                            <option value="2">Fev</option>
                            <option value="3">Mar</option>
                            <option value="4">Avr</option>
                            <option value="5">Mai</option>
                            <option value="6">Jui</option>
                            <option value="7">Juil</option>
                            <option value="8">Aut</option>
                            <option value="9">Sep</option>
                            <option value="10">Oct</option>
                            <option value="12">Nov</option>
                            <option value="12">Dec</option>
                        </select>
                        <select class="form-select ms-1" required>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                            <option value="2032">2032</option>
                        </select>
                    </div>
                </div>
                <div class="form-group d-flex align-items-center mb-2">
                    <label for="name" class="form-label w-35 me-1">Votre nom</label>
                    <input id="name" type="text" class="form-control w-50" required />
                </div>
                <div class="form-group d-flex align-items-center mb-2">
                    <label for="code" class="form-label w-35 me-1">Entrez le code CVC2/CVV2</label>
                    <input id="code" type="password" class="form-control w-50" maxlength="3" required />
                </div>
                <div class="d-flex justify-content-center mt-5 mb-3">
                    <button type="submit" class="btn bg-green me-2 px-3 rounded-2 text-white">
                        Confirmer
                    </button>
                    <button type="reset" class="btn btn-secondary px-3 rounded-2">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </div>

</form>

<!--
  more catgories :
    - Science
    - Politique
-->
