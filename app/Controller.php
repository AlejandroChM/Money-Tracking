<?php  
/**
 * Controller.php
 *
 * @author Jose Alejandro Chan Martin <alejandrochanmartin1@gmail.com>
 */

	/**
	 * Clase AppController
	 */	
	abstract class AppController
	{
		protected $_view;

		/**
		 * funcion de cosntruccion
		 * @return type
		 */
		public function __construct()
		{
			$this->_view = new View(new Request);
		}

		/**
		 * funcion index
		 * @return type
		 */	
		abstract function index();		

		/**
		 * funcion loadModel carga los modelos que son enviados
		 * @param $modelo 
		 * @return type
		 */
		protected function loadModel($modelo)
		{
			$modelo = $modelo."Model";
			$rutaModelo = ROOT."models".DS.$modelo.".php";

			if(is_readable($rutaModelo))
			{
				require_once($rutaModelo);
				$modelo = new $modelo;
				return $modelo;
			}
			else
			{
				throw new Exception("Error al cargar el modelo");
				
			}
		}

		/** 
		 * funcion redirect hace una redireccion a la ruta que le es asignada
		 * @param array $url 
		 * @return type
		 */
		public function redirect($url = array())
		{
			$path = "";
			if ($url["controller"]) {
				$path .= $url["controller"];
			}

			if ($url["action"]) {
				$path .="/".$url["action"];
			}

			header("LOCATION: ".APP_URL.$path);
		}
	}
?>