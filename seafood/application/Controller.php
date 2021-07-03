<?php 
	class Controller{
		public $view = NULL;
		public $layoutPath = NULL;
		public function loadView($fileName,$data = NULL){
			//gan cac thong so de bien $fileName thanh duong dan hoan chinh
			$fileName = "views/$fileName";
			if(file_exists($fileName)){
				ob_start();
					//su dung lenh extract de bien ten key thanh ten bien
					if($data != NULL)
						extract($data);
					include $fileName;
					//doc du lieu cua file $fileNam va nem du lieu vao bien $this->view
					$this->view = ob_get_contents();
				ob_end_clean();
			}	
			//---
			if($this->layoutPath != NULL)
				include "views/$this->layoutPath";
			else
				echo $this->view;		
		}
		//ham xac thuc dang nhap trang admin
		public function authentication(){
			if(isset($_SESSION["admin_email"])==false)
				header("location:index.php?controller=login");
		}
	}
 ?>