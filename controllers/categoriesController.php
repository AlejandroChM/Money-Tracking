<?php  
/**
 * categoriesController.php
 *
 * @author Jose Alejandro Chan Martin <alejandrochanmartin1@gmail.com>
 */

	/**
	 * Clase categoriesController
	 */	
	class categoriesController extends AppController
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
		 * funcion index que actualiza al index mismo
		 * @return type
		 */
		public function index()
		{
			$category = $this->loadModel("category");
			$this->_view->categories = $category->GetAll();
			$this->_view->titulo="Categorias";
			$this->_view->renderizar("index");
		}

		/**
		 * funcion add envia los datos que deben ser agregados a la categoria
		 * @return type
		 */
		public function add()
		{
			if($_POST)
			{
				$modelCategory = $this->loadModel("category");
				$modelCategory->add($_POST);
				$this->redirect(array("controller"=>"categories"));
			}
			$this->_view->titulo="Nueva Categoria";
			$this->_view->renderizar("add");
		}

		/**
		 * funcion update envia el id de la categoria a actualizar al modelo
		 * @param null $id 
		 * @return type
		 */	
		public function update($id=null)
		{
			if($_POST)
			{
				$modelCategory = $this->loadModel("category");
				$modelCategory->Update($_POST);
				$this->redirect(array("controller"=>"categories"));
			}
			$modelCategory = $this->loadModel("category");
			$this->_view->category=$modelCategory->Find($id);
			$this->_view->titulo="Actualizar Categoria";
			$this->_view->renderizar("update");
		}

		/**
		 * funcion delete envia el id de la categoria a eliminar al modelo
		 * @param null $id 
		 * @return type
		 */
		public function delete($id=null)
		{
			$modelCategory = $this->loadModel("category");
			$category=$modelCategory->Find($id);

			if($category)
			{
				$modelCategory->Delete($id);
				$this->redirect(array("controller"=>"categories"));
			}
		}
	}
?>