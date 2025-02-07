<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen  </title>
    <link rel="stylesheet" href="index.css">
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/indexresu.css'])
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/indexresu.css', 'node_modules/bootstrap/dist/css/bootstrap.min.css', 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'])

</head>

<body>
    <x-header></x-header>
    <body>
        <div class="container">
            <h1 class="resumen">Resumen de Autoevaluación</h1>
            <table>
                <thead>
                    <tr>
                        <th>Indicador</th>
                        <th>Evidencia</th>
                        <th>Descripción evidencia</th>
                        <th>Observaciones</th>
                        <th>Comentarios facilitador</th>
                    </tr>
                </thead>
                <tbody> 
                    
                    @foreach($data as $dat)
                    <tr>
                       
                        <td>{{$dat->nombre}}</td>
                        <td>@foreach($dat->respuesta as $evidencia)
                            @foreach($evidencia->resultado as $evid)
                            <a href="{{ asset($evid->evidencia) }}" target="_blank">{{$evid->evidencia}}</a>
                            @endforeach
                            @endforeach</td>
                        <td>@foreach($dat->respuesta as $evidencia)
                            @foreach($evidencia->resultado as $evid)
                            {{$evid->observacion}}
                            @endforeach
                            @endforeach</td>
                        <td>@foreach($dat->respuesta as $evidencia)
                            @foreach($evidencia->resultado as $evid)
                            {{$evid->fundamentacion}}
                            @endforeach
                            @endforeach</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$dat->idindicadores}}">
                                Ver comentarios
                            </button>
                              
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal{{$dat->idindicadores}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$dat->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel{{$dat->id}}">Comentarios</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      @foreach($dat->comentarios as $com)
                                      <p><strong>{{$com->created_at}}:</strong> {{$com->comentario}}</p>
                                      @endforeach
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </td>
                       
                    </tr> @endforeach
                </tbody>
            </table>
        </div>

       <x-footer></x-footer>

    </body>
    </html>