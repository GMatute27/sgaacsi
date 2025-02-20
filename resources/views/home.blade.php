<!DOCTYPE html>
<html lang="es">
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/index.css'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <x-header></x-header>
    @if(auth()->user()->rol==1)
    <nav>
        <div class="contact-list">
            <div class="contact-item facilitadores">
                <p>Facilitadores</p>
                <p>Any Guinand</p>
                <span>anyguinand@gmail.com</span>
            </div>
            <div class="contact-item profesional">
                <p>Profesional de apoyo</p>
                <p>Aún no han sido designados</p>
            </div>
            <div class="contact-item direccion">
                <p>Dirección del sistema</p>
                <p>Mora Podestá</p>
                <span>mora.podesta@flacsi.net</span>
            </div>
            <div class="contact-item asistencia">
                <p>Asistencia técnica</p>
                <p>Jimena Sandoya</p>
                <span>asistenciascge@flacsi.net</span>
            </div>
        </div>
    </nav>
    <section>
        <div class="card-container">
            <div class="card">
                <div class="card__img" style="background-image: url('{{asset('/assets/1.jpg')}}');"></div>
                <div class="card-int__title">Ingresa a la plataforma de autoevaluación</div>

                <a href="{{url('/autoevaluacion')}}"><button class="card-int__button">Ingresar</button></a>
            </div>
            <div class="card">

                <div class="card__img2"style="background-image: url('{{asset('/assets/2.jpg')}}');" ></div>
                <div class="card-int__title">Ver resumen de autoevaluación</div>

                <a href="{{url('/resumen')}}"><button class="card-int__button">Ingresar</button></a>
            </div>
            <div class="card">
                <div class="card__img3" style="background-image: url('{{asset('/assets/3.jpg')}}');"></div>
                <div class="card-int__title">Ver su informe final</div>
                <br>
                <button class="card-int__button">NO DISPONIBLE</button>
            </div>
        </div>
        </div>

    </section>
    @else
        <br><br>
        <br>
        <br>
    <section>
        <div class="card-container">
            <div class="card">
                <div class="card__img" style="background-image: url('{{asset('/assets/jo.png')}}'); background-size: contain; background-color: white;"></div>
                <div class="card-int__title">Jesús Obrero</div>
                <a href="{{url('autoevaluacion/facilitador/1')}}"><button class="card-int__button">Ingresar</button></a>
            </div>
            <div class="card">
                <div class="card__img" style="background-image: url('{{asset('/assets/si.png')}}'); background-size: contain; background-color: white;"></div>
                <div class="card-int__title">San Ignacio</div>
                <a href="{{url('autoevaluacion/facilitador/2')}}"><button class="card-int__button">Ingresar</button></a>
            </div>
            <div class="card">
                <div class="card__img" style="background-image: url('{{asset('/assets/lg.png')}}'); background-size: contain; background-color: white;"></div>
                <div class="card-int__title">Loyola Gumilla</div>
                <a href="{{url('autoevaluacion/facilitador/3')}}"><button class="card-int__button">Ingresar</button></a>
            </div>
            <div class="card">
                <div class="card__img" style="background-image: url('{{asset('/assets/g.jpg')}}'); background-size: contain; background-color: white;"></div>
                <div class="card-int__title">Gonzaga</div>
                <a href="{{url('autoevaluacion/facilitador/4')}}"><button class="card-int__button">Ingresar</button></a>
            </div>
        </div>
    </section>
    @endif
    <br><br>
    <x-footer> </x-footer>

</body>

</html>