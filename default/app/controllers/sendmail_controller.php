<?php

class SendmailController extends AppController{
	public function index($registro_id){
		$this->logs = Load::model('log_correos')->find("conditions: registro_id=".$registro_id);
	}
}