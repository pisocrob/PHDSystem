<?php session_start();


class Applicant extends controller {



	public function index() {

		$searchApplicant = '*';
		$applicants = $this->applicants->getAllApplicants();

		if(isset($_SESSION['USER_TYPE'])){
			if($_SESSION['USER_TYPE'] == 'registrar'){
				require APP . 'view/_templates/header.php';
		        require APP . 'view/applicant/indexReg.php';
		        require APP . 'view/applicant/addApplicant.php';
		        require APP . 'view/_templates/footer.php';
			}
			else{
				require APP . 'view/_templates/header.php';
		        require APP . 'view/applicant/index.php';
		        require APP . 'view/_templates/footer.php';
			}
		}
		else{
			require APP . 'view/_templates/header.php';
			echo 'Must be logged in';
			require APP . 'view/home/login.php';
			require APP . 'view/_templates/footer.php';
		}
	}

	public function getAllApplicants() {


		if (empty($_POST["searchApplicant"])) {
    $searchApplicant = "%";
		}
		if (isset($_POST["searchApplicant"])) {
		$searchApplicant=$_POST['searchApplicant'];
		}

		$applicants = $this->applicants->getAllApplicants($searchApplicant);

		if(isset($_SESSION['USER_TYPE'])){
			if($_SESSION['USER_TYPE'] == 'registrar'){
				require APP . 'view/_templates/header.php';
		        require APP . 'view/applicant/indexReg.php';
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
		$this->applicants->addApplicant($_POST["fname"],  $_POST["lname"], $_POST["email"],
		$_POST["qualifications"], $_POST["cv"],	$_POST["passport"]);
		header('location: ' . URL . 'applicant/getAllApplicants');
	}



	public function deleteApplicant($applicantID) {
		if(isset($applicantID)) {
			$this->applicants->deleteApplicant($applicantID);

			header('location: ' . URL . 'applicant/getAllApplicants');
		}
	}

	public function editApplicant($applicantID) {
		if(isset($applicantID)){
			$applicant = $this->applicants->getApplicant($applicantID);

			require APP . 'view/_templates/header.php';
			require APP . 'view/applicant/editApplicant.php';
			require APP . 'view/_templates/footer.php';
		}
	}

	public function updateApplicant(){
		if(isset($_POST['submit_update_applicant'])){
			$this->applicants->updateApplicant($_POST['fname'], $_POST['lname'], $_POST['qualifications'],
				$_POST['cvpath'], $_POST['passportPath'], $_POST['email'], $_POST['applicantID']);

			header('location: ' . URL . 'applicant/getAllApplicants');
		}
	}
}
