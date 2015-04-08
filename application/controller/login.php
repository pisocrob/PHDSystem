<?php

class login extends controller {

	session_start();

	public function index(){
		require APP . 'view/_templates/header.php'
		require APP . 'view/login/login.php'
		require APP . 'view/_templates/footer.php'
	}

	public function checkcredentials(){
		if($_post["username"] = "registrar"){
			$login = $this->model->checkloginregistar($_POST["username"], $_POST["password"])
			if($login->rowCount() > 0){
				$_SESSION['SESS_USER_ID'] = $login->userName;
				$_SESSION['SESS_USER_PASS'] = $login->password;
				$_SESSION['USER_PRIVLEDGE'] = "registrar";

				header('location:' . URL . 'addapplicant/index');
			}
			else{
				header('location:' . URL . 'login/index');
			}
		}
		else{
			$login = $this->model->checkloginsupervisor($_POST["username"], $_POST["password"])	
			if($login->rowCount() > 0){
				$_SESSION['SESS_USER_PASS'] = $login->userName;
				$_SESSION['SESS_USER_PASS'] = $login->password;
				$_SESSION['USER_PRIVLEDGE'] = "supervisor";

				//TODO: point this to the supervisor home page after merge
				header('location' . URL . 'addapplicant/index');
			}
			else{
				header('location:' . URL . 'login/index');
			}
		}
	}
}