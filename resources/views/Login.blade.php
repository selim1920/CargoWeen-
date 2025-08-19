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

          <form method="POST" action="{{ route('login') }}" class="sign-in-form">
            @csrf

            <a href="/"><img src="assets/img/logo.png"  width="300"
                height="50" ></a>
                <br>
                <br>

            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input  type="email" placeholder="Email"  name="email" :value="old('email')" required autofocus autocomplete="username"  />
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input  placeholder="Password" id="password" class="block mt-1 w-full"
              type="password"
              name="password"
              required autocomplete="current-password"  />
            </div>
            @error('email')<font color="red">{{ $message }}</font>@enderror
            @error('password')<font color="red">{{ $message }}</font>@enderror
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
    @endif
            <input type="submit" value="Login" class="btn solid" />

          </form>
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
            <a class="a"  onclick="location.href='/sign-up-compagnie'">
                compagnie aérienne
              </a>


              <a class="a" onclick="location.href='/sign-up-transitaire'">
                Transitaire</a>

          </div>
          <img src="img/log1.png" class="image" alt="" />
        </div>
      </div>
    </div>
  </body>
  <style>
    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
    }

  </style>
</html>
