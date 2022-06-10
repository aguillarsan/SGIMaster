<table>
    <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                NOMBRE COMPLETO
            </th>
            <th>
                RESPONSABLE ENTEL
            </th>
            <th>
                ACTIVIDAD
            </th>
            <th>
                TEMPERATURA ACTUAL
            </th>
            <th>
                DIFICULTAD PARA RESPIRAR
            </th>
            <th>
                POSIBLE CONTACTO CON COVID-19
            </th>
            <th>
                HAS REGRESADO DESDE EL EXTRANJERO EN LO SULTIMOS 14 DIAS
            </th>
            <th>
                HAS ESTADO EN CONTACTO CON UN PACIENTE CONFIRMADO CON COVID-19
            </th>
            <th>
                TIENE OTROS SINTOMAS
            </th>
            <th>
                TIENE O TUVO FIEBRE
            </th>
            <th>
                PROVEEDOR
            </th>
            <th>
                TP O NRO DE INCIDENCIA
            </th>
            <th>
                TIPO
            </th>
            <th>
                FECHA DE CREACION
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($covid as $c)
        <tr>
            <td>
                {{$c->id}}
            </td>
            <td>
                {{$c->nombre_completo}}
            </td>
            <td>
                {{$c->mandante_entel}}
            </td>
            <td>
                {{$c->actividad}}
            </td>
            <td>
                {{$c->temperatura_actual}}
            </td>
            <td>
                @if($c->dificultad_respirar == 1)

              SI
              @else
              NO
              @endif
            </td>
            <td>
                @if($c->contacto_covid == 1)

              SI
              @else
              NO
              @endif
            </td>
            <td>
                @if($c->contacto_extranjero == 1)

              SI
              @else
              NO
              @endif
            </td>
            <td>
                @if($c->contacto_paciente_cofirmado == 1)

              SI
              @else
              NO
              @endif
            </td>
            <td>
                @if($c->otros_sintomas == 1)

              SI
              @else
              NO
              @endif
            </td>
            <td>
                @if($c->tuvo_fiebre == 1)

              SI
              @else
              NO
              @endif
            </td>
            <td>
                {{$c->proveedor?$c->proveedor->PROVEEDOR:''}}
            </td>
            <td>
              {{$c->nro_tipo}}
            </td>
            <td>
               @if($c->tipo_id == 1)
                 TP
               @elseif($c->tipo_id == 2)
                 INCIDENCIA
               @endif
            </td>
            <td>
                @if($c->created_at != null)
               {{substr($c->created_at,8,-8)}}/{{substr($c->created_at,5,-12)}}/{{substr($c->created_at,0,-15)}}
               @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>