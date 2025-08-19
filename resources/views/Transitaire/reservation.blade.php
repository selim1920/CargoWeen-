<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CargoWeen</title>
    <link href="assets/img/icone-logo.png" rel="icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-ZrW89lTmTUNwSKaPhKApDu4fl4+42D4ne/L0FPiJ+tYX+PViZdSb0q5O5f5p5xHx5e5x5l2BtR1bLal8Zt7dOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets1/css/bootstrap.css">

    <link rel="stylesheet" href="assets1/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets1/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets1/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets1/css/app.css">
    <link rel="shortcut icon" href="assets1/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/"><img src="assets/img/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>


                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-badge-fill"></i>
                                <span>Authentication</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="/profile">Settings</a>
                                </li>

                                <li class="submenu-item ">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-responsive-nav-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-responsive-nav-link>
                                    </form>
                                </li>
                            </ul>
                        </li>


                        <li class="sidebar-item  ">
                            <a href="/recherche" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Rechercher</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="/liste_des_reservations_transitaire" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Reservation</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3 style="color:#ffff" >Transitaire</h3>
            </div>
            <div class="page-content">
                <section class="row">

                    <div class="wrapper">

                        <div class="container-1">
                            <header>
                                <img   src="{{ asset('storage/' . $offre->user->logo) }}" alt="logo egyptair">
                                <div class="destination-wrapper">
                                    <div class="destination">

                                        <p>{{$offre->airport_depart}}</p>
                                        <i class="bi bi-arrow-right"></i>
                                        <p>{{$offre->airport_arrive }}</p>

                                    </div>
                                    <br>
                                    <div class="destination-label">
                                        <p>{{ date('d.m.Y', strtotime($offre->jour_depart)) }}</p>

                                    </div>
                                </div>
                            </header>

                            <main>
                                <div class="main-1">
                                    <div class="main-1-1">
                                        <i class="bi bi-plane" style="color: blue;"></i>
                                    </div>

                                    <div class="main-1-2">
                                        <p>{{$offre->num_vol}}</p>
                                    </div>

                                    <div class="dest">
                                        <p>{{$offre->airport_depart}}</p>
                                        <i class="bi bi-arrow-right"></i>
                                        <p>{{$offre->airport_arrive }}</p>
                                    </div>


                                </div>

                                <div class="main-2">
                                    <table>
                                        <tr>
                                            <th>Quantité</th>
                                            <th>Longueur(Cm)</th>
                                            <th>Largeur(Cm)</th>
                                            <th>Hauteur(Cm)</th>
                                            <th>Poids(Kg)</th>
                                        </tr>

                                        <tr>
                                            <td>{{ $donnees['quantite'] }}</td>
                                            <td>{{ $donnees['longeur'] }}</td>
                                            <td>{{ $donnees['largeur'] }}</td>
                                            <td>{{ $donnees['hauteur'] }}</td>
                                            <td>{{ $donnees['poids'] }}</td>
                                        </tr>
                                    </table>
                                </div>

                                <br>
                                <br>
                                <br>
                                <div class="main-2">
                                    <table>
                                        <tr>
                                            <th>Nature de la maechandise</th>
                                            <th>Type</th>
                                            <th>Stockage</th>
                                            <th>Etat de marchat</th>

                                        </tr>


                                        <tr>
                                            <td>{{ $donnees['nature'] }}</td>
                                            <td>{{ $donnees['type'] }}</td>
                                            <td>{{ $donnees['Stockage'] }}</td>
                                            <td>{{ $donnees['Etat']}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </main>


                            <footer>

                                      <button class="book">Réserver</button>
                                </a>
                            </footer>
                        </div>


                        <div class="container-2">
                            <div class="container-header">
                                <div class="ch2-1">
                                    <h2>Booking details</h2>
                                </div>

                                <div class="ch2-2">
                                    <strong><span id="amount">{{$prix_total}}</span> TND</strong>
                                </div>
                            </div>

                            <div>
                                <p class="booking-desc">poids_taxable</p>
                                <div class="ch2-2">
                                    <p><span id="amount">{{$poids_taxable}}</span> Kg</p>
                                </div>
                            </div>
                            <div>
                                <p class="booking-desc">poids_total</p>
                                <div class="ch2-2">
                                    <p><span id="amount">{{$poids_total}}</span> Kg</p>
                                </div>
                            </div>
                            <form  method="POST" action="{{ route('store_reservation') }}">
                                @csrf
                            <div class="book-num-cont">

                                <div>
                                    <p class="book-code">607</p>
                                </div>

                                <div>
                                    <input class="book-num" type="number" name="code" value="{{old('code')}}">
                                </div>
                            </div>
                            <div>

                                    <input id="paper-awb" type="radio" name="code_type" value="paper-awb"><label for="paper-awb" class="label"> Paper AWB</label>
                                    <input id="eap" type="radio" name="code_type" value="eap"><label for="eap" class="label"> EAP</label>
                                    <input id="eaw" type="radio" name="code_type" value="eaw"><label for="eaw" class="label"> EAW</label>

                            </div>

                            <div>
                                @if($donnees['poids'] > $offre->maxquantite)
                                <p style="color:red;">La réservation ne peut pas être effectuée, le poids de la marchandise dépasse la limite de {{$offre->maxquantite}} kg.</p>
                            @else
                                <button class="booking-btn" type="submit" onclick="if (confirm('Êtes-vous sûr de confirmer la réservation ?')) {showPopup();}">
                                    <i class="fa-solid fa-lock"></i> Booking
                                </button>
                            @endif

                                  <div id="popup" class="popup">
                                    <div class="popup-content">
                                      <span class="close" onclick="hidePopup()">&times;</span>
                                      <img src="mail.png" alt="Success">
                                      <p>Vos coordonnées ont été soumises avec succès. Merci ! Veuillez attendre la confirmation.
                                    </p>
                                    </div>
                                  </div>

                                  <style>
                                  .popup {
                                    display: none;
                                    position: fixed;
                                    z-index: 1;
                                    left: 0;
                                    top: 0;
                                    width: 100%;
                                    height: 100%;
                                    overflow: auto;
                                    background-color: rgba(0,0,0,0.4);
                                  }
                                  .popup-content {
                                    background-color: #fefefe;
                                    margin: 15% auto;
                                    padding: 20px;
                                    border: 1px solid #888;
                                    width: 80%;
                                    max-width: 800px; /* increase the max-width */
                                    text-align: center;
                                  }


                                  .close {
                                    color: #aaa;
                                    float: right;
                                    font-size: 28px;
                                    font-weight: bold;
                                  }

                                  .close:hover,
                                  .close:focus {
                                    color: black;
                                    text-decoration: none;
                                    cursor: pointer;
                                  }

                                  .popup-content img {
                                    height: 80px;
                                    margin-bottom: 20px;
                                  }
                                  </style>

                                  <script>
                                  function showPopup() {
                                    var popup = document.getElementById("popup");
                                    popup.style.display = "block";
                                  }

                                  function hidePopup() {
                                    var popup = document.getElementById("popup");
                                    popup.style.display = "none";
                                  }
                                  </script>

                              </div>

                        </form>
                            <div>
                                <p class="booking-text">Cargoween</p>
                            </div>

                            <div>
                                <hr>
                            </div>

                            <div>
                                <p class="booking-text">CargoWeen</p>
                            </div>

                            <div>
                                <hr>
                            </div>


                        </div>

                    </div>


                </section>
            </div>

            </div>


        </div>
    </div>
    <script src="assets1/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets1/js/bootstrap.bundle.min.js"></script>

    <script src="assets1/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets1/js/pages/dashboard.js"></script>

    <script src="assets1/js/main.js"></script>
</body>

<style>
    @font-face {
        font-family: "Nunito-SemiBold";
        src: url("Nunito-SemiBold.ttf");
    }



    body {
        font-family: 'Nunito';
        background: #02102B;
    }

    .container-1 {
        background: #fff;
        width: 70%;
        padding: 0px 20px;
        margin-left: 30px;
        padding-top: 20px;
        padding-bottom: 20px;
        border-radius: 15px;
    }

    header {
        display: flex;
        flex-direction: row;
        font-family: "Nunito-SemiBold";
        align-items: center;
        margin-bottom: 80px;
    }

    header img {
        width: 150px;
        height: auto;
    }

    .destination-wrapper {
        margin-left: 80px;
    }

    .destination {
        display: flex;
        flex-direction: row;
        align-content: center;
        align-items: center;
        color: #000;
    }

    .destination p {
        margin-right: 20px;
        color: #000;
    }

    .fa-plane {
        font-size: 30px;
        color: #000;
    }

    .destination p {
        font-size: 25px;
        margin: 0px;
        color: #000;
    }

    .destination .fa-arrow-right-long {
        font-size: 40px;
        margin: 0px 20px;
        color: #000;
    }

    .destination-label p {
        font-size: 20px;
        margin: 0px;
        color: #000;
    }

    main {
        width: auto;
        height: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 5px;
    }

    .main-1 {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 100%;
        border: 1px solid #000;
        border-radius: 5px;
        margin-bottom: 80px;
    }

    .main-1-1 {
        margin-left: 20px;
        margin-right: 100px;
    }

    .main-1-2 {
        margin-right: 100px;
    }

    .main-1-3 {
        margin-left: 50px;
    }

    .main-2 {
        width: 100%;
        display: flex;
        flex-direction: row;
    }

    .dest {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .fa-arrow-right-long {
        margin: 0px 20px;
    }

    th {
        padding-right: 100px;
        padding-bottom: 30px;
        color: #000;
    }

    td {
        color: #000;
    }

    .fa-check {
        color: green;
        font-size: 30px;
    }

    .main-3 {
        width: 100%;
        margin-top: 80px;
    }

    .main-3-description {
        color: #787878;
    }

    footer {
        padding: 40px 0px;
    }

    .book {
        width: 312px;
        height: 39px;
        color: #fff;
        background: #C20000;
        border: none;
        border-radius: 5px;
        float: right;
    }

    .book:hover {
        background: #007ce2;
        cursor: pointer;
    }


    /* -------------------------------------------------- */

    .wrapper {
        display: flex;
        flex-direction: row;
        justify-content: center;
        margin-top: 30px;
    }


    .container-2 {
        background: #fff;
        width: 30%;
        height: 500px;
        margin-left: 10px;
        text-align: center;
        border-radius: 15px;
    }

    .container-header {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
        margin-top: 20px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .container-header h2 {
        color: #336A7D;
        font-size: 18px;
    }

    .container-header p {
        color: #787474;
        font-size: 14px;
    }

    .booking-desc {
        color: #787474;
        font-size: 12px;
        font-weight: bold;
        text-align: center;
    }

    .ch2-2 {
        margin-top: 10px;
        font-size: 15px;
    }



    .book-num-cont {
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        padding: 0px 10px;
    }

    .book-code {
        margin-top: 15px !important;
        border: 1px solid #c4c4c4;
        height: 33px;
        width: 99%;
        font-size: 16px;
        text-align: center;
        padding: 0px 30px;
        margin-top: 10px;
        font-weight: bold;
        color: #000;
    }

    .amount {
        margin-top: 10px !important;
    }

    .book-num {
        border: 1px solid #c4c4c4;
        height: 33px;
        width: 100%;
        margin-right: 5px;
        font-size: 16px;
    }

    form {
        text-align: center;
    }

    .label {
        font-size: 12px;
        color: #000;
        font-weight: bold;
        margin-left: 5px;
    }

    .booking-btn {
        width: 90%;
        height: 50px;
        background: #C20000;
        border-radius: 15px;
        text-align: center;
        color: #fff;
        font-size: 19px;
        border: none;
        margin: 20px 0px;
        cursor: pointer;
    }

    .booking-btn:hover {
        background: #0063e4;
    }

    .booking-text {
        color: #787474;
        font-size: 12px;
    }

    .paper-awb label {
        color: #000;
        }

    p {
        color: #000;
    }

    .main-1-3 p {
        font-size: 12px;
    }

    .fa-arrow-right-long {
        color: #000;
        font-size: 20px;
        margin-top: -20px;
    }

</style>

</html>
