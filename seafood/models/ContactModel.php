<?php 
	trait ContactModel{
		public function modelHotProducts(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where hot=1 order by id desc limit 0,4");
			return $query->fetchAll();
		}
	}
 ?>