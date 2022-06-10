<?php

namespace App\Http\Controllers;

use App\Energy_equipement_revisions;
use App\Energy_equipement_revisions_images;
use App\Energy_equipement_revisions_statuses;
use App\Http\Services\GoogleSheetsServices;
use App\Site;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GoogleSheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

    public function __construct()
    {

        Carbon::setLocale('es');

    }

    public function Googleconection()
    {
        // $data = (new GoogleSheetsServices ())->readSheet();
        // dd($data);

        try {

            // $client = new \Google_Client();

            // $client->setApplicationName('Formulario online');
            // $client->setScopes(\Google_Service_Sheets::SPREADSHEETS);
            // $client->setAuthConfig('credentials.json');
            // $client->setAccessType('offline');
            // $client->setPrompt('select_account consent');

            // $service = new \Google_Service_Sheets($client);

            // $spreadsheetId = '1Hvb7GAfR_DwUplB_vLrtDk0K6aCqy3UCpUI3MM099Hc';
            // $range         = 'A:BB';
            // $response      = $service->spreadsheets_values->get($spreadsheetId, $range);

            $values = (new GoogleSheetsServices())->readSheet();

            unset($values[0]);

            if ($values) {
                return $this->getData($values);
            }

        } catch (Exception $e) {
            return $e;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData($values)
    {
        try {
            // unset($values[0]);

            $data_revision_semanal = [];
            $data_revision_mensual = [];

            foreach ($values as $row) {
                if ($row[6] == 'SI') {
                    $data_revision_semanal[] = [
                        'Marca_temporal'       => $row[0],
                        'sitio'                => $row[1],
                        'nemonico'             => $row[2],
                        'fecha'                => $row[3],
                        'revisor'              => $row[4],
                        'empresa'              => $row[5],
                        'revision_semanal'     => $row[6],
                        'todo_ok_con_el_sitio' => $row[7],
                    ];

                } else {
                    $data_revision_mensual[] = [
                        'Marca_temporal'                                     => $row[0],
                        'sitio'                                              => $row[1],
                        'nemonico'                                           => $row[2],
                        'fecha'                                              => $row[3],
                        'revisor'                                            => $row[4],
                        'empresa'                                            => $row[5],
                        'revision_semanal'                                   => $row[6],

                        'Aisladores_trizados_picados'                        => $row[8],
                        'Manchas_aceite'                                     => $row[9],
                        'cables_sueltos'                                     => $row[10],
                        'voltaje_dentro_valores'                             => $row[11],
                        'valor_corriente_normal'                             => $row[12],
                        'protecciones_on'                                    => $row[13],
                        'voltaje_cc_dentro_parametros'                       => $row[14],
                        'corriente_fcc_dentro_parametros'                    => $row[15],
                        'partes_con_temp_elevada_fusibles_cc'                => $row[16],
                        'alarmas_presentes'                                  => $row[17],
                        'existe_otra_fuente_fcc'                             => $row[18],
                        'voltaje_dentro_valores_segunda_fuente'              => $row[19],
                        'corriente_fcc_dentro_parametros_segunda_fuente'     => $row[20],
                        'partes_con_temp_elevada_fusibles_cc_segunda_fuente' => $row[21],
                        'alarmas_presentes_segunda_fuente'                   => $row[22],
                        'derrames_acido'                                     => $row[23],
                        'baterias_infladas'                                  => $row[24],
                        'bornes_levantados'                                  => $row[25],
                        'protecciones_on_bypass_off'                         => $row[26],
                        'sistema_en_automatico'                              => $row[27],
                        'estatus_sin_alarma'                                 => $row[28],
                        'varificacion_voltaje_bateria_partida'               => $row[29],
                        'temperatura_motor_correcta'                         => $row[30],
                        'correas_gg_ee_correcto_estado'                      => $row[31],
                        'fugas_aceite_refrigerante'                          => $row[32],
                        'existen_alarmas_presentes'                          => $row[33],
                        'estado_bomba_on_automatico'                         => $row[34],
                        'fugas_combustible_cañerias'                         => $row[35],
                        'nivel_combustible_superior_cincuenta_d_capacidad'   => $row[36],
                        'temperatura_sala_correcta'                          => $row[37],
                        'equipo_climatizacion_uno_funciona'                  => $row[38],
                        'equipo_climatizacion_dos_funciona'                  => $row[39],
                        'equipo_climatizacion_standby_apagado'               => $row[40],
                        'ruidos_fuera_normal_detalle_condensadores'          => $row[41],
                        'estatus_sin_alarma'                                 => $row[42],
                        'posee_mas_salas'                                    => $row[43],
                        'temperatura_sala_dos_correcta'                      => $row[44],
                        'equipo_climatizacion_uno_sala_dos_funciona'         => $row[45],
                        'equipo_climatizacion_dos_sala_dos_funciona'         => $row[46],
                        'equipo_climatizacion_sala_dos_standby_apagado'      => $row[47],
                        'ruidos_fuera_normal_sala_dos_detalle_condensadores' => $row[48],
                        'estatus_sin_alarma_sala_dos'                        => $row[49],
                        'sistema_contra_incendio'                            => $row[50],
                        'panel_sin_alarmas'                                  => $row[51],
                        'cilindros_extincion_cargados'                       => $row[52],
                        'archivos'                                           => !empty($row[53]) ? $row[53] : '',

                    ];
                }

            }

            return $this->insertData($data_revision_semanal, $data_revision_mensual);

        } catch (Exception $e) {
            return $e;
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insertData($data_revision_semanal, $data_revision_mensual)
    {

        try {
            if ($data_revision_semanal) {
                foreach ($data_revision_semanal as $data_semanal) {

                    $formato_fecha_excel = \DateTime::createFromFormat('d/m/Y', $data_semanal['fecha']);
                    $nuevo_formato_fecha = $formato_fecha_excel->format('Y-m-d');

                    $site = Site::where('nem_site', $data_semanal['nemonico'])->first();

                    $formato_marca_excel          = \DateTime::createFromFormat('d/m/Y H:i:s', $data_semanal['Marca_temporal']);
                    $nuevo_formato_marca_temporal = $formato_marca_excel->format('Y-m-d');

                    if ($site) {
                        $energy_equipement_revisions = Energy_equipement_revisions::where('pop_id', $site->pop_id)->where('date', $nuevo_formato_fecha)->count();
                        if ($energy_equipement_revisions == 0) {
                            $energy_equipement_revisions                = new Energy_equipement_revisions;
                            $energy_equipement_revisions->pop_id        = $site->pop_id;
                            $energy_equipement_revisions->date          = $nuevo_formato_fecha;
                            $energy_equipement_revisions->revisor       = $data_semanal['revisor'];
                            $energy_equipement_revisions->company       = $data_semanal['empresa'];
                            $energy_equipement_revisions->weekly_review = 1;
                            $energy_equipement_revisions->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 1;
                            $energy_equipement_revisions_statuses->status                            = $data_semanal['todo_ok_con_el_sitio'] == 'SI' ? 1 : ($data_semanal['todo_ok_con_el_sitio'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                        }

                    }
                }
            }
            if ($data_revision_mensual) {

                // foreach ($data_revision_mensual as $data_mensual) {

                // }

                foreach ($data_revision_mensual as $data_mensual) {

                    $formato_fecha_excel = \DateTime::createFromFormat('d/m/Y', $data_mensual['fecha']);

                    $nuevo_formato_fecha = $formato_fecha_excel->format('Y-m-d');

                    $formato_marca_excel          = \DateTime::createFromFormat('d/m/Y H:i:s', $data_mensual['Marca_temporal']);
                    $nuevo_formato_marca_temporal = $formato_marca_excel->format('Y-m-d');

                    $site = Site::where('nem_site', $data_mensual['nemonico'])->first();

                    if ($site) {
                        $energy_equipement_revisions = Energy_equipement_revisions::where('pop_id', $site->pop_id)->where('date', $nuevo_formato_fecha)->count();

                        //###########################################################################################################//
                        if ($energy_equipement_revisions == 0) {

                            $energy_equipement_revisions                = new Energy_equipement_revisions;
                            $energy_equipement_revisions->pop_id        = $site->pop_id;
                            $energy_equipement_revisions->date          = $nuevo_formato_fecha;
                            $energy_equipement_revisions->revisor       = $data_mensual['revisor'];
                            $energy_equipement_revisions->company       = $data_mensual['empresa'];
                            $energy_equipement_revisions->weekly_review = 0;
                            $energy_equipement_revisions->save();

                            //######################################  SUB ESTACIÓN ELÉCTRICAS ########################################################
                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 2;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['Aisladores_trizados_picados'] == 'SI' ? 1 : ($data_mensual['Aisladores_trizados_picados'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 3;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['Manchas_aceite'] == 'SI' ? 1 : ($data_mensual['Manchas_aceite'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 4;
                            if ($data_mensual['cables_sueltos'] == 'SI' || $data_mensual['cables_sueltos'] == 'NO' || $data_mensual['cables_sueltos'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['cables_sueltos'] == 'SI' ? 1 : ($data_mensual['cables_sueltos'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['cables_sueltos'];
                            }

                            $energy_equipement_revisions_statuses->save();
                            //###########################################################################################################//

                            //##################################### EMPALME equipo de medida TG #######################################################//
                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 5;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['voltaje_dentro_valores'] == 'SI' ? 1 : ($data_mensual['voltaje_dentro_valores'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 6;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['valor_corriente_normal'] == 'SI' ? 1 : ($data_mensual['valor_corriente_normal'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 7;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['protecciones_on'] == 'SI' ? 1 : ($data_mensual['protecciones_on'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();
                            //###########################################################################################################//

                            //################################################ FUENTES CC 1 #########################################################//
                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 8;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['voltaje_cc_dentro_parametros'] == 'SI' ? 1 : ($data_mensual['voltaje_cc_dentro_parametros'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 9;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['corriente_fcc_dentro_parametros'] == 'SI' ? 1 : ($data_mensual['corriente_fcc_dentro_parametros'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 10;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['partes_con_temp_elevada_fusibles_cc'] == 'SI' ? 1 : ($data_mensual['partes_con_temp_elevada_fusibles_cc'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 11;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['alarmas_presentes'] == 'SI' ? 1 : ($data_mensual['alarmas_presentes'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 12;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['existe_otra_fuente_fcc'] == 'SI' ? 1 : ($data_mensual['existe_otra_fuente_fcc'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();
                            //###########################################################################################################//

                            if ($data_mensual['existe_otra_fuente_fcc'] == 'SI') {
                                //############################################### FUENTES CC 2 #########################################################//
                                $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 13;
                                $energy_equipement_revisions_statuses->status                            = $data_mensual['voltaje_dentro_valores_segunda_fuente'] == 'SI' ? 1 : ($data_mensual['voltaje_dentro_valores_segunda_fuente'] == 'NO' ? 0 : null);
                                $energy_equipement_revisions_statuses->save();

                                $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 14;
                                $energy_equipement_revisions_statuses->status                            = $data_mensual['corriente_fcc_dentro_parametros_segunda_fuente'] == 'SI' ? 1 : ($data_mensual['corriente_fcc_dentro_parametros_segunda_fuente'] == 'NO' ? 0 : null);
                                $energy_equipement_revisions_statuses->save();

                                $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 15;
                                $energy_equipement_revisions_statuses->status                            = $data_mensual['partes_con_temp_elevada_fusibles_cc_segunda_fuente'] == 'SI' ? 1 : ($data_mensual['partes_con_temp_elevada_fusibles_cc_segunda_fuente'] == 'NO' ? 0 : null);
                                $energy_equipement_revisions_statuses->save();

                                $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 16;
                                $energy_equipement_revisions_statuses->status                            = $data_mensual['alarmas_presentes_segunda_fuente'] == 'SI' ? 1 : ($data_mensual['alarmas_presentes_segunda_fuente'] == 'NO' ? 0 : null);
                                $energy_equipement_revisions_statuses->save();
                                //###########################################################################################################//

                            }
                            //############################################# BANCOS DE BATERIAS ############################################################//
                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 17;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['derrames_acido'] == 'SI' ? 1 : ($data_mensual['derrames_acido'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 18;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['baterias_infladas'] == 'SI' ? 1 : ($data_mensual['baterias_infladas'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 19;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['bornes_levantados'] == 'SI' ? 1 : ($data_mensual['bornes_levantados'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();
                            //############################################################################################################################//

                            //######################################### TABLERO DE TRANSFERENCIA ######################################################//
                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 20;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['protecciones_on_bypass_off'] == 'SI' ? 1 : ($data_mensual['protecciones_on_bypass_off'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 21;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['sistema_en_automatico'] == 'SI' ? 1 : ($data_mensual['sistema_en_automatico'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 22;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['estatus_sin_alarma'] == 'SI' ? 1 : ($data_mensual['estatus_sin_alarma'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();
                            //############################################################################################################################//

                            //######################################### GRUPO ELECTROGENO ######################################################//
                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 23;
                            if ($data_mensual['varificacion_voltaje_bateria_partida'] == 'SI' || $data_mensual['varificacion_voltaje_bateria_partida'] == 'NO' || $data_mensual['varificacion_voltaje_bateria_partida'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['varificacion_voltaje_bateria_partida'] == 'SI' ? 1 : ($data_mensual['varificacion_voltaje_bateria_partida'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['varificacion_voltaje_bateria_partida'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 24;
                            if ($data_mensual['temperatura_motor_correcta'] == 'SI' || $data_mensual['temperatura_motor_correcta'] == 'NO' || $data_mensual['temperatura_motor_correcta'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['temperatura_motor_correcta'] == 'SI' ? 1 : ($data_mensual['temperatura_motor_correcta'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['temperatura_motor_correcta'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 25;
                            if ($data_mensual['correas_gg_ee_correcto_estado'] == 'SI' || $data_mensual['correas_gg_ee_correcto_estado'] == 'NO' || $data_mensual['correas_gg_ee_correcto_estado'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['correas_gg_ee_correcto_estado'] == 'SI' ? 1 : ($data_mensual['correas_gg_ee_correcto_estado'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['correas_gg_ee_correcto_estado'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 26;
                            if ($data_mensual['fugas_aceite_refrigerante'] == 'SI' || $data_mensual['fugas_aceite_refrigerante'] == 'NO' || $data_mensual['fugas_aceite_refrigerante'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['fugas_aceite_refrigerante'] == 'SI' ? 1 : ($data_mensual['fugas_aceite_refrigerante'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['fugas_aceite_refrigerante'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 27;
                            if ($data_mensual['existen_alarmas_presentes'] == 'SI' || $data_mensual['existen_alarmas_presentes'] == 'NO' || $data_mensual['existen_alarmas_presentes'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['existen_alarmas_presentes'] == 'SI' ? 1 : ($data_mensual['existen_alarmas_presentes'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['existen_alarmas_presentes'];
                            }
                            $energy_equipement_revisions_statuses->save();
                            //############################################################################################################################//

                            //############################ ESTANQUE DIARIO Y PRINCIPAL DE COMBUSTIBLE #####################################################//
                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 28;
                            if ($data_mensual['estado_bomba_on_automatico'] == 'OK' || $data_mensual['estado_bomba_on_automatico'] == 'NO OK' || $data_mensual['estado_bomba_on_automatico'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['estado_bomba_on_automatico'] == 'OK' ? 1 : ($data_mensual['estado_bomba_on_automatico'] == 'NO OK' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['estado_bomba_on_automatico'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 29;
                            if ($data_mensual['fugas_combustible_cañerias'] == 'SI' || $data_mensual['fugas_combustible_cañerias'] == 'NO' || $data_mensual['fugas_combustible_cañerias'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['fugas_combustible_cañerias'] == 'SI' ? 1 : ($data_mensual['fugas_combustible_cañerias'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['fugas_combustible_cañerias'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 30;
                            if ($data_mensual['nivel_combustible_superior_cincuenta_d_capacidad'] == 'SI' || $data_mensual['nivel_combustible_superior_cincuenta_d_capacidad'] == 'NO' || $data_mensual['nivel_combustible_superior_cincuenta_d_capacidad'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['nivel_combustible_superior_cincuenta_d_capacidad'] == 'SI' ? 1 : ($data_mensual['nivel_combustible_superior_cincuenta_d_capacidad'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['nivel_combustible_superior_cincuenta_d_capacidad'];
                            }
                            $energy_equipement_revisions_statuses->save();
                            //############################################################################################################################//

                            //############################################ SALA 1 #####################################################//
                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 31;
                            if ($data_mensual['temperatura_sala_correcta'] == 'SI' || $data_mensual['temperatura_sala_correcta'] == 'NO' || $data_mensual['temperatura_sala_correcta'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['temperatura_sala_correcta'] == 'SI' ? 1 : ($data_mensual['temperatura_sala_correcta'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['temperatura_sala_correcta'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 32;
                            if ($data_mensual['equipo_climatizacion_uno_funciona'] == 'SI' || $data_mensual['equipo_climatizacion_uno_funciona'] == 'NO' || $data_mensual['equipo_climatizacion_uno_funciona'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['equipo_climatizacion_uno_funciona'] == 'SI' ? 1 : ($data_mensual['equipo_climatizacion_uno_funciona'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['equipo_climatizacion_uno_funciona'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 33;
                            if ($data_mensual['equipo_climatizacion_dos_funciona'] == 'SI' || $data_mensual['equipo_climatizacion_dos_funciona'] == 'NO' || $data_mensual['equipo_climatizacion_dos_funciona'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['equipo_climatizacion_dos_funciona'] == 'SI' ? 1 : ($data_mensual['equipo_climatizacion_dos_funciona'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['equipo_climatizacion_dos_funciona'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 34;
                            if ($data_mensual['equipo_climatizacion_standby_apagado'] == 'SI' || $data_mensual['equipo_climatizacion_standby_apagado'] == 'NO' || $data_mensual['equipo_climatizacion_standby_apagado'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['equipo_climatizacion_standby_apagado'] == 'SI' ? 1 : ($data_mensual['equipo_climatizacion_standby_apagado'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['equipo_climatizacion_standby_apagado'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 35;
                            if ($data_mensual['ruidos_fuera_normal_detalle_condensadores'] == 'SI' || $data_mensual['ruidos_fuera_normal_detalle_condensadores'] == 'NO' || $data_mensual['ruidos_fuera_normal_detalle_condensadores'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['ruidos_fuera_normal_detalle_condensadores'] == 'SI' ? 1 : ($data_mensual['ruidos_fuera_normal_detalle_condensadores'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['ruidos_fuera_normal_detalle_condensadores'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 36;
                            if ($data_mensual['estatus_sin_alarma'] == 'SI' || $data_mensual['estatus_sin_alarma'] == 'NO' || $data_mensual['estatus_sin_alarma'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['estatus_sin_alarma'] == 'SI' ? 1 : ($data_mensual['estatus_sin_alarma'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['estatus_sin_alarma'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 37;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['posee_mas_salas'] == 'SI' ? 1 : ($data_mensual['posee_mas_salas'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();
                            //###########################################################################################################//

                            if ($data_mensual['posee_mas_salas'] == 'SI') {

                                //############################################ SALA 2 #####################################################//
                                $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 38;
                                if ($data_mensual['temperatura_sala_dos_correcta'] == 'SI' || $data_mensual['temperatura_sala_dos_correcta'] == 'NO' || $data_mensual['temperatura_sala_dos_correcta'] == 'N/A') {
                                    $energy_equipement_revisions_statuses->status = $data_mensual['temperatura_sala_dos_correcta'] == 'SI' ? 1 : ($data_mensual['temperatura_sala_dos_correcta'] == 'NO' ? 0 : null);
                                } else {
                                    $energy_equipement_revisions_statuses->observation = $data_mensual['temperatura_sala_dos_correcta'];
                                }
                                $energy_equipement_revisions_statuses->save();

                                $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 39;
                                if ($data_mensual['equipo_climatizacion_uno_sala_dos_funciona'] == 'SI' || $data_mensual['equipo_climatizacion_uno_sala_dos_funciona'] == 'NO' || $data_mensual['equipo_climatizacion_uno_sala_dos_funciona'] == 'N/A') {
                                    $energy_equipement_revisions_statuses->status = $data_mensual['equipo_climatizacion_uno_sala_dos_funciona'] == 'SI' ? 1 : ($data_mensual['equipo_climatizacion_uno_sala_dos_funciona'] == 'NO' ? 0 : null);
                                } else {
                                    $energy_equipement_revisions_statuses->observation = $data_mensual['equipo_climatizacion_uno_sala_dos_funciona'];
                                }
                                $energy_equipement_revisions_statuses->save();

                                $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 40;
                                if ($data_mensual['equipo_climatizacion_dos_sala_dos_funciona'] == 'SI' || $data_mensual['equipo_climatizacion_dos_sala_dos_funciona'] == 'NO' || $data_mensual['equipo_climatizacion_dos_sala_dos_funciona'] == 'N/A') {
                                    $energy_equipement_revisions_statuses->status = $data_mensual['equipo_climatizacion_dos_sala_dos_funciona'] == 'SI' ? 1 : ($data_mensual['equipo_climatizacion_dos_sala_dos_funciona'] == 'NO' ? 0 : null);
                                } else {
                                    $energy_equipement_revisions_statuses->observation = $data_mensual['equipo_climatizacion_dos_sala_dos_funciona'];
                                }
                                $energy_equipement_revisions_statuses->save();

                                $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 41;
                                if ($data_mensual['equipo_climatizacion_sala_dos_standby_apagado'] == 'SI' || $data_mensual['equipo_climatizacion_sala_dos_standby_apagado'] == 'NO' || $data_mensual['equipo_climatizacion_sala_dos_standby_apagado'] == 'N/A') {
                                    $energy_equipement_revisions_statuses->status = $data_mensual['equipo_climatizacion_sala_dos_standby_apagado'] == 'SI' ? 1 : ($data_mensual['equipo_climatizacion_sala_dos_standby_apagado'] == 'NO' ? 0 : null);
                                } else {
                                    $energy_equipement_revisions_statuses->observation = $data_mensual['equipo_climatizacion_sala_dos_standby_apagado'];
                                }
                                $energy_equipement_revisions_statuses->save();

                                $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 42;
                                if ($data_mensual['ruidos_fuera_normal_sala_dos_detalle_condensadores'] == 'SI' || $data_mensual['ruidos_fuera_normal_sala_dos_detalle_condensadores'] == 'NO' || $data_mensual['ruidos_fuera_normal_sala_dos_detalle_condensadores'] == 'N/A') {
                                    $energy_equipement_revisions_statuses->status = $data_mensual['ruidos_fuera_normal_sala_dos_detalle_condensadores'] == 'SI' ? 1 : ($data_mensual['ruidos_fuera_normal_sala_dos_detalle_condensadores'] == 'NO' ? 0 : null);
                                } else {
                                    $energy_equipement_revisions_statuses->observation = $data_mensual['ruidos_fuera_normal_sala_dos_detalle_condensadores'];
                                }
                                $energy_equipement_revisions_statuses->save();

                                $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 43;
                                if ($data_mensual['estatus_sin_alarma_sala_dos'] == 'SI' || $data_mensual['estatus_sin_alarma_sala_dos'] == 'NO' || $data_mensual['estatus_sin_alarma_sala_dos'] == 'N/A') {
                                    $energy_equipement_revisions_statuses->status = $data_mensual['estatus_sin_alarma_sala_dos'] == 'SI' ? 1 : ($data_mensual['estatus_sin_alarma_sala_dos'] == 'NO' ? 0 : null);
                                } else {
                                    $energy_equipement_revisions_statuses->observation = $data_mensual['estatus_sin_alarma_sala_dos'];
                                }
                                $energy_equipement_revisions_statuses->save();

                                //###########################################################################################################//

                            } else {
                                if ($data_mensual['posee_mas_salas'] == 'NO') {
                                    //############################################ SALA 2 #####################################################//
                                    $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 38;
                                    $energy_equipement_revisions_statuses->status                            = null;
                                    $energy_equipement_revisions_statuses->save();

                                    $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 39;
                                    $energy_equipement_revisions_statuses->status                            = null;
                                    $energy_equipement_revisions_statuses->save();

                                    $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 40;
                                    $energy_equipement_revisions_statuses->status                            = null;
                                    $energy_equipement_revisions_statuses->save();

                                    $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 41;
                                    $energy_equipement_revisions_statuses->status                            = null;
                                    $energy_equipement_revisions_statuses->save();

                                    $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 42;
                                    $energy_equipement_revisions_statuses->status                            = null;
                                    $energy_equipement_revisions_statuses->save();

                                    $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                                    $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 43;
                                    $energy_equipement_revisions_statuses->status                            = null;
                                    $energy_equipement_revisions_statuses->save();
                                }
                            }
                            //############################################## SISTEMA DE INCENDIO ##############################################//

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 44;
                            $energy_equipement_revisions_statuses->status                            = $data_mensual['sistema_contra_incendio'] == 'SI' ? 1 : ($data_mensual['sistema_contra_incendio'] == 'NO' ? 0 : null);
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 45;
                            if ($data_mensual['panel_sin_alarmas'] == 'SI' || $data_mensual['panel_sin_alarmas'] == 'NO' || $data_mensual['panel_sin_alarmas'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['panel_sin_alarmas'] == 'SI' ? 1 : ($data_mensual['panel_sin_alarmas'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['panel_sin_alarmas'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $energy_equipement_revisions_statuses                                    = new Energy_equipement_revisions_statuses;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_id      = $energy_equipement_revisions->id;
                            $energy_equipement_revisions_statuses->energy_equipment_revision_item_id = 46;
                            if ($data_mensual['cilindros_extincion_cargados'] == 'SI' || $data_mensual['cilindros_extincion_cargados'] == 'NO' || $data_mensual['cilindros_extincion_cargados'] == 'N/A') {
                                $energy_equipement_revisions_statuses->status = $data_mensual['cilindros_extincion_cargados'] == 'SI' ? 1 : ($data_mensual['cilindros_extincion_cargados'] == 'NO' ? 0 : null);
                            } else {
                                $energy_equipement_revisions_statuses->observation = $data_mensual['cilindros_extincion_cargados'];
                            }
                            $energy_equipement_revisions_statuses->save();

                            $files = explode(",", $data_mensual['archivos']);

                            foreach ($files as $file) {

                                $new_file                               = new Energy_equipement_revisions_images;
                                $new_file->energy_equipment_revision_id = $energy_equipement_revisions->id;
                                $new_file->url                          = $file;
                                $new_file->save();

                            }

                        }

                    }

                }

            }

        } catch (Exception $e) {
            return $e;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createData($data_mensual, $energy_equipement_revisions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData($data_mensual, $energy_equipement_revisions)
    {
        $energy_equipement_revisions_statuses = Energy_equipement_revisions_statuses::where('energy_equipment_revision_id', $energy_equipement_revisions->id)->get();

        foreach ($energy_equipement_revisions_statuses as $energi_statuses) {

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
