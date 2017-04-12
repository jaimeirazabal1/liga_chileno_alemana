<?php

class PanelController extends AppController{

	public function index(){
		// mail("jaimeirazabal1@gmail.com", "prueba", "Esto es una prueba!");
		if (Input::hasPost("password")) {
			if (Input::post('password') == Input::post('password2')) {
				$usuarios=Load::model("usuarios")->find(Auth::get('id'));
				$usuarios->password = Input::post('password');
				if ($usuarios->update()) {
					Flash::valid('Password Cambiada!');
				}else{
					Flash::error("Ocurrio algun error!");
				}
			}else{
				Flash::error("Las Password deben coincidir!");
			}
		}
	}
}