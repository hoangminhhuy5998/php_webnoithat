<?php 
	trait CategoriesModel{
		//lay cac ban ghi co phan trang
		//$recordPerPage -> so ban ghi tren mot trang
		public function modelRead($recordPerPage){
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
			$query = $conn->query("select * from categories where parent_id = 0 order by id desc limit $from,$recordPerPage");
			//tra ve tat ca cac ban ghi
			return $query->fetchAll();
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select id from categories where parent_id = 0");
			//tra ve tong so ban ghi dem duoc
			return $query->rowCount();
		}
		//lay mot ban ghi
		public function modelGetRecord($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->prepare("select * from categories where id=:var_id");
			$query->execute(["var_id"=>$id]);
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate($id){
			$name = $_POST["name"];
			$parent_id = $_POST["parent_id"];
			//$email = $_POST["email"];
			//$password = $_POST["password"];
			//lay bien ket noi
			$conn = Connection::getInstance();
			//update cot name
			$query = $conn->prepare("update categories set name=:var_name,parent_id=:var_parent_id where id=:var_id");
			$query->execute(["var_id"=>$id,"var_name"=>$name,"var_parent_id"=>$parent_id]);
			//---
			//neu user upload anh thi thuc hien upload
			
			$photo = "";
			if($_FILES["photo"]["name"] != ""){
				//---
				//lay anh cu de xoa
				$oldPhoto = $conn->query("select photo from categories where id=$id");
				if($oldPhoto->rowCount() > 0){
					$record = $oldPhoto->fetch();
					//xoa anh
					if($record->photo != "" && file_exists("../assets/upload/categories/".$record->photo))
						unlink("../assets/upload/categories/".$record->photo);
				}
				//---
				$photo = time()."_".$_FILES["photo"]["name"];
				move_uploaded_file($_FILES["photo"]["tmp_name"],"../assets/upload/categories/$photo");
				$query = $conn->prepare("update categories set photo=:var_photo where id=$id");
				$query->execute(array("var_photo"=>$photo));
			}
			//---
		}
		public function modelCreate(){
			$name = $_POST["name"];
			$parent_id = $_POST["parent_id"];
			//$email = $_POST["email"];
			//$password = $_POST["password"];
			//ma hoa password
			//$password = md5($password);
			$photo = "";
			//lay bien ket noi
			$conn = Connection::getInstance();
			//---
			//neu user upload anh thi thuc hien upload			
			$photo = "";
			if($_FILES["photo"]["name"] != ""){				
				$photo = time()."_".$_FILES["photo"]["name"];
				move_uploaded_file($_FILES["photo"]["tmp_name"],"../assets/upload/categories/$photo");
			}
			//---			
			$query = $conn->prepare("insert into categories set name=:var_name,parent_id=:var_parent_id,photo=:var_photo");
			$query->execute(["var_name"=>$name,"var_parent_id"=>$parent_id,"var_photo"=>$photo]);
		}
		public function modelDelete($id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			//---
			//lay anh cu de xoa
			$oldPhoto = $conn->query("select photo from categories where id=$id");
			if($oldPhoto->rowCount() > 0){
				$record = $oldPhoto->fetch();
				//xoa anh
				if($record->photo != "" && file_exists("../assets/upload/categories/".$record->photo))
					unlink("../assets/upload/categories/".$record->photo);
			}
			//---
			//update cot name
			$query = $conn->prepare("delete from categories where id=:var_id or parent_id = $id");
			$query->execute(["var_id"=>$id]);
		}
		public function modelCategoriesSub($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where parent_id = $category_id");
			return $query->fetchAll();
		}
		public function modelCategories(){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where parent_id = 0");
			return $query->fetchAll();
		}
	}
 ?>