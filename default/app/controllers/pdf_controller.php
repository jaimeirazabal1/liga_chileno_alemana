<?php

class PdfController extends AppController{

	public function index($id_registro=null){
		$this->sino = array('1'=>'Ja','0'=>'Nein');
		Load::lib('fpdf/mc_table');
		if ($id_registro) {
			$this->registro = Load::model("registro")->find($id_registro);
		}
	}
}