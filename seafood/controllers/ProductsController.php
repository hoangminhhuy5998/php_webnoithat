<?php 
	include "models/ProductsModel.php";
	class ProductsController extends Controller{
		//ke thua class ProductsModel
		use ProductsModel;
		public function category(){
			//so ban ghi tren mot trang
			$recordPerPage = 4;
			//tinh so trang de truyen ra view
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			//lay du lieu
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("ProductsCategoryView.php",["numPage"=>$numPage,"data"=>$data]);
		}	
			// chi tiet san pham
		public function detail(){
			$id = isset($_GET["id"])? $_GET["id"]: 0;
			// lay mot ban ghi tu model
			$record = $this->modelGetRecord($id);
			// goi view, truyen du lieu ra view
			$this->loadView("ProductsDetailView.php",["record"=>$record,"id"=>$id]);
		}
		//danh gia so sao san pham
		public function rating(){
			$id = isset($_GET["id"]) ? $_GET["id"]:0;
			$star = isset($_GET["star"]) ? $_GET["star"]:0;
			$this->modelRating($id,$star);
			//di chuyen den trang chi tiet san pham
			header("location:index.php?controller=products&action=detail&id=$id");
		}
	}
 ?>