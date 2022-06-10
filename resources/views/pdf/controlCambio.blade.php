<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
        <link href="../bootstrap/css/bootstrap.min.css">
        </link>
    </head>
    <style>
        .content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: grey;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: black;
}
    </style>
    <body>
        <div style="position: relative;display: inline-block;text-align: center;">
            <img src="./ControlCambioImg/ControlCambioHeader.png" style="width: 108%; height: 230px; margin-left: -25px;">
                <div style="margin-top:50px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    <h2 style="margin-left:-856px ; margin-top: -40px; font-size: 32px;">
                        {{$data_request->nombre_proyecto}}
                        <h2>
                        </h2>
                    </h2>
                </div>
                <div style="margin-top:110px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->pep_proyecto}}
                </div>
                <div style="margin-top:140px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->nombre_cliente}}
                </div>
                <div style="margin-top:165px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->nro_control_cambio}}
                </div>
                <div style="margin-top:208px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->autor}}
                </div>
                <div style="margin-top:165px; ;margin-left:-290px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->estado_control_cambio->descripcion}}
                </div>
                <div style="margin-top:208px; ;margin-left:-290px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->created_at->format('d/m/Y')}}
                </div>
            </img>
        </div>
        <div style="position: relative;display: block ;">
            <img src="./ControlCambioImg/PuntoUno.png" style="width: 100%; height:190px ; margin-top: 20px;">
                <div style="margin-top:140px; ;margin-left:-480px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->area_departamento}}
                </div>
                <div style="margin-top:157px; ;margin-left:-480px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->lugar_trabajo_jp}}
                </div>
                <div style="margin-top:175px; ;margin-left:-480px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->direccion_mail}}
                </div>
            </img>
        </div>
        <div style="position: relative;display: block ;">
            <img src="./ControlCambioImg/PuntoDos.png" style="width: 100%; height:110px ; margin-top: 15px;margin-left: -4px;">
                @foreach($type_request as $type)
              @if($type->tipo_solicitud_control_cambio_id == 1)
                <div style="margin-top: 78px;margin-left:-461 ;position:absolute;">
                    <strong style="font-family: bold">
                        X
                    </strong>
                </div>
                @endif
            
            @endforeach
            @foreach($type_request as $type)
              @if($type->tipo_solicitud_control_cambio_id == 2)
                <div style="margin-top: 78px;margin-left:-386;position:absolute;">
                    <strong style="font-family: bold">
                        X
                    </strong>
                </div>
                @endif
            @endforeach
            @foreach($type_request as $type)  
              @if($type->tipo_solicitud_control_cambio_id == 3)
                <div style="margin-top: 78px;margin-left:-268;position:absolute;">
                    <strong style="font-family: bold">
                        X
                    </strong>
                </div>
                @endif
            @endforeach
            @foreach($type_request as $type)  
               @if($type->tipo_solicitud_control_cambio_id == 4)
                <div style="margin-top: 78px;margin-left:-196;position:absolute;">
                    <strong style="font-family: bold">
                        X
                    </strong>
                </div>
                @endif
            @endforeach  
            @foreach($type_request as $type)  
               @if($type->tipo_solicitud_control_cambio_id == 5)
                <div style="margin-top: 78px;margin-left:-38;position:absolute;">
                    <strong style="font-family: bold;">
                        X
                    </strong>
                </div>
                @endif
            @endforeach
            </img>
        </div>
        <div style="position: relative;display: block ;">
            <img src="./ControlCambioImg/PuntoTres.png" style="width: 100%; height:150px ; margin-top: 15px;margin-left: -1px;">
                <div style="margin-top:120px ;margin-left:-600px;position:absolute;">
                    <textarea style="width: 45%; height:150px;font-family: bold;margin-left: -50px;border-color: white">{{$data_request->alcance}}
                    </textarea>
                </div>
            </img>
        </div>
        <div style="position: relative;display: block ;margin-left: ">
            <img src="./ControlCambioImg/PuntoTresDos.png" style="width: 100%; height:130px ; margin-top: 30px;margin-left:-0.9px ;">
                <div style="position:absolute;margin-left: -425px;margin-top: 75px;">
                    {{date('d-m-yy',strtotime($data_request->nueva_fecha_termino))}}
                </div>
                <div style="position:absolute;margin-left: -425px;margin-top: 95px;">
                    {{date('d-m-yy',strtotime($data_request->fecha_termino_anterior))}}
                </div>
                <div style="position:absolute;margin-left: -425px;margin-top: 115px;">
                    {{date('d-m-yy',strtotime($data_request->fecha_paso_produccion))}}
                </div>
                <div style="position:absolute;margin-left: -425px;margin-top: 135px;">
                    {{$data_request->total_dias_desvio}}
                </div>
                <div style="margin-top:170px ;margin-left:-603px;position:absolute;">
                    <textarea style="width: 45%; height:150px;font-family: bold;margin-left: -50px;border-color: white">{{$data_request->justificacion__extension_plazo}}
                    </textarea>
                </div>
            </img>
        </div>
        <div style=" page-break-after: always;">
        </div>
        <div style="position: relative;display: inline-block;text-align: center;">
            <img src="./ControlCambioImg/ControlCambioHeader.png" style="width: 108%; height: 230px; margin-left: -25px;">
                <div style="margin-top:50px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    <h2 style="margin-left:-856px ; margin-top: -40px; font-size: 32px;">
                        {{$data_request->nombre_proyecto}}
                        <h2>
                        </h2>
                    </h2>
                </div>
                <div style="margin-top:110px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->pep_proyecto}}
                </div>
                <div style="margin-top:140px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->nombre_cliente}}
                </div>
                <div style="margin-top:165px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->nro_control_cambio}}
                </div>
                <div style="margin-top:208px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->autor}}
                </div>
                <div style="margin-top:165px; ;margin-left:-290px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->estado_control_cambio->descripcion}}
                </div>
                <div style="margin-top:208px; ;margin-left:-290px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->created_at->format('d/m/Y')}}
                </div>
            </img>
        </div>
        <div style="position: relative;display: block ;margin-left: ">
            <img src="./ControlCambioImg/PuntoTresTres.png" style="width: 100%; height:130px ; margin-top: 30px;margin-left:-0.9px ;">
                @foreach($state_change as $state)
               @if($state->cambio_estado_id == 1)
                <div style="margin-top:110px ;margin-left:-623px;position:absolute;">
                    <strong>
                        X
                    </strong>
                </div>
                @endif
             @endforeach
             @foreach($state_change as $state)
               @if($state->cambio_estado_id == 2)
                <div style="margin-top:110px ;margin-left:-473px;position:absolute;">
                    <strong>
                        X
                    </strong>
                </div>
                @endif
             @endforeach
             @foreach($state_change as $state)
               @if($state->cambio_estado_id == 3)
                <div style="margin-top:110px ;margin-left:-316px;position:absolute;">
                    <strong>
                        X
                    </strong>
                </div>
                @endif
             @endforeach
             @foreach($state_change as $state)
               @if($state->cambio_estado_id == 4)
                <div style="margin-top:110px ;margin-left:-123px;position:absolute;">
                    <strong>
                        X
                    </strong>
                </div>
                @endif
             @endforeach
            </img>
        </div>
        <div style=" page-break-after: always;">
        </div>
        <div style="position: relative;display: inline-block;text-align: center;">
            <img src="./ControlCambioImg/ControlCambioHeader.png" style="width: 108%; height: 230px; margin-left: -25px;">
                <div style="margin-top:50px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    <h2 style="margin-left:-856px ; margin-top: -40px; font-size: 32px;">
                        {{$data_request->nombre_proyecto}}
                        <h2>
                        </h2>
                    </h2>
                </div>
                <div style="margin-top:110px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->pep_proyecto}}
                </div>
                <div style="margin-top:140px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->nombre_cliente}}
                </div>
                <div style="margin-top:165px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->nro_control_cambio}}
                </div>
                <div style="margin-top:208px; ;margin-left:-551px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->autor}}
                </div>
                <div style="margin-top:165px; ;margin-left:-290px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->estado_control_cambio->descripcion}}
                </div>
                <div style="margin-top:208px; ;margin-left:-290px ; font-size: 14px;font-family: bold; position:absolute;">
                    {{$data_request->created_at->format('d/m/Y')}}
                </div>
            </img>
        </div>
        <div style="position: relative;display: block ;margin-left: ">
            <img src="./ControlCambioImg/PuntoCuatro.png" style="width: 100%; height:25px ; margin-top: 30px;margin-left:-0.9px ;">
                <div style="margin-top:60px ;margin-left:-458px;position:absolute;">
                    <textarea style="width: 54%; height:160px;font-family: bold;margin-left: -200px;border-color:white">{{$data_request->justificacion_capex}}
                    </textarea>
                </div>
            </img>
        </div>
        <div style="position: relative;display: block ;margin-left: ;margin-top: 60px;">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>
                            Item
                        </th>
                        <th>
                            Costo
                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                   @foreach($items as $item)
                    <tr class="active-row">

                        <td style="text-align: center">
                            {{$item->item}}
                        </td>
                        <td style="text-align: center">
                             ${{number_format($item->monto)}}
                        </td>
                       
                    </tr>
                    @endforeach
                   
                </tbody>
                   <thead>
                    <tr>
                        <th>
                            Total Solicitado
                        </th>
                        <th>
                           
                        </th>
                       
                    </tr>
                </thead>
            </table>
        </div>
    </body>
</html>