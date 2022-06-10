<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SgcRechazoMail;
use App\Mail\TicketSuport;
use App\Mail\TicketSupportChangeStatus;
use App\Mail\TicketSupporMessage;
use App\Mail\SendCredentialsNewUser;
use App\Mail\SendGenericMailPlatForm;
use App\User;
use App\Tipo_motivo;
use App\Mail\TicketCreated;
use App\Site;
use App\Encargado_crm;
use App\Ticket;
use App\SolicitudSgc;
use Illuminate\Support\Facades\Auth;
use App\Models\Support\Ticket_support;

class MailController extends Controller
{
  public function RechazoSgc(Request $request)
  {
    $user = User::find($request->user_id);

    $solicitud_id = $request->solicitud_id;
    $motivo = $request->motivo_rechazo;

    \Mail::to($user->email)->send(new SgcRechazoMail($solicitud_id, $motivo, $user));
  }

  public function TicketMonitoreo(Request $request)
  {
    $user_send = User::find(Auth::user()->id);
    $site = Site::find($request->sitio);
    $encargado_crm = Encargado_crm::get(['crm_id', 'email', 'encargado']);
    foreach ($encargado_crm as $e) {
      if ($site->pop->comuna->zona->crm->id == $e->crm_id) {
        $email = $e->email;
        $name_encargado = $e->encargado;
      }
    }

    $ticket_id = $request->ticket;
    $motivo = Tipo_motivo::find($request->motivo);
    $motivo_desc = $motivo->descripcion;
    $descripcion = $request->descripcion;

    \Mail::to("sebastian.aguilar@anidalatam.com")->send(new TicketCreated($ticket_id, $motivo_desc, $user_send, $descripcion, $name_encargado));
  }

  public function TicketSupport(Request $request)
  {

    $ticket = Ticket_support::find($request->ticket_id);
    $user = User::where('id', $ticket->responsable_id)->first();
    $solicitante = User::find($ticket->user_id);

    \Mail::to("sebastian.aguilar@anidalatam.com")->send(new TicketSuport($ticket, $user, $solicitante));
  }

  public function TicketMailChangeStatus(Request $request)
  {
    $ticket = Ticket_support::find($request->ticket_id);
    $user = User::find($ticket->user_id);

    if ($ticket->estado_id == 2) {
      $image = "https://cdn-icons-png.flaticon.com/512/4727/4727424.png";
      $mesage_satate = "Su ticket nro° " . $ticket->id  . " se encuentra en curso";
      $body_message = "Para más información presionar botón  ver tickets ";
    } else {
      $image = "https://cdn-icons-png.flaticon.com/512/1828/1828640.png";
      $mesage_satate = "Su ticket  nro°" . $ticket->id  . " ha finalizado";
      $body_message = "Su ticket finalizó correctamente, para más información presionar botón ver tickets ";
    }

    \Mail::to($user->email)->send(new TicketSupportChangeStatus($image, $mesage_satate, $body_message, $user));
  }

  public function sendMailMessageTicket(Request $request)
  {

    $ticket = Ticket_support::find($request->ticket_id);
    $user = User::find($ticket->user_id);
    $mensaje = $request->mensaje;
    $mail_responsable = $ticket->responsable_id == 1 ? 'rodrigo.godoy@anidalatam.com' : 'sebastian.aguilar@anidalatam.com';
    \Mail::to($user->email)->send(new TicketSupporMessage($user, $mensaje, $ticket, $mail_responsable));
  }

  public function sendMailChangeStatusTicket(Request $request)
  {
    if ($request->plataforma == 1) {
      return $this->mailTicket($request);
    } else {
      if ($request->plataforma == 2) {
        return $this->mailSgc($request);
      }
    }
  }

