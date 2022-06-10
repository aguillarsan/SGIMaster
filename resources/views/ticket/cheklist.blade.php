<div class="row ">
    <div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
        <div class="card card-hero shadow-box-ag">
            <div class="card-header" style="background-image: linear-gradient(rgb(0, 92, 255), #007bff99);">
                <div class="card-icon">
                    <i class="fas fa-check" style="color: #42E8B4">
                    </i>
                </div>
                <h4>
                    Check list mantenciones
                </h4>
            </div>
            <div class="card-body p-0" style="">
                <div class="tickets-list">
                    <div class="ticket-item">
                        <div class="row">
                            <div class="table-responsive">
                                <form action="/chekmantenciones/{{$id}}" enctype="multipart/form-data" method="POST">
                                    {{csrf_field()}}
	  {{method_field('POST')}}
                                    <table class="table table-striped shadow-box-ag">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">
                                                    Si
                                                </th>
                                                <th style="width: 20px;">
                                                    No
                                                </th>
                                                <th style="width: 20px;">
                                                    N/A
                                                </th>
                                                <th>
                                                    Tipo Mantención
                                                </th>
                                                <th>
                                                    Fecha
                                                </th>
                                                <th>
                                                    Archivo
                                                </th>
                                                @if($mantencion1==0)
                                                <th>
                                                    Opciones
                                                </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($mantencion1==0)
                                            <tr>
                                                <th>
                                                    <input class="form-control" name="si" style="width: 20px;height: 20px;" type="checkbox" value="11"/>
                                                </th>
                                                <th>
                                                    <input class="form-control" id="no1" name="no" onclick="this.form.submit()" style="width: 20px;height: 20px;" type="checkbox" value="12"/>
                                                </th>
                                                <th>
                                                    <input class="form-control" name="na" onclick="this.form.submit()" style="width: 20px;height: 20px;" type="checkbox" value="13"/>
                                                </th>
                                                <th>
                                                    Matención energia
                                                </th>
                                                <th>
                                                    <input class="form-control" name="fec" type="date">
                                                    </input>
                                                </th>
                                                <th>
                                                    <input class="form-control" name="archivos[]" type="file">
                                                    </input>
                                                </th>
                                                <th>
                                                    <button class="btn btn-info " type="submit">
                                                        Guardar
                                                    </button>
                                                </th>
                                            </tr>
                                            @endif
														@if($mantencion1==1)
														@foreach($Menergia as $e)
                                            <tr>
                                                <th>
                                                    @if($e->mantencion_selected == 1)
                                                    <i class="fas fa-check" style="color:#42e8b4">
                                                    </i>
                                                    @endif
                                                </th>
                                                <th>
                                                    @if($e->mantencion_selected == 2)
                                                    <i class="fas fa-check" style="color:#42e8b4">
                                                    </i>
                                                    @endif
                                                </th>
                                                <th>
                                                    @if($e->mantencion_selected == 3)
                                                    <i class="fas fa-check" style="color:#42e8b4">
                                                    </i>
                                                    @endif
                                                </th>
                                                <th>
                                                    Matención energia
                                                </th>
                                                <th>
                                                    {{$e->fecha}}
                                                </th>
                                                <th>
                                                    <a href="../archivos/{{$e->nombre_archivo}}" target="_blank">
                                                        {{$e->nombre_archivo}}
                                                    </a>
                                                </th>
                                            </tr>
                                            @endforeach
														@endif
                                        </tbody>
                                    </table>
                                </form>
                                <form action="/chekmantenciones2/{{$id}}" enctype="multipart/form-data" method="POST">
                                    {{csrf_field()}}
	{{method_field('POST')}}
                                    <table class="table table-striped shadow-box-ag" style="">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">
                                                    Si
                                                </th>
                                                <th style="width: 20px;">
                                                    No
                                                </th>
                                                <th style="width: 20px;">
                                                    N/A
                                                </th>
                                                <th>
                                                    Tipo Mantención
                                                </th>
                                                <th>
                                                    Fecha
                                                </th>
                                                <th>
                                                    Archivo
                                                </th>
                                                @if($mantencion2==0)
                                                <th>
                                                    Opciones
                                                </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($mantencion2==0)
                                            <tr>
                                                <th>
                                                    <input class="form-control" name="si" style="width: 20px;height: 20px;" type="checkbox" value="21"/>
                                                </th>
                                                <th>
                                                    <input class="form-control" name="no" onclick="this.form.submit()" style="width: 20px;height: 20px;" type="checkbox" value="22"/>
                                                </th>
                                                <th>
                                                    <input class="form-control" name="na" onclick="this.form.submit()" style="width: 20px;height: 20px;" type="checkbox" value="23"/>
                                                </th>
                                                <th>
                                                    Matención clima
                                                </th>
                                                <th>
                                                    <input class="form-control" name="fechaNueva2" type="date">
                                                    </input>
                                                </th>
                                                <th>
                                                    <input class="form-control" name="archivos[]" type="file">
                                                    </input>
                                                </th>
                                                <th>
                                                    <button class="btn btn-info " type="submit">
                                                        Guardar
                                                    </button>
                                                </th>
                                            </tr>
                                            @endif

														@if($mantencion2==1)
														@foreach($Mclima as $e)
                                            <tr>
                                                <th>
                                                    @if($e->mantencion_selected == 1)
                                                    <i class="fas fa-check" style="color:#42e8b4">
                                                    </i>
                                                    @endif
                                                </th>
                                                <th>
                                                    @if($e->mantencion_selected == 2)
                                                    <i class="fas fa-check" style="color:#42e8b4">
                                                    </i>
                                                    @endif
                                                </th>
                                                <th>
                                                    @if($e->mantencion_selected == 3)
                                                    <i class="fas fa-check" style="color:#42e8b4">
                                                    </i>
                                                    @endif
                                                </th>
                                                <th>
                                                    Matención clima
                                                </th>
                                                <th>
                                                    {{$e->fecha}}
                                                </th>
                                                <th>
                                                    <a href="../archivos/{{$e->nombre_archivo}}" target="_blank">
                                                        {{$e->nombre_archivo}}
                                                    </a>
                                                </th>
                                            </tr>
                                            @endforeach
														@endif
                                        </tbody>
                                    </table>
                                </form>
                                <form action="/chekmantenciones3/{{$id}}" enctype="multipart/form-data" method="POST">
                                    {{csrf_field()}}
	{{method_field('POST')}}
                                    <table class="table table-striped shadow-box-ag" style="">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">
                                                    Si
                                                </th>
                                                <th style="width: 20px;">
                                                    No
                                                </th>
                                                <th style="width: 20px;">
                                                    N/A
                                                </th>
                                                <th>
                                                    Tipo Mantención
                                                </th>
                                                <th>
                                                    Fecha
                                                </th>
                                                <th>
                                                    Archivo
                                                </th>
                                                @if($mantencion3==0)
                                                <th>
                                                    Opciones
                                                </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($mantencion3==0)
                                            <tr>
                                                <th>
                                                    <input class="form-control" name="si" style="width: 20px;height: 20px;" type="checkbox" value="31"/>
                                                </th>
                                                <th>
                                                    <input class="form-control" name="no" onclick="this.form.submit()" style="width: 20px;height: 20px;" type="checkbox" value="32"/>
                                                </th>
                                                <th>
                                                    <input class="form-control" name="na" onclick="this.form.submit()" style="width: 20px;height: 20px;" type="checkbox" value="33"/>
                                                </th>
                                                <th>
                                                    Matención GG.EE
                                                </th>
                                                <th>
                                                    <input class="form-control" name="fechaNueva3" type="date">
                                                    </input>
                                                </th>
                                                <th>
                                                    <input class="form-control" name="archivos[]" type="file">
                                                    </input>
                                                </th>
                                                <th>
                                                    <button class="btn btn-info " type="submit">
                                                        Guardar
                                                    </button>
                                                </th>
                                            </tr>
                                            @endif


															@if($mantencion3==1)
														@foreach($Meegg as $e)
                                            <tr>
                                                <th>
                                                    @if($e->mantencion_selected == 1)
                                                    <i class="fas fa-check" style="color:#42e8b4">
                                                    </i>
                                                    @endif
                                                </th>
                                                <th>
                                                    @if($e->mantencion_selected == 2)
                                                    <i class="fas fa-check" style="color:#42e8b4">
                                                    </i>
                                                    @endif
                                                </th>
                                                <th>
                                                    @if($e->mantencion_selected == 3)
                                                    <i class="fas fa-check" style="color:#42e8b4">
                                                    </i>
                                                    @endif
                                                </th>
                                                <th>
                                                    Matención GG.EE
                                                </th>
                                                <th>
                                                    {{$e->fecha}}
                                                </th>
                                                <th>
                                                    <a href="../archivos/{{$e->nombre_archivo}}" target="_blank">
                                                        {{$e->nombre_archivo}}
                                                    </a>
                                                </th>
                                            </tr>
                                            @endforeach
														@endif
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
