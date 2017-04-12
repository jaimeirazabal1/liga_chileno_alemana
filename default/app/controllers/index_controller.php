<?php

/**
 * Controller por defecto si no se usa el routes
 *
 */
class IndexController extends AppController
{

    public function index()
    {
        mail('jaimeirazabal@gmail.com','Entro Alguien a la pagina',$_SERVER);
        Redirect::to('registro/nuevo');
    }
    public function send_mail($registro_id){
        $registro = Load::model('registro')->find($registro_id);
        $subject="Empezando a enviar correos";
        $message='
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
    <tbody><tr>
        <td style="vertical-align: top;">
            <img src="'.$_SERVER["SERVER_NAME"].'/img/logo.jpg" alt="Clean UI Admin Template" style="height: 40px">
        </td>
        <td style="text-align: right; vertical-align: middle;">
            <span style="color: #a09bb9;">
                Some Description
            </span>
        </td>
    </tr>
    </tbody></table>
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody><tr>
            <td>
                <p>Hi there,</p>
                <p>Sometimes you just want to send a simple HTML email with a simple design and clear call to action. This is it.</p>
                <a href="javascript: void(0);" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #01a8fe; border-radius: 5px">
                    Call To Action
                </a>
                <p>This is a really simple email template. Its sole purpose is to get the recipient to click the button with no distractions.</p>
                <p>Good luck! Hope it works.</p>
            </td>
        </tr>
        </tbody>
    </table>
        ';
        // set URL and other appropriate options
        $path='/files/upload/';
        $filename=str_replace(" ", "_", $registro->nombre.date('Y_m_d')).'.pdf';
        $payload = file_get_contents("http://".$_SERVER["SERVER_NAME"]."/pdf/index/$registro_id?tosend=".$filename);
        Load::lib('SendMail');
        new SendMail($registro->mail,$subject,$message,$path,$filename);
    }
    public function antes_de_enviar($id_registro){
        $registro_id = $id_registro;
        $this->registro = Load::model("registro")->find($id_registro);
        $registro = Load::model('registro')->find($registro_id);
        Load::lib('SendMail');
        if (Input::hasPost("destinatarios")) {
            $destinatarios = explode(',',Input::post('destinatarios'));
            // $registro = Load::model('registro')->find($registro_id);
            for ($i=0; $i < count($destinatarios) ; $i++) { 
                    $subject="Empezando a enviar correos";
                    $message='
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                <tbody><tr>
                    <td style="vertical-align: top;">
                        <img src="'.$_SERVER["SERVER_NAME"].'/img/logo.jpg" alt="Clean UI Admin Template" style="height: 40px">
                    </td>
                    <td style="text-align: right; vertical-align: middle;">
                        <span style="color: #a09bb9;">
                            Some Description
                        </span>
                    </td>
                </tr>
                </tbody></table>
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody><tr>
                        <td>
                            <p>Hi there,</p>
                            <p>Sometimes you just want to send a simple HTML email with a simple design and clear call to action. This is it.</p>
                            <a href="javascript: void(0);" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #01a8fe; border-radius: 5px">
                                Call To Action
                            </a>
                            <p>This is a really simple email template. Its sole purpose is to get the recipient to click the button with no distractions.</p>
                            <p>Good luck! Hope it works.</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                    ';
                  

                    $filename=str_replace(" ", "_", $this->registro->nombre.date('Y_m_d')).'.pdf';
                    // set URL and other appropriate options
                    $path='http://'.$_SERVER["SERVER_NAME"].'/files/upload/';
                   
                    // echo "<pre>","http://".$_SERVER["SERVER_NAME"]."/pdf/index/$registro_id?tosend=".$filename,"</pre>";
                    $payload = file_get_contents("http://".$_SERVER["SERVER_NAME"]."/pdf/index/$registro_id?tosend=".$filename);
               
                    
                    $mailO = new SendMail($destinatarios[$i],$subject,$message,$path,$filename);
                    if ($mailO->request) {
                        $log_correos = Load::model("log_correos",array('destinatarios'=>$destinatarios[$i],
                                                                        'registro_id'=>$registro_id));
                        $log_correos->save();
                    }else{
                        $log_correos = Load::model("log_correos",array('destinatarios'=>"NO se envio el correo a:".$destinatarios[$i],
                                                                        'registro_id'=>$registro_id));
                        $log_correos->save();

                    }
            }
        }
    }
    public function logout(){
    	Auth::destroy_identity();
    	Redirect::to("/");
    }
    public function login(){
        if (Input::hasPost("login","password")){
            $pwd = Input::post("password");
            $usuario=Input::post("login");
 
            $auth = new Auth("model", "class: usuarios", "login: $usuario", "password: $pwd");
            if ($auth->authenticate()) {
                Redirect::to("panel/");
            } else {
                Flash::error("Falló");
            }
        }       
    }
}
