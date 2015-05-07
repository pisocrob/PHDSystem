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
	        require APP . 'view/home/login.php';
	        require APP . 'view/_templates/footer.php';
		}

	}

	public function xxaddApplicant() {
		$this->model->addApplicant($_POST["fname"],  $_POST["lname"], $_POST["email"],
		$_POST["qualifications"], $_POST["cv"],	$_POST["passport"]);
		header('location: ' . URL . 'applicant/getAllApplicants');
	}

		

	public function deleteApplicant($applicantid) {	
		if(isset($applicantid)) {
			$this->model->deleteApplicant($applicantid);
		}
	}

	public function editApplicant($applicantid) {
		if(isset($applicantid)){
			$applicant = $this->model->getApplicant($applicantid);

			require APP . 'view/_templates/header.php';
			require APP . 'view/applicant/editApplicant.php';
			require APP . 'view/_templates/footer.php';
		}
	}

	public function updateApplicant(){
		if(isset($_POST['submit_update_applicant'])){
			$this->model->updateApplicant($_POST['fname'], $_POST['lname'], $_POST['qualifications,'],
				$_POST['cvpath'], $_POST['passportpath'], ['email'], $_POST['applicantid']);
		}
	}
}
