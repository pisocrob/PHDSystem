<? php

class credChecker{

	public function loggedInCheck(){
		if(isset($_SESSION['SESS_ID']) && isset($_SESSION['SESS_USER'])){

			return true;
		}
		else{
			return false;
		}
	}

	public function isRegistrar(){
		if($_SESSION['SESS_ID'] == 'registrar'){
			return true;
		}
		else{
			return false;
		}
	}

	public function isSupervisor(){
		if($_SESSION['SESS_ID'] == 'supervisor'){
			return true;
		}
		else{
			return false;
		}
	}

	public function getSupervisorId(){
		if($_SESSION['SESS_ID'] == 'supervisor'){
			return $_SESSION['SESS_USER'];
		}
		else{
			return false;
		}
	}
}