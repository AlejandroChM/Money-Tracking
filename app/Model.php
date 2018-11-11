<?php  
/**
 * Model.php
 *
 * @author Jose Alejandro Chan Martin <alejandrochanmartin1@gmail.com>
 */

	/** 
	 * Clase AppModel
	 */	
	class AppModel
	{
		/** 
		 * @var $_db Almacena la conexion que es realizada a la base de datos
		 */
		protected $_db;

		/** 
		 * funcion de construccion
		 * @return type
		 */
		public function __construct()
		{
			$this->_db = new Database();
		}
	}
?>