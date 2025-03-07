<!DOCTYPE html>
<html lang="es">

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
          @if(auth()->user()->rol == 2)
                    <h1 style="font-size: 2.5em; font-weight: bold; color: #333;">
                         
                        @if ($id==2)
                        Colegio San Ignacio
                        @elseif ($id==1)
                        Colegio Jesús Obrero
                        @elseif ($id==3)
                        Colegio Loyola Gumilla
                        @elseif ($id==4)
                        Colegio Gonzaga
                        @endif
                    </h1>
            @endif
            <div class="d-flex justify-content-between align-items-center">
          <h1 class="resumen">Resumen de Autoevaluación</h1> <h2 class="">Porcentaje de progreso:</h2> 
          @php
            $porcentaje = 0;
            $totalIndicadores = count($data);
            $indicadoresConRespuesta = 0;
            foreach ($data as $dat) {
              foreach($dat->respuesta as $evidencia){
            foreach($evidencia->resultado as $evid) {
                if($evid->evidencia != null) {
              $indicadoresConRespuesta++; 
                }
            }
              }
            }
            $porcentaje = $totalIndicadores > 0 ? ($indicadoresConRespuesta / $totalIndicadores) * 100 : 0;
          @endphp
          <div class="progress" style="width: 50%;">
            <div class="progress-bar" role="progressbar" style="width: {{ $porcentaje }}%;" aria-valuenow="{{ $porcentaje }}" aria-valuemin="0" aria-valuemax="100">{{ round($porcentaje) }}%</div>
          </div>
            </div>
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
                            <div class="position-relative d-inline-block">
                                @if(!$dat->comentarios->isEmpty())
                                <span class="badge bg-info position-absolute top-0 start-100 translate-middle">{{ $dat->comentarios->count() }}</span>
                                @endif
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$dat->idindicadores}}">
                              Ver comentarios
                              </button>
                            </div>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal{{$dat->idindicadores}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$dat->id}}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel{{$dat->id}}">Comentarios</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if($dat->comentarios->isEmpty())
                                        <p>Aún no hay comentarios</p>
                                        @else
                                        @foreach($dat->comentarios as $com)
                                        <p><strong>{{$com->created_at}}:</strong> {{$com->comentario}}</p>
                                        @endforeach
                                        @endif
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
<br>
<br>
<br>
<br>
       <x-footer></x-footer>

    </body>
    </html>