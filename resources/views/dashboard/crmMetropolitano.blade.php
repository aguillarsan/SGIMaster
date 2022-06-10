<div class="col-lg-4 col-md-4 col-sm-12 ">
    <div class="card mt-4 box-shadow-new-card border-r-8" >
        <div class="card-header card_dashboard_ticket  border-r-top" >
            <a href="/ticketblade/{{3}}" class="green_secondary_color" target="_blank">
                <h2 class="barlow semi_bold blanco boxBounce">
                    Metropolitano
                </h2>
            </a>
            <div class="boxBounce" style="margin-top: 60px;margin-left: -192px;">
                @if($id == 21)
                <a class="barlow regular font-verde" href="/ticketExcelObrasCivilesCrm/{{3}}" style="font-size: 15px;">
                    <i class="fa fa-download">
                    </i>
                    < Descargar Reporte
                </a>
                @elseif($id ==14)
                <a class="barlow regular font-verde" href="/ticketExcelClimaCrm/{{3}}" style="font-size: 15px;">
                    <i class="fa fa-download">
                    </i>
                    Descargar Reporte
                </a>
                @else
                <a class="barlow regular font-verde" href="/ticketExcelCrm/{{3}}" style="font-size: 17px;">
                    <i class="fa fa-download">
                    </i>
                    Descargar Reporte
                </a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col mb-4 mb-lg-0 text-center">
                    <div class=" boxBounce ">
                        <span class="badge azul rounded_badge_dashboard barlow regular box_shadow_min">
                            {{$metropolitanoback}}
                        </span>
                    </div>
                    <div class="mt-2 font-weight-bold barlow semi_bold">
                        EN ESPERA
                    </div>
                </div>
                <div class="col mb-4 mb-lg-0 text-center">
                    <div class="boxBounce ">
                        <span class="badge verde rounded_badge_dashboard barlow regular box_shadow_min">
                            {{$metropolitanocurso}}
                        </span>
                    </div>
                    <div class="mt-2 font-weight-bold barlow semi_bold">
                        EN CURSO
                    </div>
                </div>
                <div class="col mb-4 mb-lg-0 text-center">
                    <div class="boxBounce ">
                        <span class="badge blue rounded_badge_dashboard barlow regular box_shadow_min">
                            {{$metrovali}}
                        </span>
                    </div>
                    <div class="mt-2 font-weight-bold barlow semi_bold">
                        VALIDACIÓN
                    </div>
                </div>
                <div class="col mb-4 mb-lg-0 text-center">
                    <div class="boxBounce ">
                        <span class="badge rosa rounded_badge_dashboard barlow regular box_shadow_min">
                            {{$metropolitanofin}}
                        </span>
                    </div>
                    <div class="mt-2 font-weight-bold barlow semi_bold">
                        FINALIZADAS
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col mb-12 mb-lg-0 text-center">
                    <div class="boxBounce ">
                        <span class="badge rounded_badge_dashboard barlow regular box_shadow_min back_blue_gradient  font_size_total_crm" >
                            {{$total_metropolitano}}
                        </span>
                    </div>
                    <div class="mt-2 font-weight-bold barlow regular color_black_font_ent">
                        TOTAL  METROPOLITANO
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
