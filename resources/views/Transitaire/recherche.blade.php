<!DOCTYPE html><html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CargoWeen</title>
    <link href="assets/img/icone-logo.png" rel="icon">

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="assets1/vendors/choices.js/choices.min.css" />

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
                            <a href="/TransitaireDashboard"><img src="assets/img/logo.png" alt="Logo" srcset=""></a>
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
                            <a href="/TransitaireDashboard" class='sidebar-link'>
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
                                    <li class="breadcrumb-item"><a href="/TransitaireDashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Rechercher</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="bootstrap-select">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Entrer vos expéditions détails</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form  class="form" method="get" action="{{ route('search') }}">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <h6>Aéroport de départ</h6>

                                                <fieldset class="form-group">
                                                    <select class="form-select"id="airport_depart" name="airport_depart">
                                                        <option value="">Choose...</option>
                                                        <option value="TUN">Tunis Carthage (TUN)</option>
                                                        <option value="ORY">France Paris (ORY)</option>
                                                        <option value="CDG">France Paris Charles de Gaulle (CDG)</option>
                                                        <option value="MJI">Libya Mitiga (MJI)</option>
                                                        <option value="IST">Turkey Istanbul (IST)</option>n>


                                                    </select>
                                                </fieldset>

                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <h6>Aéroport de destination</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="airport_arrive" name="airport_arrive">
                                                        <option value="">Choose...</option>
                                                        <option value="TUN">Tunis Carthage (TUN)</option>
                                                        <option value="ORY">France Paris (ORY)</option>
                                                        <option value="CDG">France Paris Charles de Gaulle (CDG)</option>
                                                        <option value="MJI">Libya Mitiga (MJI)</option>
                                                        <option value="IST">Turkey Istanbul (IST)</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <h6>Date d'expédition</h6>
                                                 <input type="date" id="jour_depart"
                                                 name="jour_depart"  class="form-select"  >
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <h6>Nos Services</h6>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="service" name="service">
                                                        <option selected>Choose...</option>
                                                        <option>Expédition Standard</option>
                                                        <option>Marchandise sous température contrdlée</option>
                                                        <option>Avion Cargo</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-4">
                                            <h6>Quantité</h6>
                                                    <input type="text" placeholder="Quantité" class="form-control" id="quantite" name="quantite" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6>Longueur (cm)</h6>
                                                        <input type="text" placeholder="Longeur" class="form-control" id="longeur" name="longeur" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <h6>Largeur (cm)</h6>
                                                            <input type="text" placeholder="Largeur" class="form-control" id="largeur" name="largeur">
                                                    </div>

                                            <div class="col-sm-4">
                                                <br>
                                            <fieldset>
                                                <div>
                                                  <input class="form-check-input" type="radio" id="colis" name="type" value="colis">
                                                  <strong><label class="form-check-label" for="colis">Colis</label></strong>
                                                </div>
                                                <div>
                                                  <input class="form-check-input" type="radio" id="Palette" name="type" value="Palette">
                                                  <strong> <label class="form-check-label" for="Palette">Palette</label></strong>
                                                </div>
                                            </fieldset>
                                            </div>
                                            <div class="col-sm-4">
                                                <br>
                                                <h6>Hauteur (cm)</h6>
                                                        <input type="text" placeholder="Hauteur" class="form-control" id="hauteur" name="hauteur">
                                                </div>
                                                <div class="col-sm-4">
                                                    <br>
                                                    <h6>Poids (Kg)</h6>
                                                            <input type="text" placeholder="Poids" class="form-control" id="poids" name="poids">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <br>
                                                        <h6>Nature de la marchandise</h6>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="nature" name="nature">
                                                                <option selected>Choose...</option>
                                                                <option>Electronique</option>
                                                                <option>Chimique</option>
                                                                <option>Organique</option>

                                                            </select>
                                                        </fieldset>
                                                   </div>

                                            <div class="col-sm-4">
                                                <br>
                                                <h6>Stockage</h6>
                                            <fieldset>
                                                <div>
                                                  <input class="form-check-input" type="radio" id="Gerbable" name="Stockage" value="Gerbable"
                                                         checked>
                                                  <strong><label class="form-check-label" for="Gerbable">Gerbable</label></strong>
                                                </div>
                                                <div>
                                                  <input class="form-check-input" type="radio" id="Non Gerbable" name="Stockage" value="Non Gerbable">
                                                  <strong> <label class="form-check-label" for="Non Gerbable">Non Gerbable</label></strong>
                                                </div>
                                            </fieldset>
                                            </div>

                                            <div class="col-sm-4">
                                                <br>
                                                <h6>Etat de la marchandise</h6>
                                                <fieldset>

                                                    <div>
                                                      <input class="form-check-input" type="radio" id="NonDangereux" name="Etat" value="Non Dangereux" checked>
                                                      <strong><label class="form-check-label" for="NonDangereux">Non Dangereux</label></strong>
                                                    </div>
                                                    <div>
                                                        <input class="form-check-input" type="radio" id="Dangereux" name="Etat" value="Dangereux" >
                                                        <strong><label class="form-check-label" for="Dangereux">Dangereux</label></strong>
                                                      </div>
                                                  </fieldset>
                                            </div>
                                            <div class="col-md-6 mb-4" id="fileUploadSection" style="display: none;">
                                                <br>
                                                <br>
                                                <h6>Merci de télécharger la FDS :</h6>
                                                <fieldset>
                                                  <div class="input-group">
                                                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                    <button class="btn btn-primary" type="button" id="inputGroupFileAddon04">Upload</button>
                                                  </div>
                                                </fieldset>
                                              </div>

                                                    <div class="col-md-6 mb-4">
                                                        <br>
                                                        <br>
                                                        <h6>Merci de télécharger le fichier Dangereux :</h6>
                                                        <fieldset>
                                                            <div class="input-group">
                                                                <input type="file" class="form-control" id="inputGroupFile04"
                                                                    aria-describedby="inputGroupFileAddon04"
                                                                    aria-label="Upload">
                                                                <button class="btn btn-primary" type="button"
                                                                    id="inputGroupFileAddon04">Upload</button>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">rechercher</button>

                                                        </div>
                                                    </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Bootstrap Select end -->


            </div>
        </div>
    </div>
    <script src="assets1/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets1/js/bootstrap.bundle.min.js"></script>

    <!-- Include Choices JavaScript -->
    <script src="assets1/vendors/choices.js/choices.min.js"></script>

    <script src="assets1/js/main.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dangereuxRadio = document.getElementById('Dangereux');
        var nonDangereuxRadio = document.getElementById('NonDangereux');
        var fileUploadSection = document.getElementById('fileUploadSection');

        dangereuxRadio.addEventListener('change', function() {
          fileUploadSection.style.display = 'block';
        });

        nonDangereuxRadio.addEventListener('change', function() {
          fileUploadSection.style.display = 'none';
        });
      });
    </script>

</html>
