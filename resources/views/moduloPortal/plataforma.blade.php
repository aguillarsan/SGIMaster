@extends('layouts.portallayout')
@section('content')
<section class="games-section" style="margin-top: 200px;background: white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="row">
                  
                    @foreach($plataformas as $p)
                    <div class="col-lg-3 col-md-6">
                        <div class="game-item">
                            <i class="{{$p->icono}}" style="font-size:70px"></i>
                                <h5 style="color: #191919">
                                {{$p->nombre}}
                                </h5>
                                <a class="read-more" href="{{$p->link}}" style="color:#005cff" target="__blanck">
                                    Ingresar
                                    <img alt="#" src="../imagenesPortal/icons/double-arrow.png"/>
                                </a>
                      
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
