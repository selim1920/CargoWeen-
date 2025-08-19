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

                        <li class="sidebar-item  ">
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
                        <li class="sidebar-item active">
                            <a href="/AjouterOffre" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Offre</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">

                            <a  href="/liste_offre"  class='sidebar-link'>
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
                <h3 style="color:#ffff" >Compagnie Aérienne</h3>
            </div>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/CompagnieDashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Offre</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Création un Offre</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form  class="form" method="POST" action="{{ route('AjouterOffre') }}">
                                             @if (session('success'))
                                               <div class="alert alert-success">
                                          {{ session('success') }}
                                          </div>
                                                 @endif
                                                 @if (session('fail'))
                                                 <div class="alert alert-success">
                                            {{ session('fail') }}
                                            </div>
                                                   @endif
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <h6>Le Numéro de vol :</h6>

                                                        <input type="text" id="num_vol" class="form-control"
                                                            placeholder="Le Numéro de vol" name="num_vol" value="{{old('num_vol')}}">

                                                    </div>
                                                    @error('num_vol')<font color="red">{{ $message }}</font>@enderror

                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <h6>Le nom de la compagnie aérienne :</h6>

                                                        <input type="text" id="nom_compagnie" class="form-control"
                                                        placeholder="Le nom de la compagnie" name="nom_compagnie"
                                                        value="{{old('nom_compagnie')}}">
                                                    </div>
                                                    @error('nom_compagnie')<font color="red">{{ $message }}</font>@enderror
                                                </div>


                                                <div class="col-md-6 mb-4">
                                                    <br>
                                                    <h6>Aéroport de départ</h6>

                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="airport_depart" name="airport_depart" value="{{old('airport_depart')}}">
                                                            <option value="">Choose...</option>
                                                            <option value="TUN">Tunis Carthage (TUN)</option>
                                                            <option value="ORY">France Paris (ORY)</option>
                                                            <option value="CDG">France Paris Charles de Gaulle (CDG)</option>
                                                            <option value="MJI">Libya Mitiga (MJI)</option>
                                                            <option value="IST">Turkey Istanbul (IST)</option>



                                                        </select>
                                                    </fieldset>
                                                    @error('airport_depart')<font color="red">{{ $message }}</font>@enderror
                                                </div>


                                                <div class="col-md-6 mb-4">
                                                    <br>
                                                    <h6>Aéroport de destination</h6>

                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="airport_arrive" name="airport_arrive" value="{{old('airport_arrive')}}">
                                                            <option value="">Choose...</option>
                                                            <option value="TUN">Tunis Carthage (TUN)</option>
                                                            <option value="ORY">France Paris (ORY)</option>
                                                            <option value="CDG">France Paris Charles de Gaulle (CDG)</option>
                                                            <option value="MJI">Libya Mitiga (MJI)</option>
                                                            <option value="IST">Turkey Istanbul (IST)</option>

                                                        </select>

                                                    </fieldset>
                                                    @error('airport_arrive')<font color="red">{{ $message }}</font>@enderror

                                                </div>


                                                <div class="col-md-6 col-12">

                                                    <div class="form-group">
                                                        <h6>Jour et heure de départ :</h6>

                                                        <input type="datetime-local" id="jour_depart" class="form-control"
                                                           name="jour_depart" value="{{old('jour_depart')}}">
                                                    </div>
                                                    @error('jour_depart')<font color="red">{{ $message }}</font>@enderror
                                                </div>


                                                <div class="col-md-6 col-12">

                                                    <div class="form-group">
                                                        <h6>Jour et heure d arrivée :</h6>

                                                        <input type="datetime-local" id="jour_arrive" class="form-control"
                                                           name="jour_arrive" value="{{old('jour_arrive')}}">
                                                    </div>
                                                    @error('jour_arrive')<font color="red">{{ $message }}</font>@enderror
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <br>
                                                        <div class="form-group">
                                                            <h6>Max Quantite :</h6>

                                                            <input type="number" id="maxquantite" class="form-control"
                                                                placeholder="Quantite " name="maxquantite" value="{{old('maxquantite')}}">
                                                        </div>
                                                        @error('maxquantite')<font color="red">{{ $message }}</font>@enderror
                                                    </div>


                                              <div class="col-md-6 col-12">
                                                <br>
                                                    <div class="form-group">
                                                        <h6>Tarif (Prix par KG) :</h6>

                                                        <input type="number" id="tarif_kg" class="form-control"
                                                            placeholder="Tarif (Prix par KG) " name="tarif_kg" value="{{old('tarif_kg')}}">
                                                    </div>
                                                    @error('tarif_kg')<font color="red">{{ $message }}</font>@enderror
                                                </div>


                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Créer offre</button>


                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->
            </div>

        </div>
    </div>
    <script src="assets1/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets1/js/bootstrap.bundle.min.js"></script>

    <script src="assets1/js/main.js"></script>
</body>
<style>
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 10px;
        border-radius: 5px;
    }

    /* Customize the error alert message */
    .alert-error {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 10px;
        border-radius: 5px;
    }
</style>

</html>
