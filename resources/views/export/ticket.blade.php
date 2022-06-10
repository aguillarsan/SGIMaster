<table>
    <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                ESTADO
            </th>
            <th>
                CREADOR
            </th>
            <th>
                NEMONICO
            </th>
            <th>
                TIPO SITIO
            </th>
            <th>
                NOMBRE
            </th>
            <th>
                CATEGORIA
            </th>
            <th>
                ZONA
            </th>
            <th>
                COD_ZONA
            </th>
            <th>
                CRM
            </th>
            <th>
                ÁREA
            </th>
            <th>
                TECNICA
            </th>
            <th>
                EQUIPO
            </th>
            <th>
                FECHA DE CREACION
            </th>
            <th>
                FECHA DE TERMINO
            </th>
            <th>
                MOTIVO
            </th>
            <th>
                NRO° MANTENCION
            </th>
            <th>
                DESCRIPCION
            </th>
            <th>
                CAMBIO A EN CURSO
            </th>
            <th>
                CAMBIO A VALIDACÍON
            </th>
            <th>
                CAMBIO A FINALIZADA
            </th>
            <th>
                MANTENCION ENERGIA
            </th>
            <th>
                MANTENCION CLIMA
            </th>
            <th>
                MANTENCION GG.EE
            </th>
            <th>
                NRO SGC
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($ticket as $t)
        <tr>
            <td>
                {{$t->id}}
            </td>
            <th>
                {{$t->estado ?strtoupper($t->estado->descripcion):''}}
            </th>
            <td>
                {{strtoupper($t->user->name)}} {{strtoupper($t->user->apellido)}}
            </td>
            <th>
                {{$t->site ? $t->site->nem_site:''}}
            </th>
            <th>
                @if($t->site_id != null)
     @if($t->site->site_type_id == 1)
     FIJO
     @endif

     @if($t->site->site_type_id == 2)
     MOVIL
     @endif
     @if($t->site->site_type_id == 3)
     SWITCH
     @endif

     @if($t->site->site_type_id == 4)
     PHONE
     @endif
     @endif
            </th>
            <th>
                @if($t->site_id != null)
     {{$t->site->nombre}}
     @endif
            </th>
            <th>
                @if($t->site_id != null)
                
     @if($t->site->classification_type_id != null)
     @if($t->site->classification_type_id  ==1)
     A
     @endif
     @if($t->site->classification_type_id  ==2)
     B
     @endif
     @if($t->site->classification_type_id  ==3)
     C
     @endif
     @if($t->site->classification_type_id  ==4)
     D
     @endif
     @if($t->site->classification_type_id  ==5)
     E
     @endif
     @endif
     @endif
            </th>
            <th>
                {{$t->site ?  $t->site->pop->comuna->zona->nombre_zona:''}}
            </th>
            <th>
                {{$t->site ? $t->site->pop->comuna->zona->cod_zona:''}}
            </th>
            <th>
                {{$t->crm ? $t->crm->nombre_crm:''}}
            </th>
            <th>
                {{$t->area ? $t->area->descripcion:''}}
            </th>
            <th>
                {{$t->tecnica ? $t->tecnica->descripcion:''}}
            </th>
            <th>
                {{$t->equipo ? $t->equipo->descripcion:''}}
            </th>
              <th>
                @if($t->created_at != null)
 {{substr($t->created_at,8,-8)}}/{{substr($t->created_at,5,-12)}}/{{substr($t->created_at,0,-15)}}
 @else
 SIN FECHA DE CREACIÓN
 @endif
            </th>
            <th>
                @if($t->fecha_compromiso != null)
 {{substr($t->fecha_compromiso,8,-8)}}/{{substr($t->fecha_compromiso,5,-12)}}/{{substr($t->fecha_compromiso,0,-15)}}
 @else
 SIN FECHA DE TERMINIO
 @endif
            </th>
            <th>
                {{$t->tipo_motivo ? strtoupper($t->tipo_motivo->descripcion):''}}
            </th>
            <th>
                {{$t->trimestre == 1 ? 'PRIMERA MANTENCIÓN':($t->trimestre==2 ? '   SEGUNDA MANTENCIÓN':($t->trimestre == 3 ? 'TERCERA MANTENCÓN':($t->trimestre == 4 ?'CUARTA MANTENCIÓN':($t->trimestre == 5 ?'QUINTA MANTENCIÓN':'') )))}}
            </th>
            <th>
                {{$t->descripcion}}
            </th>
            <th>
                {{$t->fecha_curso}}
            </th>
            <th>
                {{$t->fecha_validacion}}
            </th>
            <th>
                {{$t->fecha_finalizada}}
            </th>
            <th>
                {{$t->mantencion_energia}}
            </th>
            <th>
                {{$t->mantencion_clima}}
            </th>
            <th>
                {{$t->mantencion_ge}}
            </th>
            <th>
                @if(Helper::solicitudSgc($t->id) != null)
                 @php
                    $solicitud = Helper::solicitudSgc($t->id)
                 @endphp
                 @foreach($solicitud as $s)
                     {{$s->id}}
                 @endforeach
               @endif
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
