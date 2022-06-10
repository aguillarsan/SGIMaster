    <form action="" enctype="multipart/form-data" method="POST" v-on:submit.prevent="updateList">
        {{method_field('PUT')}}

		{{csrf_field()}}
        <div aria-hidden="true" class="modal inmodal" id="Tareas" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <h4 class="modal-title" style="color: #999999">
                            Check List de Tareas
                        </h4>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Tareas
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listing as $l)
                                        <tr>
                                            <th>
                                                {{$l->descripcion}}
                                            </th>
                                            <th>
                                                @if(Helper::lista($ticket->id,$l->id)->first())
                                                <input checked="true" class="form-control" disabled="true" style="width: 30px" type="checkbox">
                                                    @else
                                                    <input class="form-control" name="selected[{{$l->id}}]" style="width: 30px" type="checkbox" v-model="select" value="{{$l->id}}">
                                                        @endif
                                                    </input>
                                                </input>
                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>