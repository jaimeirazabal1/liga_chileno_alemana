<?php
/**
 * @see Controller nuevo controller
 */
require_once CORE_PATH . 'kumbia/controller.php';

/**
 * Controlador principal que heredan los controladores
 *
 * Todas las controladores heredan de esta clase en un nivel superior
 * por lo tanto los metodos aqui definidos estan disponibles para
 * cualquier controlador.
 *
 * @category Kumbia
 * @package Controller
 */
class AppController extends Controller
{

    final protected function initialize()
    {
    	$publicas = array("index/index","index/logout","registro/nuevo","pdf/index","index/login");
    	$actual = Router::get("controller")."/".Router::get("action");
    	if (!in_array($actual, $publicas)) {
    		if(!Auth::is_valid()){
    			Flash::warning("Usuario no válido!");
    			Redirect::to("index/");
    		}	
    	}
    }

    final protected function finalize()
    {
        
    }

}
