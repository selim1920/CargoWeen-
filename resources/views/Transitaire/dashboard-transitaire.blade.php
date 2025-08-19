<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CargoWeen</title>
    <link href="assets/img/icone-logo.png" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets1/css/bootstrap.css">

    <link rel="stylesheet" href="assets1/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets1/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets1/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets1/css/app.css">
    <link rel="shortcut icon" href="assets1/images/favicon.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Nombre De Réservation</h6>
                                                <h6 class="font-extrabold mb-0">{{ $totalReservationsCount }}</h6>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Réservation Acceptées</h6>
                                                <h6 class="font-extrabold mb-0">{{ $acceptedReservationsCount }}</h6>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Réservation en Attente</h6>
                                                <h6 class="font-extrabold mb-0">{{ $attenteReservationsCount }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>

                                                <div class="col-md-8">
                                                 <h6 class="text-muted font-semibold">Réservation Rejetées</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $rejectedReservationsCount }}</h6>
                                                      </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Evolution Nombre Des Reservations</h4>
                                    </div>
                                    <div class="chart tab-pane active" id="bar-chart">
                                        <canvas id="barChart"></canvas>
                                    </div>

                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <script>
                                        var labels = {!! json_encode($labels) !!};
                                        var data = {!! json_encode($data) !!};
                                        var backgroundColors = ['#00308F', '#198754', '#dc3545', '#FFC43D']; // Array of colors

                                        var datasets = [{
                                            label: 'Number of Reservations',
                                            data: data,
                                            backgroundColor: backgroundColors,
                                        }];

                                        var ctx = document.getElementById('barChart').getContext('2d');
                                        new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: labels,
                                                datasets: datasets
                                            },
                                            options: {
                                                responsive: true,
                                                scales: {
                                                    x: {
                                                        display: true,
                                                        title: {
                                                            display: true,

                                                        }
                                                    },
                                                    y: {
                                                        display: true,
                                                        title: {
                                                            display: true,
                                                            text: 'Count'
                                                        },
                                                        ticks: {
                                                            precision: 0,
                                                            callback: function(value) {
                                                                if (value % 1 === 0) {
                                                                    return value;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets1/images/faces/1.png" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                        <h5 class="font-bold">{{ Auth::user()->prenom }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <h4>Evolution de Réservation</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <canvas id="reservationChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                            // Get the counts from the PHP variables
                            var acceptedCount = {{ $acceptedReservationsCount }};
                            var rejectedCount = {{ $rejectedReservationsCount }};
                            var attenteCount = {{ $attenteReservationsCount }};

                            // Create the chart data
                            var data = {
                                labels: ['Acceptées', 'Rejetées', 'En Attente'],
                                datasets: [{
                                    data: [acceptedCount, rejectedCount, attenteCount],
                                    backgroundColor: ['#198754', '#dc3545', '#FFC43D'],
                                    hoverBackgroundColor: ['#198754', '#dc3545', '#FFC43D']
                                }]
                            };

                            // Create the chart options
                            var options = {
                                responsive: true,
                                maintainAspectRatio: false
                            };

                            // Get the chart canvas element
                            var chartCanvas = document.getElementById('reservationChart').getContext('2d');

                            // Create the pie chart
                            var chart = new Chart(chartCanvas, {
                                type: 'pie',
                                data: data,
                                options: options
                            });
                        </script>

                    </div>
                </section>
            </div>


        </div>
    </div>
    <script src="assets1/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets1/js/bootstrap.bundle.min.js"></script>

    <script src="assets1/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets1/js/pages/dashboard.js"></script>

    <script src="assets1/js/main.js"></script>
</body>

</html>
