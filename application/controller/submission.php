<?php

class Submission extends controller {

  public function index() {


    $submissions = $this->model->getAllSubmissions();

    require APP . 'view/_templates/header.php';
        require APP . 'view/submission/index.php';
        require APP . 'view/_templates/footer.php';
  }

  public function getAllSubmissions() {

    if (empty($_POST["searchSubmission"])) {
      $searchSubmission = "%";
      }
      if (isset($_POST["searchSubmission"])) {
      $searchSubmission=$_POST['searchSubmission'];
      }

    $submissions = $this->model->getAllSubmissions($searchSubmission);

    require APP . 'view/_templates/header.php';
        require APP . 'view/submission/index.php';
        require APP . 'view/_templates/footer.php';

    //NOTE: commented out header line. For use with index file


  }

  public function xxaddSubmission() {

    $this->model->addSubmission($_POST["submissionID"], $_POST["title"],
      $_POST["dicipline1"], $_POST["dicipline2"], $_POST["dicipline3"],
      $_POST["abstaract"], $_POST["fullProposalPath"], $_POST["submissionDate"],
      $_POST["allocationDate"], $_POST["applicantId"]);
    header('location: ' . URL . 'submission/getAllSubmissions');
    }

  public function deleteSubmission() {
    if(isset($SubmissionID)) {
      $this->model->deleteSubmission($submissionID);
    }
    header('location: ' . APP . 'view/submission/index.php');
  }

  public function editSubmission() {
//TODO: write model functions to call
  }
  }
