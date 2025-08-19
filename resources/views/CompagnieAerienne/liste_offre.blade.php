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

    <link rel="stylesheet" href="assets1/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets1/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets1/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets1/css/app.css">
    <link rel="shortcut icon" href="assets1/images/favicon.svg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

                        <li class="sidebar-item active">
                            <a href="/liste_offre"  class='sidebar-link'>
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
                <h3 style="color:#ffff" >Offres</h3>
            </div>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">

                            <p class="text-subtitle text-muted"></p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/CompagnieDashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Reservation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Offres
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Num vol</th>

                                        <th>Aéroport de<br> départ</th>
                                        <th>Aéroport arrivée</th>
                                        <th>jour_depart</th>
                                        <th>jour_arrive</th>
                                        <th>tarif_kg</th>
                                        <th>Quantite</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offres as $offre )
                                    <tr>
                                        <td>{{$offre->num_vol}}</td>

                                        <td>{{$offre->airport_depart}}</td>
                                        <td>{{$offre->airport_arrive}}</td>
                                        <td>{{$offre->jour_depart}}</td>
                                        <td>{{$offre->jour_arrive}}</td>
                                        <td>{{$offre->tarif_kg}}</td>
                                        <td>{{$offre->maxquantite}}</td>

                                        <td> <a href={{"destroyOffres/".$offre['id']}} class="btn btn-danger"   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette utlisateur ?')"style=" padding: 5px;">Supprimer</a>
                                            <a href="{{ 'edit3/' . $offre->id }}" class="btn btn-primary" style=" padding: 5px;" data-toggle="modal" data-target="#editModal{{ $offre->id }}">Modifer</a>
                                        </td>
                                    </tr>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{ $offre->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $offre->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $offre->id }}">Edit Flight</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('flight.update', $offre->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="num_vol">Num Vol:</label>
                                                            <input type="text" id="num_vol" class="form-control" name="num_vol" value="{{ $offre->num_vol }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nom_compagnie">Nom Compagnie:</label>
                                                            <input type="text" id="nom_compagnie" class="form-control" name="nom_compagnie" value="{{ $offre->nom_compagnie }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="airport_depart">Aéroport de départ:</label>
                                                            <input type="text" id="airport_depart" class="form-control" name="airport_depart" value="{{ $offre->airport_depart }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="airport_arrive">Aéroport d arrivée:</label>
                                                            <input type="text" id="airport_arrive" class="form-control" name="airport_arrive" value="{{ $offre->airport_arrive }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jour_depart">Jour Départ:</label>
                                                            <input type="datetime-local" id="jour_depart" class="form-control" name="jour_depart" value="{{ $offre->jour_depart }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jour_arrive">Jour Arrivée:</label>
                                                            <input type="datetime-local" id="jour_arrive" class="form-control" name="jour_arrive" value="{{ $offre->jour_arrive }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tarif_kg">Tarif KG:</label>
                                                            <input type="text" id="tarif_kg" class="form-control" name="tarif_kg" value="{{ $offre->tarif_kg }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="maxquantite">Quantite KG:</label>
                                                            <input type="text" id="maxquantite" class="form-control" name="maxquantite" value="{{ $offre->maxquantite }}" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif



                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>


        </div>
    </div>
    <script src="assets1/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets1/js/bootstrap.bundle.min.js"></script>

    <script src="assets1/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets1/js/main.js"></script>
</body>

</html>
