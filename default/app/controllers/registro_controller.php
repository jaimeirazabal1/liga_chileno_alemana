<?php

class RegistroController extends AppController{
	public function nuevo(){
		//echo getcwd()."/files/upload/registro_fotos/";
		if (Input::post("registro")) {
			if (isset($_FILES['foto']) and $_FILES['foto']['name']) {
				/*echo "<pre>";
				var_dump($_FILES);
				echo "</pre>";*/
				$foto_name = date("Y_m_d_H_i_s")."_".$_FILES['foto']['name'];
				$_FILES['foto']['name'] = $foto_name;
			}
			$registro = Load::model("registro",Input::post("registro"));
			$r = Input::post("registro");
			$registro->foto = $foto_name;
			$registro->celular = $r["celular_code"]." ".$registro->celular;
			$registro->celularPadre = $r["celularPadre_code"]." ".$registro->celularPadre;
			$registro->celularMadre = $r["celularMadre_code"]." ".$registro->celularMadre;
			$registro->nivelidioma = $registro->nivelidioma." | ".$r["nivelidioma2"];
			if ($registro->save()) {
				
				$archivo = Upload::factory('foto'); 
	            $archivo->setExtensions(array('jpg', 'png', 'gif'));//le asignamos las extensiones a permitir
	            $archivo->setPath(getcwd()."/files/upload/registro_fotos/");
	            if ($archivo->isUploaded()) {
	                if ($archivo->save()) {
	                    Flash::valid('Imagen subida correctamente!');
	                    $imagen=1;
	                }
	            }else{
	                    Flash::warning('No se ha Podido Subir la imagen!');
	            }
				Flash::valid("Registro Guardado con éxito!");
				if (isset($imagen) and $imagen == 1) {
					$ultimo= Load::model("registro")->find("limit: 1","order: id desc");
					Redirect::to("pdf/index/".$ultimo[0]->id);
				}
				//Input::delete();
			}else{
				Flash::error("No se realizó el registro!");
			}
		}
	}
	public function editar(){
		if (Input::post("registro")) {
			if (isset($_FILES['foto']) and $_FILES['foto']['name']) {
				/*echo "<pre>";
				var_dump($_FILES);
				echo "</pre>";*/
				$foto_name = date("Y_m_d_H_i_s")."_".$_FILES['foto']['name'];
				$_FILES['foto']['name'] = $foto_name;
			}
			$registro = Load::model("registro",Input::post("registro"));
			$r = Input::post("registro");
			if (isset($_FILES['foto']) and $_FILES['foto']['name']) {
				$registro->foto = $foto_name;
			}
			$registro->celular = $r["celular_code"]." ".$registro->celular;
			$registro->celularPadre = $r["celularPadre_code"]." ".$registro->celularPadre;
			$registro->celularMadre = $r["celularMadre_code"]." ".$registro->celularMadre;
			$registro->nivelidioma = $registro->nivelidioma." | ".$r["nivelidioma2"];
		
			if ($registro->update()) {
				echo "<pre>",print_r(json_decode(json_encode($registro))),"</pre>";
				if (isset($_FILES['foto']) and $_FILES['foto']['name']) {
					$archivo = Upload::factory('foto'); 
		            $archivo->setExtensions(array('jpg', 'png', 'gif'));//le asignamos las extensiones a permitir
		            $archivo->setPath(getcwd()."/files/upload/registro_fotos/");
		            if ($archivo->isUploaded()) {
		                if ($archivo->save()) {
		                    Flash::valid('Imagen subida correctamente!');
		                }
		            }else{
		                    Flash::warning('No se ha Podido Subir la imagen!');
		            }
		        }
				Flash::valid("Registro Actualizado con éxito!");
				//Input::delete();
			}else{
				Flash::error("No se realizó el la actualización del registro!");
			}
		}
		Redirect::to("registro/ver/".$r['id']);
	}
	public function borrar($id){
		$registro = Load::model("registro")->find($id);
		if ($registro->delete()) {
			Flash::valid("Registro Eliminado!");
		}
		Redirect::to("registro/");
	}
	public function ver($id){
		$this->registro = Load::model("registro")->find($id);
		// echo "<pre>";
		// echo print_r(json_decode(json_encode($this->registro)));
		// die;
		$this->registro->celular_code = explode(" ",$this->registro->celular)[0];
		$this->registro->celular = explode(" ",$this->registro->celular)[1];
		$this->registro->celularPadre = explode(" ",$this->registro->celularPadre)[1];
		$this->registro->celularPadre_code = explode(" ",$this->registro->celularPadre)[0];
		$this->registro->celularMadre = explode(" ",$this->registro->celularMadre)[1];
		$this->registro->celularMadre_code = explode(" ",$this->registro->celularMadre)[0];
		$this->registro->nivelidioma2 = explode("|",$this->registro->nivelidioma)[1];
		$this->registro->nivelidioma = explode("|",$this->registro->nivelidioma)[0];
	}
	public function index(){
		$this->registros = Load::model("registro")->find();
	}
}