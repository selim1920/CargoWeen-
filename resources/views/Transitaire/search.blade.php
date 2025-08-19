<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CargoWeen</title>
    <link href="assets/img/icone-logo.png" rel="icon">

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="assets1/vendors/choices.js/choices.min.css" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets1/css/bootstrap.css">

    <link rel="stylesheet" href="assets1/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets1/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets1/css/app.css">
    <link rel="shortcut icon" href="assets1/images/favicon.svg" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

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

                        <li class="sidebar-item ">
                            <a href="/dashboard-transitaire" class='sidebar-link'>
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
                        <li class="sidebar-item active ">
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

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">

                            <p class="text-subtitle text-muted">Rechercher Meilleur Offre</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard-transitaire">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Rechercher</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section >
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="section-1">
                <style>
                    form {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  align-items: center;
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

select, input[type="range"], button {
  padding: 10px;
  border-radius: 5px;
  border: none;
  font-size: 16px;
}

select {
  background-color: #ffffff;
  color: #333333;
  width: 200px;
}

input[type="range"] {
  width: 200px;
  background-color: #ffffff;
}

button {
  background-color: #007bff;
  color: #ffffff;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #0056b3;
}

                  </style>
                  <div>
                    <form id="filterForm">
                      <select id="priceFilter">
                        <option value="asc">Lowest Price</option>
                        <option value="desc">Highest Price</option>
                      </select>
                      <select id="timeFilter">
                        <option value="asc">Earliest Departure</option>
                        <option value="desc">Latest Departure</option>
                      </select>
                      <button type="button" onclick="applyFilter()">Apply Filter</button>
                    </form>
                  </div>


                </div>
            </div>
        </div>
    </div>
</section>

@foreach ($offres as $offre)
<section class="section">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="section-1">
          <div class="section-1-1">
            <img class="logo" src="{{ asset('storage/' . $offre->user->logo) }}" alt="egyptair-logo">
          </div>

          <div class="section-1-2">
            <div class="date-and-time">
              <h3 class="date">{{$offre->airport_depart}}</h3>
              <p class="time">{{ date('H:i', strtotime($offre->jour_depart)) }}</p>
            </div>

            <div>
              <p class="auh">{{ date('d.m.Y', strtotime($offre->jour_depart)) }}</p>
              <img class="pill" src="1.png" alt="">
              <p class="auh">Direction</p>
            </div>

            <div class="date-and-time">
              <h3 class="date">{{$offre->airport_arrive }}</h3>
              <p class="time">{{ date('H:i', strtotime($offre->jour_arrive)) }}</p>
            </div>
          </div>

          <div class="section-1-3">
            @if($offre->maxquantite == 0)
              <p class="prix">Quantité épuisée</p>
            @else
              <p class="prix">{{$offre->tarif_kg}} € / kg </p>

              <form class="form" method="get" action="{{ route('reservation') }}">
                <input type="hidden" value="{{$offre->id}}" name="reservationId">
                <button type="submit" class="btn-reserver">Réserver</button>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach

<script>
    // Function to get selected option from the price filter
    function getSelectedPriceOption() {
      var selectElement = document.getElementById("priceFilter");
      return selectElement.value;
    }

    // Function to get selected option from the time filter
    function getSelectedTimeOption() {
      var selectElement = document.getElementById("timeFilter");
      return selectElement.value;
    }

    // Function to apply the filter
    function applyFilter() {
      var selectedPriceOption = getSelectedPriceOption();
      var selectedTimeOption = getSelectedTimeOption();

      var offreSections = Array.from(document.querySelectorAll(".section"));
      var parentElement = offreSections[0].parentNode;

      offreSections.sort(function(a, b) {
        var priceA = parseFloat(a.querySelector(".prix").textContent);
        var priceB = parseFloat(b.querySelector(".prix").textContent);

        var timeA = moment(a.querySelector(".time").textContent, "HH:mm");
        var timeB = moment(b.querySelector(".time").textContent, "HH:mm");

        if (selectedPriceOption === "asc") {
          if (priceA === priceB) {
            return selectedTimeOption === "asc" ? timeA.diff(timeB) : timeB.diff(timeA);
          } else {
            return priceA - priceB;
          }
        } else {
          if (priceA === priceB) {
            return selectedTimeOption === "asc" ? timeA.diff(timeB) : timeB.diff(timeA);
          } else {
            return priceB - priceA;
          }
        }
      });

      offreSections.forEach(function(section) {
        parentElement.appendChild(section);
      });
    }

    // Event listener for the filter form submission
    document.getElementById("filterForm").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent form submission
      applyFilter(); // Apply the filter
    });

    // Call the applyFilter function on page load
    applyFilter();
  </script>

