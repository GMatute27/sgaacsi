<!DOCTYPE html>
<html lang="en">
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/index2.css'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoevaluacion </title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <x-header> </x-header>
    <section>
        <div class="card-container">
            <a href="/Resultado_de_aprendizaje">
            <div class="card">
                <div class="front-content">
                    <p>Foco en el Aprendizaje Integral</p>
                </div>
                <div class="content">
                    <a href="\Resultado_de_aprendizaje" class="heading"> Resultados aprendizajes</a>
                </div>
                <br><br><br>
                
            </div>
            </a>
        </div>
    </section>
    
    @foreach ($data as $item)
    <section class="two">
        <div class="container">
            <h1>Ambito {{$item->nombre}}</h1>
            
                    
                    @foreach ($item->dimension as $dimensio)
                        <div class="sections">
                            <div class="section">
                                <input type="checkbox" id="section1" class="section-toggle">
                                <label for="section1" class="section-title green">
                                    <h1>{{$dimensio->nombre}}</h1>
                                    <span class="icon">▼</span>
                                </label>
                                <div class="section-content">
                                    <a href="/Evidencias" class="link">
                                        <label class="custom-checkbox">
                                            <input name="dummy" type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        @foreach($dimensio->indicadores as $indi)
                                         Indicador {{$indi->nombre}}
                                        @endforeach
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                    
                
                
        </div>
    </section>
    @endforeach

    </section>
    <footer>
        <p>FLACI ACSI copyright 2024</p>
    </footer>
</body>

</html>