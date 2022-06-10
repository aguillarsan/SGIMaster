<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
    </head>
    <body>
        <div style="   position: relative;
    display: inline-block;
    text-align: center;">
            <img src="./logosEntel/form2.png" style="width: 108%; height: 230px; margin-left: -25px;">
                <div style="margin-top:145px; ;margin-left:-520px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$ticket->site->nem_site}} {{$ticket->site->nombre}}
                </div>
                <div style="margin-top:165px;margin-left:-520px; font-size: 14px;font-family: bold; position:absolute;">
                    
                </div>
                <div style="margin-top:185px;margin-left:-520px;  font-size: 14px;font-family: bold; position:absolute;">
                    {{$ticket->site->site_type->site_type}}
                </div>
                <div style="margin-top:205px;margin-left:-520px;  font-size: 14px;font-family: bold; position:absolute;">
                    {{$ticket->site->classification_type_id == 1 ? 'A':($ticket->site->classification_type_id == 2 ? 'B':($ticket->site->classification_type_id == 3 ? 'C':($ticket->site->classification_type_id == 4 ? 'D':($ticket->site->classification_type_id == 5 ? 'E':''))))}}
                </div>
                <div style="margin-top:145px;margin-left:-100px;  font-size: 14px;font-family: bold; position:absolute;">
                    {{$ticket->ework}}
                </div>
                <div style="margin-top:165px;margin-left:-107px;  font-size: 11px;font-family: bold; position:absolute;">
                    E_OYM_IFRAES
                </div>
                <div style="margin-top:185px;margin-left:-100px;  font-size: 14px;font-family: bold; position:absolute;">
                    {{$ticket->site->pop->comuna->zona->crm->nombre_crm}}
                </div>
                <div style="margin-top:205px;margin-left:-100px;  font-size: 14px;font-family: bold; position:absolute;">
                    ${{ number_format($ticket->prevalorizacion)}}
                </div>
            </img>
        </div>
        <div style="position: relative;display: block ;">
            <img src="./logosEntel/descripcion.png" style="width: 698px; height: 100px; margin-left: ;">
            </img>
            <div style=" margin-left: -600px ; margin-top:5px; font-size: 14px;font-family: bold; position:absolute; word-break: break-all">
                <textarea style="width: 45%; height:80px;font-family: bold;">
                    {{$ticket->descripcion}}
                </textarea>
            </div>
        </div>
        <div style="position: relative;display: block ;">
            <img src="./logosEntel/datossitio.png" style="width: 698px; height: 170px; margin-left: ;">
            </img>
            <div style="margin-top:30px;margin-left:-350px; font-size: 14px;font-family: bold; position:absolute;">
                {{$ticket->site->pop->latitude}}
            </div>
            <div style="margin-top:55px;margin-left:-350px; font-size: 14px;font-family: bold; position:absolute;">
                {{$ticket->site->pop->longitude}}
            </div>
            <div style="margin-top:77px;margin-left:-350px; font-size: 14px;font-family: bold; position:absolute;">
                {{$ticket->site->pop->direccion}}
            </div>
            <div style="margin-top:100px;margin-left:-350px; font-size: 14px;font-family: bold; position:absolute;">
                {{$ticket->site->pop->comuna->nombre_comuna}}
            </div>
            <div style="margin-top:125px;margin-left:-350px; font-size: 14px;font-family: bold; position:absolute;">
                {{$ticket->site->pop->comuna->region->nombre_region}}
            </div>
        </div>
        <div style="position: relative;display: block ; left: 0;top: 0">
            <img src="./logosEntel/imagenSitio.jpg" style="width: 105%; height: 430px;margin-left: -10px; position: absolute;z-index: -1">
                <img src="{{$imagePath}}" style="position: absolute;height: 380px; width: 660px; top: 30px;z-index: 1; left: 40px;">
                </img>
            </img>
        </div>
        @foreach($archivos as $archivo)
          @if($archivo->numero == 1)
        <div style=" page-break-after: always;">
        </div>
        <div style="position: absolute;margin-top: ">
            <img src="./logosEntel/formatofoto.jpg" style="width: 680px; height: 50px; margin-left: ;">
            </img>
        </div>
        @endif
        <div style="margin-top: 100px;">
            @if($archivo->numero == 1 )
            <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 20px;">
                @endif
        	@if($archivo->numero == 2 )
                <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 400px;margin-top:-418px;">
            @endif
        	@if($archivo->numero == 3 )
                    <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 20px;margin-top: -60px;">
                     
                    </img>
                
            @endif
            @if($archivo->numero == 4 )
                <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 400px;margin-top:-418px;">
            @endif
        </div>
        @if($archivo->numero == 5)
        <div style=" page-break-after: always;">
        </div>
        <div style="position: absolute;margin-top: ">
            <img src="./logosEntel/formatofoto.jpg" style="width: 680px; height: 50px; margin-left: ;">
            </img>
        </div>
        @endif
        <div style="margin-top: 100px;">
            @if($archivo->numero == 5 )
            <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 20px;">
                @endif
        	@if($archivo->numero == 6 )
                <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 400px;margin-top:-418px;">
            @endif
        	@if($archivo->numero == 7 )
                    <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 20px;margin-top: -60px;">
                     
                    </img>
                
            @endif
            @if($archivo->numero == 8 )
                <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 400px;margin-top:-418px;">
            @endif
        </div>

        @if($archivo->numero == 9)
        <div style=" page-break-after: always;">
        </div>
        <div style="position: absolute;margin-top: ">
            <img src="./logosEntel/formatofoto.jpg" style="width: 680px; height: 50px; margin-left: ;">
            </img>
        </div>
        @endif
        <div style="margin-top: 100px;">
            @if($archivo->numero == 9 )
            <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 20px;">
                @endif
        	@if($archivo->numero == 10 )
                <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 400px;margin-top:-418px;">
            @endif
        	@if($archivo->numero == 11 )
                    <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 20px;margin-top: -60px;">
                     
                    </img>
                
            @endif
            @if($archivo->numero == 12 )
                <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 400px;margin-top:-418px;">
            @endif
        </div>
        @if($archivo->numero == 13)
        <div style=" page-break-after: always;">
        </div>
        <div style="position: absolute;margin-top: ">
            <img src="./logosEntel/formatofoto.jpg" style="width: 680px; height: 50px; margin-left: ;">
            </img>
        </div>
        @endif
        <div style="margin-top: 100px;">
            @if($archivo->numero == 13 )
            <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 20px;">
                @endif
        	@if($archivo->numero == 14 )
                <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 400px;margin-top:-418px;">
            @endif
        	@if($archivo->numero == 15 )
                    <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 20px;margin-top: -60px;">
                     
                    </img>
                
            @endif
            @if($archivo->numero == 16 )
                <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 400px;margin-top:-418px;">
            @endif
        </div>
          @if($archivo->numero == 17)
        <div style=" page-break-after: always;">
        </div>
        <div style="position: absolute;margin-top: ">
            <img src="./logosEntel/formatofoto.jpg" style="width: 680px; height: 50px; margin-left: ;">
            </img>
        </div>
        @endif
        <div style="margin-top: 100px;">
            @if($archivo->numero == 17 )
            <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 20px;">
                @endif
        	@if($archivo->numero == 18 )
                <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 400px;margin-top:-418px;">
            @endif
        	@if($archivo->numero == 19 )
                    <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 20px;margin-top: -60px;">
                     
                    </img>
                
            @endif
            @if($archivo->numero == 20 )
                <img src="./archivos/{{$archivo->nombre_archivo}}" style="width: 300px;height: 320px;margin-left: 400px;margin-top:-418px;">
            @endif
        </div>
        @endforeach
    </body>
</html>