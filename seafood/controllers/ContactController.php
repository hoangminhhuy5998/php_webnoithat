<?php 
	include "models/ContactModel.php";
	class ContactController extends Controller{
		use ContactModel;
		public function index(){
			$this->loadView("ContactView.php");
		}
	}
 ?>