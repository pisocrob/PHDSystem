<?php session_start();


class Applicant extends controller {



	public function index() {
		
		$searchApplicant = '*';
		$applicants = $this->model->getAllApplicants();

		if(isset($_SESSION['USER_TYPE'])){
			if($_SESSION['USER_TYPE'] == 'registrar'){
				require APP . 'view/_templates/header.php';
		        require APP . 'view/applicant/index.php';
		        require APP . 'view/applicant/addApplicant.php';
		        require APP . 'view/_templates/footer.php';		
			}
			else{
				require APP . 'view/_templates/header.php';
		        require APP . 'view/applicant/index.php';
		        require APP . 'view/_templates/footer.php';
			}
		}
	}

	public function getAllApplicants() {

		
		if (empty($_POST["searchApplicant"])) {
    $searchApplicant = "%";
		}
		if (isset($_POST["searchApplicant"])) {
		$searchApplicant=$_POST['searchApplicant'];
		}

		$applicants = $this->model->getAllApplicants($searchApplicant);

		if(isset($_SESSION['USER_TYPE'])){
			if($_SESSION['USER_TYPE'] == 'registrar'){
				require APP . 'view/_templates/header.php';
		        require APP . 'view/applicant/index.php';
		        require APP . 'view/applicant/addApplicant.php';
		        require APP . 'view/_templates/footer.php';		
			}
			else{
				require APP . 'view/_templates/header.php';
		        require APP . 'view/applicant/index.php';
		        require APP . 'view/_templates/footer.php';
			}
		}
		else {
			require APP . 'view/_templates/header.php';
			echo 'Must be logged in';
	        require APP . 'view/home/index.php';
	        require APP . 'view/_templates/footer.php';
		}


		//NOTE: commented out header line. For use with index file
		//('location: ' . URL . 'applicant/index.php');

	}

	public function xxaddApplicant() {

		if(credChecker.isRegistrar()){
			$this->model->addApplicant($_POST["fname"],  $_POST["lname"], $_POST["email"],
			$_POST["qualifications"], $_POST["cv"],	$_POST["passport"]);
			header('location: ' . URL . 'applicant/getAllApplicants');
		}
		else{
			header('location: ' . APP . 'view/applicant/index.php');
		}

		}

	public function deleteapplicant() {
		if(credChecker.isRegistrar()){
			if(isset($applicantid)) {
				$this->model->deleteapplicant($applicantid);
			}
			header('location: ' . APP . 'view/applicant/Applicantadded.php');
		}
	}

	public function editapplicant() {
		if(credChecker.isRegistrar()){
			//TODO: write model functions to call
			
		}
	}
	}
