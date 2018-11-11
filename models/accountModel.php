<?php  
/**
 * accountsModel.php
 *
 * @author Jose Alejandro Chan Martin <alejandrochanmartin1@gmail.com>
 */

	/**
	 * Clase accountModel
	 */
	class accountModel extends AppModel
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
		 * funcion GetAll para cargar todas las cuentas
		 * @return type
		 */
		public function GetAll()
		{
			$query = $this->_db->prepare("SELECT * FROM accounts");
			$query->execute();
			$items = $query->fetchall();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}

		/**
		 * funcion add para agregar las cuentas
		 * @param array $data 
		 * @return type
		 */
		public function Add($data = array())
		{
			$query = $this->_db->prepare("INSERT INTO accounts (user_id,name) VALUES (:user_id,:name)");

			$defaultID = "1";
			$query->bindParam(":user_id",$defaultID);
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
		 * funcion Update actualiza los datos de una cuenta, segun el id enviado
		 * @param $data 
		 * @return type
		 */
		public function Update($data = array()) 
		{
			$query = $this->_db->prepare("UPDATE accounts SET name=:name WHERE id=:id");
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
		 * funcion find devuelve los datos de la cuenta perteneciente al id enviado
		 * @param $id 
		 * @return type
		 */
		public function Find($id)
		{
			$query = $this->_db->prepare("SELECT * FROM accounts WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}

		/** 
		 * funcion delete elimina la cuenta correspondiente a la id
		 * @param $id 
		 * @return type
		 */
		public function Delete($id)
		{
			$query = $this->_db->prepare("DELETE FROM accounts WHERE id=:id");
			$query->bindParam(":id",$id);
			$query->execute();
			$items = $query->fetch();
			if($items)
			{
				return $items;
			}
			else
			{
				return false;
			}
		}
	}
?>