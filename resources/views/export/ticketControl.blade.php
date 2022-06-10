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
            <th>
                COTIZACIONES
            </th>
            <th>
                PXQ
            </th>
            <th>
                INFORME FINAL
            </th>
             <th>
                CHECKLIST
            </th>
             <th>
                FOTOS INFORME FOTOGRAFICO
            </th>
            <th>
                DOCUMENTOS DENUNCIA
            </th>
            <th>
                OTROS
            </th>
            <th>
              EWORK
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
                @if($t->estado_id != null)
         {{strtoupper($t->estado->descripcion)}}
         @endif
            </th>
            <td>
                {{strtoupper($t->user->name)}} {{strtoupper($t->user->apellido)}}
            </td>
            <th>
                @if($t->site_id != null)
        {{$t->site->nem_site}}
        @endif
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
                @if($t->site_id != null)
   {{$t->site->pop->comuna->zona->nombre_zona}}
   @endif
            </th>
            <th>
                @if($t->site_id != null)
   {{$t->site->pop->comuna->zona->cod_zona}}
   @endif
            </th>
            <th>
                @if($t->crm_id != null)
 {{$t->crm->nombre_crm}}
 @endif
            </th>
            <th>
                @if($t->area_id != null)
 {{$t->area->descripcion}}
 @endif
            </th>
            <th>
                @if($t->tecnica_id != null)
 {{$t->tecnica->descripcion}}
 @endif
            </th>
            <th>
                @if($t->equipo_id != null)
 {{$t->equipo->descripcion}}
 @endif
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
                @if($t->tipo_motivo_id != null)
 {{strtoupper($t->tipo_motivo->descripcion)}}
 @endif
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
            <th>
                @if($t->cotizacion == 1)
                  SI
                @endif
            </th>
            <th>
                @if($t->pxq == 1)
                  SI
                @endif
            </th>
            <th>
                @if($t->informe_final == 1)
                  SI
                @endif
            </th>
             <th>
                @if($t->checklist == 1)
                  SI
                @endif
            </th>
             <th>
                @if($t->fotos_informe_fotografico == 1)
                  SI
                @endif
            </th>
             <th>
                @if($t->documento_denuncia == 1)
                  SI
                @endif
            </th>
             <th>
                @if($t->otros == 1)
                  SI
                @endif
            </th>
            <th>
              {{$t->ework}}
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
