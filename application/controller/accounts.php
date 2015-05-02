<?php session_start();

class accounts extends controller{

	public function logOut(){
		session_destroy();

		require APP . 'view/_templates/header.php';
		echo 'Logged Out';
        require APP . 'view/home/login.php';
        require APP . 'view/_templates/footer.php';
	}
}