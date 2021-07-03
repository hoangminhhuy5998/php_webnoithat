<?php 
	include "models/NewsModel.php";
	class NewsController extends Controller{
		//ke thua class NewsModel
		use NewsModel;
		public function index(){
			//so ban ghi tren mot trang
			$recordPerPage = 6;
			//tinh so trang de truyen ra view
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			//lay du lieu
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("NewsView.php",["numPage"=>$numPage,"data"=>$data]);
		}
		// chi tiet san pham
		public function detail(){
			$id = isset($_GET["id"])? $_GET["id"]: 0;
			// lay mot ban ghi tu model
			$record = $this->modelGetRecord($id);
			// goi view, truyen du lieu ra view
			$this->loadView("NewsDetailView.php",["record"=>$record,"id"=>$id]);
		}
	}
 ?>