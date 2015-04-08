<?php

class login extends controller {

	public function checkcredentials(){
		if($_post["username"] = "registrar"){
			$login = $this->model->checkloginregistar($_POST["username"], $_POST["password"])
			if()
		}
		else{
		$this->model->checkloginsupervisor($_POST["username"], $_POST["password"])			
		}
	}
}