<?php  
/**
 * accountsController.php
 *
 * @author Jose Alejandro Chan Martin <alejandrochanmartin1@gmail.com>
 */

	/**
	 * Clase accountsController
	 */	
	class accountsController extends AppController
	{
		/**
		 * funcion de construccion
		 * @return type
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * funcion index que carga al modelo mismo
		 * @return type
		 */
		public function index()
		{
			$modelAccount = $this->loadModel("account");
			$this->_view->accounts = $modelAccount->GetAll();
			$this->_view->titulo="Cuentas";
			$this->_view->renderizar("index");
		}

		/**
		 * funcion add para agregar una cuenta nueva
		 * @return type
		 */
		public function add()
		{
			if($_POST)
			{
				$modelAccount = $this->loadModel("account");
				$modelAccount->add($_POST);
				$this->redirect(array("controller"=>"accounts"));
			}
			$this->_view->titulo="Nueva Cuenta";
			$this->_view->renderizar("add");
		}

		/**
		 * funcion update envia id de la cuenta que debe ser actuaizada
		 * @param null $id 
		 * @return type
		 */
		public function update($id=null)
		{
			if($_POST)
			{
				$modelAccount = $this->loadModel("account");
				$modelAccount->Update($_POST);
				$this->redirect(array("controller"=>"accounts"));
			}

			$modelAccount = $this->loadModel("account");
			$this->_view->account = $modelAccount->Find($id);
			$this->_view->titulo="Nueva Cuenta";
			$this->_view->renderizar("update");	
		}

		/**
		 * funcion delete envia id de la cuenta que debe ser eliminada
		 * @param null $id 
		 * @return type
		 */
		public function delete($id=null)
		{
			$modelAccount = $this->loadModel("account");
			$account = $modelAccount->Find($id);
			if($id)
			{
				$modelAccount->Delete($id);
				$this->redirect(array("controller"=>"accounts"));
			}
		}
	}
?>