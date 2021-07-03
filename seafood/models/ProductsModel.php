<?php 
	trait ProductsModel{
		//lay cac ban ghi co phan trang
		//$recordPerPage -> so ban ghi tren mot trang
		public function modelRead($recordPerPage){
			//---
			$order = isset($_GET["order"])?$_GET["order"]:"";
			$sqlOrder = " order by id desc ";
			switch ($order) {
				case "idDesc":
					$sqlOrder = "order by id desc";
				case "priceAsc":
					$sqlOrder = " order by (price - price*discount/100)asc ";
					break;
				case "priceDesc":
					$sqlOrder = " order by (price - price*discount/100) desc ";
					break;
				case "nameAsc":
					$sqlOrder = " order by name asc ";
					break;
				case "nameDesc":
					$sqlOrder = " order by name desc ";
					break;
			}
			//---
			$category_id = isset($_GET["category_id"])?$_GET["category_id"]:0;
			//lay tong cac ban ghi
			$totalRecord = $this->modelTotalRecord();
			//tinh so trang
			//ham ceil la ham lay trần. VD: ceil(2.2) = 3
			$numPage = ceil($totalRecord/$recordPerPage);
			//lay bien page truyen tu url
			$page = isset($_GET["p"])&&$_GET["p"]>0 ? $_GET["p"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id = $category_id $sqlOrder limit $from,$recordPerPage");
			//tra ve tat ca cac ban ghi
			return $query->fetchAll();
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			$category_id = isset($_GET["category_id"])?$_GET["category_id"]:0;
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select id from products where category_id = $category_id");
			//tra ve tong so ban ghi dem duoc
			return $query->rowCount();
		}
		//lay mot ban ghi
		public function modelGetRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from products where id=:var_id");
			$query->execute(["var_id"=>$id]);
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelGetCategory($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where id = $category_id");
			return $query->fetch();
		}
		//lay 6 san pham noi bat
		public function modelHotProducts(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where hot=1 order by id asc limit 0,4");
			return $query->fetchAll();
		}
	}
 ?>