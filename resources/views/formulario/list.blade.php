<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
                <title>
                    Solicitudes pendientes
                </title>
                <!-- General CSS Files -->
                <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
                    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet">
                        <!-- CSS Libraries -->
                        <link href="../node_modules/bootstrap-social/bootstrap-social.css" rel="stylesheet">
                            <!-- Template CSS -->
                            <link href="../layout/css/style.css" rel="stylesheet">
                                <link href="../layout/css/components.css" rel="stylesheet">
                                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
                                </link>
                            </link>
                        </link>
                    </link>
                </link>
            </meta>
        </meta>
    </head>
    <body class="fondo">
        <div class="main-content" style="padding-left:10px !important; padding-right:10px !important;">
            <div class="section">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12" style="margin-top:80px;">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    Solicitudes
                                </h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-md">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    incidencia
                                                </th>
                                                <th>
                                                    condición
                                                </th>
                                                <th>
                                                    mbo n1
                                                </th>
                                                <th>
                                                    mbo n2
                                                </th>
                                                <th>
                                                    nombre primer revisor
                                                </th>
                                                <th>
                                                    revisón aplica
                                                </th>
                                                <th>
                                                    comentario revisón
                                                </th>
                                                <th>
                                                    nombre segundo revisor
                                                </th>
                                                <th>
                                                    segundo revisor acepta incidencia
                                                </th>
                                                <th>
                                                    segundo revisor aplica
                                                </th>
                                                <th>
                                                    duracion revisada
                                                </th>
                                                <th>
                                                    segundo revisor comentario revision
                                                </th>
                                                <th>
                                                    fecha conclusión
                                                </th>
                                                <th>
                                                    comentario cgleiva
                                                </th>
                                                <th>
                                                    conclusión cgleiva
                                                </th>
                                                <th>
                                                    fecha creación
                                                </th>
                                                <th>
                                                </th>
                                            </tr>
                                            @foreach($temp_data as $data)
                                            <tr>
                                                <td>
                                                    {{$data->id}}
                                                </td>
                                                <td>
                                                    {{$data->incidencia}}
                                                </td>
                                                <td>
                                                    {{$data->condicion}}
                                                </td>
                                                <td>
                                                    {{$data->mbo_n1_revisado }}
                                                </td>
                                                <td>
                                                    {{$data->mbo_n2_revisado}}
                                                </td>
                                                <td>
                                                    {{$data->nombre_primer_revisor}}
                                                </td>
                                                <td>
                                                    {{$data->revision_aplica}}
                                                </td>
                                                <td>
                                                    {{$data->comentario_revison}}
                                                </td>
                                                <td>
                                                    {{$data->nombre_segundo_revisor}}
                                                </td>
                                                <td>
                                                    {{$data->segundo_revisor_acepta_incidencia}}
                                                </td>
                                                <td>
                                                    {{$data->segundo_revisor_aplica}}
                                                </td>
                                                <td>
                                                    {{$data->duracion_revisada}}
                                                </td>
                                                <td>
                                                    {{$data->segundo_revisor_comentario_revision }}
                                                </td>
                                                <td>
                                                    {{$data->fecha_conclusion}}
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    {{$data->created_at}}
                                                </td>
                                                <td>
                                                    <a  class="btn btn-success" data-toggle="modal" href="#modal_pp" onclick="setValue('{{$data->id}}')">
                                                        <i class="fas fa-check">
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="modal_pp" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <form method="POST" action="/validate-data">
                        @csrf
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    Aprobar
                                </h5>
                                <button @click.prevent="cleanthisData" aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>
                                        Comentario cgleiva*
                                    </label>
                                    <input class="form-control" required="" name="comentario_cleiva" style="height: 100px;"/>
                                    
                                </div>
                                <div class="form-group">
                                    <label>
                                        Conclusión cgleiva*
                                    </label>
                                    <select  class="form-control" name="conclusion_cgleiva" required="" tabindex="1">
                                        <option disabled="true" selected="true">
                                        </option>
                                        <option>
                                            SI
                                        </option>
                                        <option>
                                            NO
                                        </option>
                                        <option>
                                            PENDIENTE
                                        </option>
                                    </select>
                                </div>
                                <input type="hidden" name="id_solicitud" id="id_solicitud_value" >
                            </div>
                            <div class="modal-footer">
                               <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<!-- General JS Scripts -->
<script crossorigin="anonymous" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" src="https://code.jquery.com/jquery-3.3.1.min.js">
</script>
<script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
</script>
<script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js">
</script>
<script src="../layout/js/stisla.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js">
</script>
<!-- JS Libraies -->
<!-- Template JS File -->
<script src="../layout/js/scripts.js">
</script>
<script src="../layout/js/custom.js">
</script>
<script>
    $(window).on("load",function(){
    $(".loader-wrapper").fadeOut("slow");
  });

  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<script type="text/javascript">
    function setValue(value){
        $("#id_solicitud_value").val(value);
       
            }
</script>
<!-- Page Specific JS File -->
