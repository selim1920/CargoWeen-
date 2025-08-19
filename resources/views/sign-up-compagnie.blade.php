<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>CargoWeen</title>
    <link href="assets/img/icone-logo.png" rel="icon">
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="{{route('create_compagnie')}}" method="post" autocomplete="off" class="sign-in-form" id="login-form">
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
            <h2 class="title">Inscription Compagnie</h2>
            <div class="form-step" id="step1" >
              <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="name" id="name" placeholder="Nom d'utilisateur" value="{{old('name')}}"/>
            </div>
            @error('name')<font color="red">{{ $message }}</font>@enderror
              <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text"  name="prenom" id="prenom" placeholder="Prénom" value="{{old('prenom')}}" />
            </div>
            @error('prenom')<font color="red">{{ $message }}</font>@enderror
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="nom_compagnie_aerienne" id="nom_compagnie_aerienne" placeholder="Nom_Companie" value="{{old('nom_compagnie_aerienne')}}"/>
            </div>
            @error('nom_compagnie_aerienne')<font color="red">{{ $message }}</font>@enderror
              <div class="input-field">
              <i class="fas fa-map-marker" ></i>
              <input type="text" name="adresse" id="adresse" placeholder="Adresse" value="{{old('adresse')}}"/>
            </div>
            @error('adresse')<font color="red">{{ $message }}</font>@enderror
              <div class="input-field">
              <i class="fas fa-home"></i>
              <input type="text" name="ville" id="ville" placeholder="Ville" value="{{old('ville')}}"/>
            </div>
            @error('ville')<font color="red">{{ $message }}</font>@enderror
              <div class="input-field">
              <i class="fas fa-map-pin "></i>
              <input type="text" name="code_postal" id="code_postal" placeholder="Code Postal" value="{{old('code_postal')}}"/>
            </div>
            @error('code_postal')<font color="red">{{ $message }}</font>@enderror

            <input type="button" value="Next" class="btn1 solid">
            <input type="button" value="Next" class="btn solid" onclick="nextStep(1)"/>
          </div>
          <div class="form-step" id="step2">
            <div class="input-field">
                <i class="fas fa-flag"></i>
                <input type="text" name="pays" id="pays" placeholder="Pays"  value="{{old('pays')}}" required autofocus autocomplete="pays" />
              </div>

            <div class="input-field">
              <i class="fas fa-briefcase"></i>
              <input type="text" name="fonction" id="fonction" placeholder="Fonction" value="{{old('fonction')}}" required autofocus autocomplete="fonction"  />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="email" placeholder="Email" value="{{old('email')}}" required autofocus autocomplete="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="text" name="telephone" id="telephone" placeholder="Telephone" value="{{old('telephone')}}" required autofocus autocomplete="telephone" />
            </div>
            <div class="input-field">
              <i class="fas fa-plane"></i>
              <input type="text"  name="code_airport" id="code_airport" placeholder="Code_Airport" value="{{old('code_airport')}}" required autofocus autocomplete="code_airport" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" name="code_LATA" id="code_LATA" placeholder="code_IATA" value="{{old('code_LATA')}}" required autofocus autocomplete="code_LATA" />
            </div>

            <input type="button" value="Previous" class="btn solid" onclick="prevStep(2)"/>
            <input type="submit" value="S inscrire" class="btn solid" />
          </div>
          </form>
        </div>
      </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Connecting Air Cargo</h3>
            <p>
              BIENVENUE SUR NOTRE NOUVEAU SITE WEB CARGOWEEN.COM
            </p>
            <br>
            <a href="/Login" class="a" id="sign-up-btn" >
                Sign in
              </a>

            </button>
          </div>
          <img src="img/log2.png" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="app.js"></script>
  </body>
</html>
