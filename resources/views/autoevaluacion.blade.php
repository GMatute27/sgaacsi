<!DOCTYPE html>
<html lang="en">
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/index2.css'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoevaluación </title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div hidden > {{$idco=0}} </div>
    <x-header> </x-header>
    <section>
            
        <div class="card-container">
            
            <div class="card">
                @if(auth()->user()->rol==1)  
                <a href= {{ url('resultadosaprendizaje') }}  class="link">
            @endif
            @if(auth()->user()->rol==2)
                <a href= {{ url('resultadosaprendizaje/'.$id)}} class="link">
            @endif
                <div class="front-content">
                    <p>Foco en el Aprendizaje Integral</p>
                </div>

                <div class="content">
                    <a disabled href="\Resultado_de_aprendizaje" class="heading"> Resultados aprendizajes</a>
                </div>
                
            </div>
            
        </div>
    </a>
    </section>
    
    @foreach ($data as $item)
    <section class="two">
        <div class="container">
            <h1>Ambito {{$item->nombre}}</h1>
            <br>
                                @php
                                    $colors = ['purple', 'blue', 'red', 'green'];
                                    $colorIndex = 0;
                                @endphp

                                @foreach ($item->dimension as $dimensio)
                                    <div class="sections">
                                        <div class="section">
                                            <input type="checkbox" id="section{{$dimensio->iddimension}}" class="section-toggle">
                                            <label for="section{{$dimensio->iddimension}}" class="section-title {{$colors[$colorIndex]}}">
                                            @php
                                                $colorIndex = ($colorIndex + 1) % count($colors);
                                            @endphp
                                                <h1>{{$dimensio->nombre}}</h1>
                                                <span class="icon">▼</span>
                                            </label>
                                            <div class="section-content">
                                                
                                                @foreach($dimensio->indicadores as $indi)
                                                
                                                    @if(auth()->user()->idrol==1)  
                                                        <a href= {{ url('evidencias/'.$indi->idindicadores ) }}  class="link">
                                                    @else
                                                        <a href= {{ url('evidencias/'.$indi->idindicadores.'/'.$id)}} class="link">
                                                    @endif
                                                <label class="custom-checkbox">
                                                     @foreach ($indi->respuesta as $item)
                                                        <input name="dummy" type="checkbox" disabled @foreach ($item->resultado as $resul)
                                                            @if($resul)
                                                                checked
                                                            @endif
                                                    @endforeach>
                                                @endforeach 
                                                            <span class="checkmark"></span>
                                                        </label>
                                                            Indicador {{$indi->nombre}}</a>
                                                @endforeach
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                                   
                    
                
                
        </div>
    </section>
    @endforeach
<br>
<br>
<br>
    </section>
    <x-footer> </x-footer>
</body>

</html>