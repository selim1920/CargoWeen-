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
                            <a href="/CompagnieDashboard" class='sidebar-link'>
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
                            <a href="/AjouterOffre" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Offre</span>
                            </a>
                        </li>



                        <li class="sidebar-item ">
                            <a href="/liste_offre" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>liste des offres</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="/liste_reservation" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Reservations En Attente</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="/liste_reservation_accepter" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Reservations Accepter</span>
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
                <h3 style="color:#ffff">Compagnie Aérienne</h3>

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
                                                <h6 class="text-muted font-semibold">Réservation Total</h6>
                                                <h6 class="font-extrabold mb-0">{{ App\Models\Reservation::whereHas('offre', function ($query) {
                                                        $query->where('id_user', Auth::user()->id);
                                                    })
                                                    ->count() }}
                                                </h6>
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
                                                <h6 class="text-muted font-semibold">Réservation Accepter</h6>
                                                  <h6 class="font-extrabold mb-0">{{ App\Models\Reservation::whereHas('offre', function ($query) {
                                                        $query->where('id_user', Auth::user()->id);
                                                    })
                                                    ->where('status', 'accepted')
                                                    ->count() }}
                                                </h6>
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
                                                <h6 class="text-muted font-semibold">Réservation En Attente</h6>
                                                <h6 class="font-extrabold mb-0">{{ App\Models\Reservation::whereHas('offre', function ($query) {
                                                        $query->where('id_user', Auth::user()->id);
                                                    })
                                                    ->where('status', 'attente')
                                                    ->count() }}
                                                </h6>
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
                                                <h6 class="text-muted font-semibold">Réservation Rejeté</h6>
                                                <h6 class="font-extrabold mb-0">{{ App\Models\Reservation::whereHas('offre', function ($query) {
                                                    $query->where('id_user', Auth::user()->id);
                                                })
                                                ->where('status', 'rejected')
                                                ->count() }}
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
                                        <h4>Evolution Nombre Des Offres</h4>
                                    </div>
                                    <div class="chart tab-pane active" id="bar-chart">
                                        <canvas id="barChart"></canvas>
                                    </div>

                                    <!-- Make sure to include the Chart.js library -->
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                    <script>
                                        var labels = {!! json_encode($labels) !!};
                                        var data = {!! json_encode($data) !!};
                                        var backgroundColor = '#00308F'; // Blue color: #00308F

                                        var ctx = document.getElementById('barChart').getContext('2d');
                                        new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: labels,
                                                datasets: [{
                                                    label: 'Number of Offers',
                                                    data: data,
                                                    backgroundColor: backgroundColor
                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                                scales: {
                                                    x: {
                                                        display: true,
                                                        title: {
                                                            display: true,
                                                            text: 'Months'
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
                        <div class="page-heading">
                            <div class="d-flex align-items-center">
                              <div class="avatar avatar-xl">
                                <img src="{{ asset('storage/' . $user->logo) }}" alt="Company Logo" id="logo">
                              </div>
                              <div class="ms-3 name">
                                <h3 class="font-bold" style="color:#ffff">{{ Auth::user()->name }}</h3>
                                <button onclick="document.getElementById('myModal').style.display='block'">ADD YOUR LOGO</button>
                              </div>
                            </div>
                          </div>

                          <div id="myModal" class="modal">
                            <div class="modal-content">
                              <span class="close">&times;</span>
                              <form action="/user/logo" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="logo">
                                <button type="submit">Upload Logo</button>
                              </form>
                            </div>
                          </div>



                          <style>
                            /* The Modal (background) */
                            .modal {
                              display: none; /* Hidden by default */
                              position: fixed; /* Stay in place */
                              z-index: 1; /* Sit on top */
                              padding-top: 100px; /* Location of the box */
                              left: 0;
                              top: 0;
                              width: 100%; /* Full width */
                              height: 100%; /* Full height */
                              overflow: auto; /* Enable scroll if needed */
                              background-color: rgb(0,0,0); /* Fallback color */
                              background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                            }

                            /* Modal Content */
                            .modal-content {
                              background-color: #fefefe;
                              margin: auto;
                              padding: 20px;
                              border: 1px solid #888;
                              width: 80%;
                            }

                            /* The Close Button */
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
                            } .modal-content {
                                background-color: #fefefe;
                                margin: auto;
                                padding: 20px;
                                border: 1px solid #888;
                                width: 50%; /* Adjust the width as needed */
                              }
                          </style>

                          <script>
                            // Get the modal
                            var modal = document.getElementById("myModal");

                            // Get the <span> element that closes the modal
                            var span = document.getElementsByClassName("close")[0];

                            // When the user clicks on <span> (x), close the modal
                            span.onclick = function() {
                              modal.style.display = "none";
                            }

                            // When the user clicks anywhere outside of the modal, close it
                            window.onclick = function(event) {
                              if (event.target == modal) {
                                modal.style.display = "none";
                              }
                            }
                          </script>

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
                            document.addEventListener('DOMContentLoaded', function() {
                                var acceptedCount = {{ App\Models\Reservation::whereHas('offre', function ($query) {
                                    $query->where('id_user', Auth::user()->id);
                                })
                                ->where('status', 'accepted')
                                ->count() }};

                                var rejectedCount = {{ App\Models\Reservation::whereHas('offre', function ($query) {
                                    $query->where('id_user', Auth::user()->id);
                                })
                                ->where('status', 'rejected')
                                ->count() }};

                                var ctx = document.getElementById('reservationChart').getContext('2d');
                                new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: ['Acceptée', 'Rejetée'],
                                        datasets: [{
                                            data: [acceptedCount, rejectedCount],
                                            backgroundColor: ['#00308F', '#FF0000']
                                        }]
                                    },
                                    options: {
                                        responsive: true
                                    }
                                });
                            });
                        </script>

                            </div>
                        </div>

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