  public function mailTicket($request)
  {
    $ticket = Ticket::find($request->ticket_id);
    $user = User::find($ticket->user_id);
    $url = "http://172.16.100.112/showTicket/" . $ticket->id;
    $body_message = "Para más información presionar botón ver  ";
    $subject = "Ticketera";
    if ($request->create_sgc) {
      $image = "https://cdn-icons-png.flaticon.com/512/390/390973.png";
      $mesage_satate = $request->solicitudes .   " asociado al Ticket " . $ticket->id;
      return \Mail::to($user->email)->send(new SendGenericMailPlatForm($user,  $image, $mesage_satate, $body_message, $url, $subject));
    }
    if ($ticket->estado_id == 1) {
      $image = "https://cdn-icons-png.flaticon.com/512/390/390973.png";
      $mesage_satate = "Ticket nro° " . $ticket->id  . " creado";

      return \Mail::to($user->email)->send(new SendGenericMailPlatForm($user,  $image, $mesage_satate, $body_message, $url, $subject));
    } else {
      if ($ticket->estado_id == 2) {
        $image = "https://cdn-icons-png.flaticon.com/512/1828/1828270.png";
        $mesage_satate = "Su ticket nro° " . $ticket->id  . " se encuentra en curso";

        return \Mail::to($user->email)->send(new SendGenericMailPlatForm($user,  $image, $mesage_satate, $body_message, $url, $subject));
      } else {
        if ($ticket->estado_id == 3) {
          $image = "https://cdn-icons-png.flaticon.com/512/390/390973.png";
          $mesage_satate = "Su ticket nro° " . $ticket->id  . " se encuentra en validación";

          return \Mail::to($user->email)->send(new SendGenericMailPlatForm($user,  $image, $mesage_satate, $body_message, $url, $subject));
        } else {
          if ($ticket->estado_id == 4) {
            $image = "https://cdn-icons-png.flaticon.com/512/1535/1535019.png";
            $mesage_satate = "Su ticket nro° " . $ticket->id  . " finalizó";

            return  \Mail::to($user->email)->send(new SendGenericMailPlatForm($user,  $image, $mesage_satate, $body_message, $url, $subject));
          } else {
            if ($ticket->estado_id == 9) {
              $image = "https://cdn-icons-png.flaticon.com/512/399/399274.png";
              $mesage_satate = "Su ticket nro° " . $ticket->id  . " fue rechazado";

              return  \Mail::to($user->email)->send(new SendGenericMailPlatForm($user,  $image, $mesage_satate, $body_message, $url, $subject));
            }
          }
        }
      }
    }
  }
  public function mailSgc($request)
  {

    $solicitud = SolicitudSgc::find($request->solicitud_id);

    $user = User::find($solicitud->user_id);
    $success_image = 'https://cdn-icons-png.flaticon.com/512/1041/1041728.png';
    $error_image = 'https://cdn-icons-png.flaticon.com/512/399/399274.png';
    $body_message = "Para más información presionar botón ver ";
    $subject = "SGC";
    $subestado = $solicitud->subestado_id != 4 &&  $solicitud->subestado_id != 13 ?  $solicitud->subestado->subestado : '';
    $image = $solicitud->subestado_id != 8 ?  $success_image : ($solicitud->subestado_id == 8 ?  $error_image : '');
    $mesage_satate = "Su solicitud SGC n° " . $solicitud->id  . " Cambio al estado " . $solicitud->proceso->descripcion . ' ' . $subestado;
    $url = "http://172.16.100.112/show/" . $solicitud->id;
    return  \Mail::to($user->email)->send(new SendGenericMailPlatForm($user, $image, $mesage_satate, $body_message, $url, $subject));
  }

  public function sendMailNotificationUpdateData(Request $request)
  {
    if ($request->plataforma == 1) {
      return $this->mailTicketUpdateData($request);
    } else {
      if ($request->plataforma == 2) {
        return $this->mailScgUpdateData($request);
      }
    }
  }

  public function mailTicketUpdateData($request)
  {
    $subject = "Ticketera";
    $ticket = Ticket::find($request->ticket_id);
    $user = User::find($ticket->user_id);
    $image = 'https://cdn-icons-png.flaticon.com/512/1041/1041728.png';
    $body_message = "Para más información presionar botón ver ";
    $mesage_satate = $request->motivo == 1 ? "Se ingreso el número de ework en el ticket  " . $ticket->id : ($request->motivo == 2 ? "Se ingreso en número de PEP en el ticket " . $ticket->id : "");
    $url = "http://172.16.100.112/showTicket/" . $ticket->id;

    return  \Mail::to($user->email)->send(new SendGenericMailPlatForm($user, $image, $mesage_satate, $body_message, $url, $subject));
  }
  public function mailScgUpdateData($request)
  {
    $subject = "SGC";
    $solicitud = SolicitudSgc::find($request->solicitud_id);
    $user = User::find($solicitud->user_id);
    $image = 'https://cdn-icons-png.flaticon.com/512/1041/1041728.png';
    $body_message = "Para más información presionar botón ver ";
    $mesage_satate = $solicitud->ticket_id ? "Se ingreso en número de PEP en el SGC n° " . $solicitud->id." asociado al ticket n° ".$solicitud->ticket_id:"Se ingreso en número de PEP en el SGC n° " . $solicitud->id ;
    $url = "http://172.16.100.112/show/" . $solicitud->id;
    return  \Mail::to($user->email)->send(new SendGenericMailPlatForm($user, $image, $mesage_satate, $body_message, $url, $subject));

  }

  public function sendMailUserStore(Request $request){

    $user = User::find($request->user_id);
    $temporal_password = $request->temporal_password;
    return  \Mail::to($user->email)->send(new SendCredentialsNewUser($user, $temporal_password ));

  }
}
