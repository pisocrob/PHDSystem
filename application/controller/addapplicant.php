<?php

class AddApplicant extends controller {

	public function index() {

		/*
		view/applicant/addApplicant is being used here instead of index
		maybe we should write an index file?
		*/

		$applicants = $this->model->getAllApplicants();

		require APP . 'view/_templates/header.php';
        require APP . 'view/applicant/addApplicant.php';
        require APP . 'view/_templates/footer.php';
	}

	public function getAllApplicants() {

		$applicants = $this->model->getAllApplicants();

		require APP . 'view/_templates/header.php';
        require APP . 'view/applicant/Applicantadded.php';
        require APP . 'view/_templates/footer.php';

		//NOTE: commented out header line. For use with index file
		//header('location: ' . URL . 'applicant/index.php');

	}

	public function xxaddApplicant() {
      

		$this->model->addApplicant($_POST["id"], $_POST["fname"],  $_POST["lname"], $_POST["cv"], $_POST["passport"]);
		header('location: ' . URL . 'addapplicant/index');
		}

	public function deleteapplicant() {
		if(isset($applicantid)) {
			$this->model->deleteapplicant($applicantid);
		}
		header('location: ' . APP . 'view/applicant/Applicantadded.php');
	}

	public function editapplicant() {
//TODO: This method and relevant form
	}
	}