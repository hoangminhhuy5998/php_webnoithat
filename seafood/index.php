<?php 
	//start session
	session_start();
	//load file Connection
	include "application/Connection.php";
	//load file Controller.php
	include "application/Controller.php";
 ?>
 <!-- load dong MVC -->
 <?php 
 	//lay bien controller truyen url
 	$controller = isset($_GET["controller"]) ? $_GET["controller"] : "Home";
 	$action = isset($_GET["action"]) ? $_GET["action"] : "index";
 	//gan them cac chuoi de thanh mot duong dan file controller
 	//ham ucfirst(string) se viet hoa ky tu dau tien
 	$fileController = "controllers/".ucfirst($controller)."Controller.php";
 	$className = ucfirst($controller)."Controller";
 	if(file_exists($fileController)){
 		include $fileController;
 		$obj = new $className();
 		//goi action
 		$obj->$action();
 	}else{
 		die("$fileController không tồn tại");
 	}
  ?>