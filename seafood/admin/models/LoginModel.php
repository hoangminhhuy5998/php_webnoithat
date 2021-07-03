<?php 
	trait LoginModel{
		public function modelLogin(){
			$email = $_POST["email"];
			$password = $_POST["password"];
			//ma hoa password
			$password = md5($password);
			//lay bien ket noi
			$conn = Connection::getInstance();
			//truyen cau truy van
			$query = $conn->prepare("select name, email, password from users where email=:var_email and password = :var_password");
			//thuc thi truy van, truyen cac bien
			$query->execute([":var_email"=>$email,":var_password"=>$password]);
			//lay mot ban ghi
			$result = $query->fetch();
			if(isset($result->email)){
				//dang nhap thanh cong
				$_SESSION["admin_email"] = $email;
				header("location:index.php");
			}else
				header("location:index.php?controller=login");
		}
	}
 ?>