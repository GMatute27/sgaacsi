<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="index.css" />
</head>

<body>
    <x-header></x-header>

    <nav>
        <div class="contact-list">
            <div class="contact-item facilitadores">
                <p>Facilitadores</p>
                <p>Ana Guinand</p>
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

                <button class="card-int__button">Ingresar</button>
            </div>
            <div class="card">

                <div class="card__img2"style="background-image: url('{{asset('/assets/2.jpg')}}');" ></div>
                <div class="card-int__title">Ver resumen de autoevaluación</div>

                <button class="card-int__button">Ingresar</button>
            </div>
            <div class="card">
                <div class="card__img3" style="background-image: url('{{asset('/assets/3.jpg')}}');"></div>
                <div class="card-int__title">Ver su informe final</div>
                <br>
                <button class="card-int__button">Ingresar</button>
            </div>
        </div>
        </div>

        <div class="comments-container">
            <div class="comments-header">
                <h2>Comentarios del facilitador en indicadores</h2>
            </div>
            <div class="comments-content">
                <div class="no-comments">
                    Aún no hay comentarios
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>FLACI ACSI copyright 2024</p>
    </footer>
</body>

</html>