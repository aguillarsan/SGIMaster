@extends('layouts.menuTicketPlataforma')
@section('content')
<div id="app">
    <plataforma>
    </plataforma>
    <form action="/formularioTicketRequisito" class="needs-validation" enctype="multipart/form-data" method="POST" novalidate="">
        {{method_field('POST')}}

    {{csrf_field()}}
        <div aria-hidden="true" class="modal " data-backdrop="static" id="ModalTicketPlataforma" role="dialog">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceIn">
                    <div class="modal-header">
                        <h4 class="modal-title" style="color: #999999">
                            Formulario
                        </h4>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="tickets-list">
                            <div class="ticket-item">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>
                                                Área *
                                            </label>
                                            <select autofocus="" class="form-control" id="area" name="AreaSolicitante" required="" style="width: 100%" tabindex="1" >
                                                <option >
                                                </option>
                                                @foreach($area as $a)
                                                <option value="{{$a->id}}">
                                                    {{$a->descripcion}}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar el área
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Plataforma *
                                            </label>
                                            <select autofocus="" class="form-control" name="plataforma" required="" style="width: 100%" tabindex="1">
                                                <option >
                                                </option>
                                                @foreach($plataforma as $p)
                                                <option value="{{$p->id}}">
                                                    {{$p->descripcion}}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar la plataforma
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Motivo *
                                            </label>
                                            <select autofocus="" class="form-control" id="requisito" name="requisito" required="" style="width: 100%" tabindex="1">
                                                <option >
                                                </option>
                                                @foreach($requisito as $r)
                                                <option value="{{$r->id}}">
                                                    {{$r->descripcion}}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar el motivo
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Prioridad *
                                            </label>
                                            <select autofocus="" class="form-control" name="prioridad" required="" style="width: 100%" tabindex="1">
                                                <option >
                                                </option>
                                                @foreach($prioridad as $pri)
                                                <option value="{{$pri->id}}">
                                                    {{$pri->descripcion}}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Favor seleccionar la prioridad
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Descripción problema*
                                            </label>
                                            <textarea autofocus="" class="form-control" name="descripcion" required="" style="height: 150px;" tabindex="1">
                                            </textarea>
                                            <div class="invalid-feedback">
                                                Favor rellenar la descripcion
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Archivos (opcional)
                                            </label>
                                            <div class="row">
                                                <div class="file-upload" style="margin-top: -10px">
                                                    <div class="image-upload-wrap">
                                                        <input class="file-upload-input" id="archivo" multiple="" name="Documento[]" type="file"/>
                                                        <div class="drag-text">
                                                            <h2 style="font-size: 28px;">
                                                                Arrastre o selecciones sus archivos.
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-info" type="submit">
                                            Aceptar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
