<table>
    <thead>
        <tr>
            <th>
                TICKET ID
            </th>
            <th>
                TIPO INPUTACION
            </th>
            <th>
                NRO° INPUTACION
            </th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($inputacion as $i)
        <tr>
          <td>
              {{$i->ticket_id}}
          </td>
          <td>
              {{$i->inputacion ? $i->inputacion->descripcion:''}}
          </td>
          <td>
              {{$i->nro_imputacion}}
          </td>
        </tr>
        @endforeach
    </tbody>
</table>
