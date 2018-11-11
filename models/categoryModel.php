<?php  
/**
 * categoryModel.php
 *
 * @author Jose Alejandro Chan Martin <alejandrochanmartin1@gmail.com>
 */

	/**
	 * Clase categoryModel
	 */
	class categoryModel extends AppModel
	{
		/** 
		 * funcion  de construccion
		 * @return type
		 */
		public function __construct()
		{
			parent::__construct();
		}

		/** 
		 * funcion getAll devuelve todas las categorias
		 * @return type
		 */
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT * FROM categories ");
			$query->execute();
			$items = $query->fetchall();
			
			if($items)
			{
				return $items;
			}
			else
			{
				return null;
			}
		}

		/** 
		 * funcion Add para agregar una nueva categoria
		 * @param array $data 
		 * @return type
		 */
		public function Add($data = array())
		{
			$query = $this->_db->prepare("INSERT INTO categories (name) VALUES (:name )");			
			$query->bindParam(":name",$data['name']);

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/** 
		 * funcion Update que actualiza los datos de la categoria
		 * @param array $data 
		 * @return type
		 */
		public function Update($data = array()) 
		{
			$query = $this->_db->prepare("UPDATE categories SET name=:name WHERE id=:id");		

			$query->bindParam(":id",$data['id']);	
			$query->bindParam(":name",$data['name']);

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		/** 
		 * funcion Find devuelve lso datos de la categoria perteneciente al id
		 * @param  $id 
		 * @return type
		 */
		public function Find($id)
		{
			$query = $this->_db->prepare("SELECT * FROM categories WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			
			if($items)
			{
				return $items;
			}
			else
			{
				return null;
			}
		}

		/** 
		 * funcion Delete elimina la categoria perteneciente a la id
		 * @param $id 
		 * @return type
		 */
		public function Delete($id)
		{
			$query = $this->_db->prepare("DELETE FROM categories WHERE id=:id");		

			$query->bindParam(":id",$id);	

			if($query->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
?>