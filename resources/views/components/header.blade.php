<div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <header id="header">
        <a href="{{route('home')}}">
        <img src="{{asset('/assets/download-removebg-preview.png')}}" alt="logo blanco" class="logob" style="background-color: white; border-radius: 10%;"></a>
        <div class="content-header">
            <title>ACSI </title>

          <h1 class="titulo">Guía de Autoevaluación</h1>
        </div>

        @guest
         @redirect(route('login'))
        @endguest

      @if(!Route::is('login'))
    <div class="user-info">
        <span class="user-name p-6" style="color: white">Bienvenido {{auth()->user()->name}}</span>
    </div>
    
      <nav class="header-nav">
        @if(auth()->user()->rol==1)
            <a href="{{route('autoevaluacion.index')}}">Autoevaluación</a>
            <a href="{{url('resumen')}}">Resumen</a>
            <a href="#">Informe</a>
        @endif
    </nav>
    @if(!Route::is('home'))
    <a class="Btn" href="javascript:history.back()">
        <div class="sign">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
              </svg>
        </div>
        <div class="text">Volver</div>
    </a>
    @endif
    <a class="Btn" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        <div class="sign">
           <svg viewBox="0 0 512 512">
              <path
                 d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
              </path>
           </svg>
        </div>
        <div class="text">Cerrar</div>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
      @endif
    </header>
</div>