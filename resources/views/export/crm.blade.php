<table>

  <thead>

    <tr>
      <th>ID</th>
      <th>ESTADO</th>
      <th>CREADOR</th>

      <th>NEMONICO</th>
      <th>TIPO SITIO</th>
      <th>NOMBRE</th>

      <th>CATEGORIA</th>
      
      <th>ZONA</th>
      <th>COD_ZONA</th>
      <th>CRM</th>
      <th>ÁREA</th>
      <th>TECNICA</th>
      <th>EQUIPO</th>
      <th>FECHA DE INICIO</th>
      <th>FECHA DE TERMINO</th>

      <th>MOTIVO</th>
      <th>DESCRIPCION</th>
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
   <td>{{strtoupper($t->user->name)}} {{strtoupper($t->user->apellido)}}</td>
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
   SIN FECHA DE INICIO
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
   {{$t->descripcion}}
 </th>
</tr>
@endforeach
</tbody>
</table>




