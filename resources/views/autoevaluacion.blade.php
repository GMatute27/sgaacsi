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
            <div style="text-align: center; margin: 20px 0;">
                @if(auth()->user()->rol == 2)
                    <h1 style="font-size: 2.5em; font-weight: bold; color: #333;">
                        Colegio  
                        @if ($id==2)
                            San Ignacio
                        @elseif ($id==1)
                            Jesús Obrero
                        @elseif ($id==3)
                            Loyola Gumilla
                        @elseif ($id==4)
                            Gonzaga
                        @endif
                    </h1>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <div style="margin-left: auto; padding-right: 10%;">
                            <a href="{{ url('resumen/'.$id) }}" class="btn btn-primary" style="font-size: 1.2em; padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; text-decoration: none;">
                                Ir al Resumen
                            </a>
                        </div>
                    </div>
                @endif
            </div>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#8263f1" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16" style="padding-left: 10px;">
                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z"/>
                    </svg>
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
            <h1>Ámbito {{$item->nombre}}</h1>
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
                                            <div class="section-content" style="text-align: center;">
                                                @foreach($dimensio->indicadores as $indi)
                                                    
                                                    @if(auth()->user()->rol==1)  
                                                        <a href="{{ url('evidencias/'.$indi->idindicadores) }}" class="link">
                                                    @endif
                                                    @if(auth()->user()->rol==2)
                                                        <a href="{{ url('evidencias/'.$indi->idindicadores.'/'.$id)}}" class="link">
                                                    @endif
                                                <label class="custom-checkbox" style="display: flex; justify-content: center; align-items: center;">
                                                    <span>Indicador {{$indi->nombre}}</span>
                                                     @foreach ($indi->respuesta as $resp)
                                                        <input name="form-check-input" id="flexCheckDisabled" type="checkbox"  
                                                        @foreach($indi->respuesta as $resp)
                                                        @foreach ($resp->resultado as $resul)
                                                            @if($resul)
                                                                checked
                                                            @endif
                                                        @endforeach
                                                    @endforeach >
                                                @endforeach 
                                                            
                                                                <span class="checkmark" ></span>
                                                            
                                                        </label></a>
                                                @endforeach
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                                   
                    @if(auth()->user()->rol==2)  
                        
                <!-- Modal -->@if (session('success'))
                <div id="successModal" class="modal" style="display:none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4);">
                    <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 80%;">
                        <span class="close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold;">&times;</span>
                        
                            <p>{{ session('success') }}</p>
                        
                    </div>
                </div>

                <script>
                    // Get the modal
                    var modal = document.getElementById("successModal");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }

                    // Function to show the modal
                    function showSuccessModal() {
                        modal.style.display = "block";
                    }

                    // Example of how to call the function
                    // showSuccessModal();
                </script>
                @endif
                @endif
                
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