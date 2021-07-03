<?php 
	include "models/CartModel.php";
	class CartController extends Controller{
		use CartModel;
		//them san pham vao gio hang
		public function add(){
			$id = isset($_GET["id"])?$_GET["id"]:0;
			//goi ham cartAdd de them san pham vao gio hang
			$this->cartAdd($id);
			header("location:index.php?controller=cart");
		}
		//liet ke cac san pham trong gio hang
		public function index(){
			//goi view
			$this->loadView("CartView.php");
		}
		//xoa san pham
		public function delete(){
			$id = isset($_GET["id"])?$_GET["id"]:0;
			//goi ham cartAdd de them san pham vao gio hang
			$this->cartDelete($id);
			header("location:index.php?controller=cart");
		}
		//cap nhat san pham trong gio hang
		public function update(){
			foreach($_SESSION["cart"] as $product){
				$id = $product["id"];
				$soluong = $_POST["product_$id"];
				//goi ham ca nha so luong
				$this->cartUpdate($id,$soluong);
				header("location:index.php?controller=cart");
			}
		}
		//xoa toan bo san pham trong gio hang
		public function destroy(){
			$this->cartDestroy();
			header("location:index.php?controller=cart");
		}
		//thanh toan gio hang
		public function checkout(){
			//kiem tra neu user chua dang nhap thi di chuyen den trang dawng nhap
			if(isset($_SESSION["customer_email"])==false)
				header("location:index.php?controller=account&action=login");
			else{
				$this->cartCheckOut();
			header("location:index.php?controller=cart");
			}
		}

	}
 ?>