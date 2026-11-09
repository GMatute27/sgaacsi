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
            <section class="report-hero">
              <div>
                <p class="report-kicker">Sistema de autoevaluación</p>
                <h1 class="resumen">Reporte de Autoevaluación</h1>
                <p class="report-subtitle">Consulta de indicadores, respuestas y evidencias registradas.</p>
              </div>
              <button type="button" class="report-print btn btn-primary" onclick="window.print()">Imprimir / guardar reporte</button>
            </section>
          @php
            $totalIndicadores = $data->count();
            $indicadoresConRespuesta = $data->filter(function ($indicador) {
                return $indicador->respuesta->contains(function ($respuesta) {
                    return $respuesta->resultado->isNotEmpty();
                });
            })->count();
            $porcentaje = $totalIndicadores > 0 ? ($indicadoresConRespuesta / $totalIndicadores) * 100 : 0;
          @endphp
          <div class="report-progress d-flex align-items-center gap-3">
            <div>
              <span class="report-progress-label">Progreso del reporte</span>
              <strong>{{ round($porcentaje) }}%</strong>
            </div>
            <div class="progress flex-grow-1" aria-label="{{ round($porcentaje) }}% de indicadores respondidos">
              <div class="progress-bar" role="progressbar" style="width: {{ $porcentaje }}%;" aria-valuenow="{{ $porcentaje }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
            </div>
            <div class="report-summary">
              <div><span>Total de indicadores</span><strong>{{ $totalIndicadores }}</strong></div>
              <div><span>Con respuesta</span><strong>{{ $indicadoresConRespuesta }}</strong></div>
              <div><span>Pendientes</span><strong>{{ $totalIndicadores - $indicadoresConRespuesta }}</strong></div>
            </div>
            <div class="report-table-wrap">
            <table class="report-table">
                <caption class="visually-hidden">Reporte completo de indicadores y respuestas</caption>
                <thead>
                    <tr>
                        <th>Indicador</th>
                        <th>Respuesta seleccionada</th>
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
                        <td>
                            @php
                                $respuestaSeleccionada = $dat->respuesta->first(function ($respuesta) {
                                    return $respuesta->resultado->isNotEmpty();
                                });
                            @endphp
                            @if($respuestaSeleccionada)
                                <span class="response-pill">{{ $respuestaSeleccionada->respuesta }}</span>
                                <small class="response-value">Valor: {{ $respuestaSeleccionada->valor }}</small>
                            @else
                                <span class="text-muted">Sin respuesta registrada</span>
                            @endif
                        </td>
                        <td>@forelse($dat->respuesta as $evidencia)
                            @foreach($evidencia->resultado as $evid)
                            <a href="{{ asset($evid->evidencia) }}" target="_blank" rel="noopener">{{$evid->evidencia}}</a>
                            @endforeach
                            @empty
                            <span class="text-muted">Sin evidencia</span>
                            @endforelse</td>
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
                              <button type="button" class="btn btn-primary screen-only" data-bs-toggle="modal" data-bs-target="#exampleModal{{$dat->idindicadores}}">
                              Ver comentarios
                              </button>
                              <div class="print-comments">
                                @if($dat->comentarios->isEmpty())
                                  Sin comentarios
                                @else
                                  @foreach($dat->comentarios as $com)
                                    <p><strong>{{ $com->created_at }}:</strong> {{ $com->comentario }}</p>
                                  @endforeach
                                @endif
                              </div>
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
        </div>
<br>
<br>
<br>
<br>
       <x-footer></x-footer>

    </body>
    </html>
