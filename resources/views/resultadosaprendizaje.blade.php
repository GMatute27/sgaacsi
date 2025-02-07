<!DOCTYPE html>
<html lang="en">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/scriptresu.js','resources/css/indexresu1.css'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="index.css">
</head>
<x-header></x-header>
<body>
    
    <main class="container">
        <section class="form-section">
            <h2 class="title">0.1.- Resultados aprendizajes</h2>

            <p>Descargue el archivo, editelo en su computador y luego vuelva a subirlo al sistema</p>
            <a href="{{ asset('/storage/uploads/Doc.docx') }}" target="_blank">
            <button class="download-button">
                <div class="docs">
                    
                    <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                
                    Descargar el archivo
                </div>
                <div class="download">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                </div>
            </button>
            </a>
            <div class="form-group">
                @if(auth()->user()->rol==1)
                <form action="{{url("resultadoapre/")}}" method="POST" enctype="multipart/form-data" @if(auth()->user()->rol==2) disabled @endif @foreach ($data as $rep) @if($rep)   disabled  @endif  @endforeach>
                    @csrf
                @endif
                    <input type="hidden" name="fundamentacion" value="No aplica">
                <label>Subida de archivo</label>
                <div class="file-upload">
                    <input type="file" id="file-input" name="evidencia" @if(auth()->user()->rol==2) disabled @endif @foreach ($data as $rep) @if($rep)   disabled             @endif  @endforeach >
                    <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z">
                        </path>
                    </svg>
                    <p>Arrastra tu archivo aquí o haz clic para seleccionar</p>
                    @foreach ($data as $rep) @if($rep) <a href="{{ asset($rep->evidencia) }}" target="_blank">{{$rep->evidencia}}</a> @endif  @endforeach
                </div>
                <button id="delete-file" class="btn btn-danger" style="display: none;">Eliminar</button>
            </div>


            <div class="form-group">
                <label>Observaciones</label>
                <textarea maxlength="300" name="observacion" placeholder="Escribe tus observaciones aquí..." @if(auth()->user()->rol==2) disabled @endif @foreach ($data as $rep) @if($rep)   disabled             @endif  @endforeach>@foreach ($data as $rep) @if($rep)   {{$rep->observacion}}             @endif  @endforeach</textarea>
                <div class="char-count">300 caracteres restantes</div>
            </div>

            <div class="comments-container" style="width: 100%;">
                <div class="comments-header">
                    <h2>Comentarios del facilitador en indicadores</h2>
                </div>
                <div class="comments-content ">
                    <div class="no-comments">
                        @foreach ($data1 as $rep)
                        @foreach ($rep->comentarios as $com)
                            <p>{{$com->created_at}} : {{$com->comentario}}</p>
                            <br>
                        @endforeach
                        @endforeach
                        @if(auth()->user()->rol==2)
                        <form action="{{url('comentarios')}}" method="post">
                            @csrf
                            
                            @foreach ($data1 as $item)
                            <input type="hidden" name="idindicadores" value="{{$item->idindicadores}}"> 
                            
                            @endforeach
                            <input type="hidden" name="idcolegios" value="{{$id}}"> 
    
                            <textarea name="comentario" class="documentation" placeholder="Escriba aquí su comentario..." ></textarea>
                            <button type="submit" class="btn btn-primary" >Comentar</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @if(auth()->user()->rol==1)
            <div class="button-group" @foreach ($data as $rep) @if($rep)   hidden             @endif  @endforeach>
                <button class="btn btn-secondary">Guardar</button>
                <button class="btn btn-primary">Guardar y pasar a la siguiente pregunta</button>
            </div> 
        </form>
        @endif

        </section>
   

    </main>
    <script src="script.js"></script>
    <x-footer></x-footer>
</body>

</html>