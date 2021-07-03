<?php 
	//load file model
	include "models/LoginModel.php";
	class LoginController extends Controller{
		//ke thua class LoginModel
		use LoginModel;
		public function index(){
			//load view
			$this->loadView("LoginView.php");
		}
		//khi an nut submit
		public function login(){
			$this->modelLogin();
		}
		//dăng xuat
		public function logout(){
			unset($_SESSION["admin_email"]);
			header("location:index.php");
		}
	}
 ?>