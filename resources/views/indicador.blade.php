<!DOCTYPE html>
<html lang="es">
    @vite(['resources/css/indexevi.css'])
<x-header></x-header>

<body>


    <div class="container">
        <div class="header">
            @foreach ($data1 as $item)<h2>{{$item->dimension->nombre}} </h2>
        </div>

        <div class="indicator">
            <h3>
                {{$item->nombre}}
            </h3>
            <p>{{$item->descripcion}}</p>
            @endforeach
        </div>
        @if(auth()->user()->rol==1)
        <form action="{{url("resultado/")}}" method="POST" enctype="multipart/form-data" @if(auth()->user()->rol==2) disabled @endif @foreach ($respuesta1 as $rep) @if($rep)   disabled             @endif  @endforeach >
            @csrf
        @endif
        @foreach ($data as $item)
        <div class="options">
            <label class="option">
                <input type="radio" required name="idrespuesta" value="{{$item->id}}" class="radio-input" @if(auth()->user()->rol==2) disabled @endif @foreach ($respuesta1 as $rep)
                @if($rep->idrespuesta==$item->id)
                checked
                @endif
                disabled
                @endforeach
                @if(old('idrespuesta') == $item->id)
                checked
                @endif>
                <span>
                    {{$item->respuesta}}
                </span>
            </label>
        @endforeach
        </div>

        <div class="evidence-section">
            <h3>Evidencias <span style="color:red;">*</span></h3>
            <div class="file-upload">
                
                <input name="evidencia" required type="file" id="file-input" class="file-input" @if(auth()->user()->rol==2) disabled @endif @foreach ($respuesta1 as $rep) @if($rep)   disabled             @endif  @endforeach>
                <label for="file-input" class="file-label">

                    <p style="color:red;">Solo se permite la subida de archivos pdf con un peso no mayor a 2MB*</p>
                    <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z">
                        </path>
                    </svg>
                    <span class="file-text">Seleccionar archivo</span>
                </label>
                <p class="file-name">Ningún archivo seleccionado</p>
                @foreach ($respuesta1 as $rep) @if($rep) <a href="{{ asset($rep->evidencia) }}" target="_blank">{{$rep->evidencia}}</a> @endif  @endforeach
            </div>
        </div>

        <div class="evidence-section">
            <h3>Fundamentación de las evidencias<span style="color:red;">*</span></h3>
            <textarea name="fundamentacion" class="documentation" maxlength="300" required placeholder="Escriba aquí la fundamentación de sus evidencias..." @if(auth()->user()->rol==2) disabled @endif @foreach ($respuesta1 as $rep) @if($rep)   disabled  @endif  @endforeach>{{ old('fundamentacion', optional($respuesta1->first())->fundamentacion) }}</textarea>
        </div>
        <div class="form-group observations-section">
            <h3>Observaciones<span style="color:red;">*</span></h3>
            <textarea name="observacion"  class="documentation"  required maxlength="300" placeholder="Escribe tus observaciones aquí..." @if(auth()->user()->rol==2) disabled @endif @foreach ($respuesta1 as $rep) @if($rep)   disabled  @endif  @endforeach>@foreach ($respuesta1 as $rep) @if($rep){{$rep->observacion}}@endif @endforeach</textarea>
            <div class="char-count">300 caracteres restantes</div>
        </div>

        <div class="comments-container" style="width: 100%;">
            <div class="comments-header">
                <h2>Comentarios del facilitador en indicadores</h2>
            </div>
            <div class="comments-content">
                @if($data1->isEmpty() || $data1->first()->comentarios->isEmpty())
                    <p>No hay comentarios disponibles.</p>
                @else
                    @foreach ($data1 as $rep)
                        @foreach ($rep->comentarios as $com)
                            <p>{{$com->created_at}} : {{$com->comentario}}</p>
                            <br>
                        @endforeach
                    @endforeach
                @endif
                    @if(auth()->user()->rol==2)
                    <form action="{{url('comentarios')}}" method="post">
                        @csrf
                        @foreach ($data1 as $item)
                        <input type="hidden" name="idindicadores" value="{{$item->idindicadores}}"> 
                        
                        @endforeach
                        <input type="hidden" name="idcolegios" value="{{$id}}"> 

                        <textarea name="comentario" required class="documentation" placeholder="Escriba aquí su comentario..." ></textarea>
                        <button type="submit" class="btn btn-primary">Comentar</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        
        @if(auth()->user()->rol==1)
        <div class="button-group" style="text-align: center;" @foreach ($respuesta1 as $rep) @if($rep) hidden @endif @endforeach>
            <button class="btn btn-primary">Guardar</button>
            
        </form>
        </div>
        @endif
        </section>
    

    </div>
    </div>
    <br>
</div>
</div>


    <script src="script.js"></script>

</body>
<br>
<br>
<br>
<br>
<br>
<br>
<x-footer> </x-footer>
</html>