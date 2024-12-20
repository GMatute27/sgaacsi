<!DOCTYPE html>
<html lang="en">
  @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/index.css'])
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acsi</title>
  <link rel="stylesheet" href="index.css" />
</head>

<body>
  <x-header></x-header>
  <main class="main-content">
    <div class="container">
      <div class="form-section">
        <div class="heading">Iniciar sesión</div>
        <form class="form" action="{{ route('login') }}">
          <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="input-icon">
              <path
                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
            </svg>
            <input placeholder="Usuario" id="Usuario" name="email" value="{{ old('email') }}" type="text" class="input" required autofocus/>
          </div>
          <div class="input-group">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="input-icon">
              <path
                d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
            </svg>
            <input placeholder="Contraseña" id="Contraseña" name="password" required autocomplete="current-password" type="password" class="input" required />
          </div>
          <input value="Iniciar" type="submit" class="login-button" />
        </form>
      </div>
      <div class="info-section">
        <h2>Guía de Autoevaluación</h2>
        <p> <strong>Plataforma de acompañamiento y supervisión - Módulo apoyo evaluación y mejora </strong></p>
        <p>Esta plataforma te ayudará a evaluar y mejorar la calidad de tu institución educativa.</p>
      </div>
    </div>
  </main>
  <footer>
    <p>FLACSI ACSI copyright 2024</p>
  </footer>
</body>

</html>