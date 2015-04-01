<?php

class AddApplicant extends controller {

	public function index() {

		/*
		view/applicant/addApplicant is being used here instead of index
		maybe we should write an index file?
		*/

		require APP . 'view/_templates/header.php';
        require APP . 'view/applicant/addapplicant.php';
        require APP . 'view/_templates/footer.php';
	}

	public function getAllApplicants() {

		$applicants = $this->model->getAllApplicants();

		//NOTE: commented out header line. For use with index file
		//header('location: ' . URL . 'applicant/index.php');

	}

	public function xxaddApplicant() {
		if (isset($_POST["submit"])) {
            $this->model->addApplicant($_POST["id"], $_POST["fname"],  $_POST["lname"], $_POST["cv"], $_POST["passport"]);
		}
	//go to applicant added page??
	header('location: ' . URL . 'addapplicant/index');
	}
}