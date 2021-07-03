<?php 
	//ket noi csdl
	class Connection{
		public static function getInstance(){
			//ket noi csdl dung PDO , tra ket qua ve bien ket noi
			//new PDO("connect string","username",password)
			$conn = new PDO("mysql:host=localhost;dbname=test","root","");
			//lay du lieu theo kieu unicode
			$conn->exec("set names utf8");
			//lay ket qua tra ve theo object
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			return $conn;
		}
	}
 ?>