</div>
</div>
</div>
<script src="assets1/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets1/js/bootstrap.bundle.min.js"></script>

<!-- Include Choices JavaScript -->
<script src="assets1/vendors/choices.js/choices.min.js"></script>

<script src="assets1/js/main.js"></script>
</body>


<style>
    @font-face {
        font-family: "Nunito-SemiBold";
        src: url("Nunito-SemiBold.ttf");
    }

    body {
        background: #02102B;
        font-family: "Nunito";
    }
    .section-1-3 .prix {
        font-size: 20px;
        font-weight: bold;
      }

    .section-1 {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        padding: 20px 0px;
    }

    .section-2 {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        padding: 20px 0px;
        align-items: center;
    }

    .section-3 {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        padding: 20px 0px;
        align-items: center;
    }

    .section-4 {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        padding: 20px 0px;
        align-items: center;
    }

    .section-5 {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        padding: 20px 0px;
        align-items: center;
    }

    .section-1-2 {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-content: center;
        align-items: center;
        justify-items: center;
    }

    .section-2-2 {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-content: center;
    }

    .section-3-2 {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-content: center;
    }

    .section-4-2 {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-content: center;
    }

    .section-5-2 {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-content: center;
    }

    .date-and-time {
        margin: 0px 20px;
    }

    .date,
    .time {
        font-size: 13px;
        margin: 0px;
        padding: 0;
    }

    .fra {
        color: #BEBEBE;
        font-size: 9px;
    }

    .logo {
        width: 120px;
        height: auto;
    }

    .pill {
        width: 200px;
        height: auto;
    }

    .btn-reserver {
        width: 100px;
        height: 40px;
        background: #C20000;
        color: #fff;
        border: none;
        border-radius: 9px;
        cursor: pointer;
    }

    .btn-reserver:hover {

        background: #0036e6;
        color: #fff;

    }

    main {
        width: 100%;
        display: flex;
        flex-direction: row;
        align-content: center;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .main-1 {
        height: auto;
        width: 100%;
        border-radius: 15px;
        background: #fff;
        padding: 0px 5px;
        margin-right: 50px;
        padding: 20px;
    }

    .main-2 {
        width: 110%;
        height: auto;
        background: #02102B;
        display: flex;
        flex-direction: column;
        border-radius: 15px;
        padding-bottom: 70px;
        margin-bottom: 210px;
    }

    .main-2 h2 {
        color: #336A7D;
        font-size: 18px;
        padding-left: 10px;
        padding-top: 25px;
    }

    label {
        color: #292929;
        font-size: 15px;
        font-weight: bold;
    }

    input[type='range'] {
        width: 280px;
    }

    input[type='range']::-ms-thumb {
        background: #fff;
    }

    input[type="checkbox"] {
        padding: 10px;
    }

    form {
        padding-left: 9px;
    }

    .auh {
        text-align: center;
        color: #02102B;
        font-size: 12px;
    }

    .prix {
        font-size: 13px;
        font-weight: bold;
        margin: 0px;
    }

    .carrier {
        font-size: 15px;
        font-weight: bold;
    }

    .price {
        margin-left: 40px;
    }

    .label {
        font-size: 15px;
        margin-left: 10px;
    }

    .aller {
        font-size: 20px;
        font-weight: bold;
    }

    .hor-aller {
        margin: 0px;
        padding: 0px;
    }

    /* -------------------------------------------- */
</style>

</html>
