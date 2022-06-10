<table>
    <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                SITIO
            </th>
            <th>
                NOMBRE SITIO
            </th>
            <th>
                OFICINA ZONAL
            </th>
            <th>
                MATERIALES
            </th>
            <th>
                CANTIDAD
            </th>
            <th>
                SHAREPOINT
            </th>
             <th>
                PEP DESTINO
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($solicitud as $s)
        <tr>
            <td>
                {{$s->id}}
            </td>
            <td>
                @if($s->site_id != null)
               {{$s->site->nem_site}}
               @endif
            </td>
            <td>
                @if($s->site_id != null)
            {{$s->site->nombre}}
            @endif
            </td>
            <td>
                @if($s->oficina_id != null)
         {{$s->oficina->region }} {{$s->oficina->zona}}
         @endif
            </td>
            <td>
                {{$s->marca->descripcion}} 
        @if($s->capacidad_id != null)
        {{$s->capacidad->descripcion}}
        @endif
            </td>
            <td>
                {{$s->total_activo}}
            </td>
            <td>
                {{$s->nro_pedido}}
            </td>
            <td>
                {{$s->pep_destino}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
