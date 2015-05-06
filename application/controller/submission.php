<?php session_start();

class Submission extends controller {

  public function index() {

    if(isset($_SESSION['USER_TYPE'])){
      $submissions = $this->model->getAllSubmissions();

      require APP . 'view/_templates/header.php';
      require APP . 'view/submission/index.php';
      require APP . 'view/_templates/footer.php';      
    }
    else{
      require APP . 'view/_templates/header.php';
      echo 'Must be logged in';
      require APP . 'view/home/login.php';
      require APP . 'view/_templates/footer.php';
    }
  }

  public function getAllSubmissions() {

    if (empty($_POST["searchSubmission"])) {
      $searchSubmission = "%";
      }
      if (isset($_POST["searchSubmission"])) {
      $searchSubmission=$_POST['searchSubmission'];
      }

    $submissions = $this->model->getAllSubmissions($searchSubmission);

    if(isset($_SESSION['USER_TYPE'])){
      if($_SESSION['USER_TYPE'] == 'registrar'){
        require APP . 'view/_templates/header.php';
        require APP . 'view/submission/index.php';
        require APP . 'view/submission/addsubmission.php';
        require APP . 'view/_templates/footer.php';   
      }
      else{
        require APP . 'view/_templates/header.php';
        require APP . 'view/submission/index.php';
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

  //No idea why this isn't working
  public function emailSetup(){
  
  $to = 'phdsystemalerts@gmail.com';
  $subject = 'New PHD Submission Alerts';
  $message = 'test';
  $headers = 'From: phdsystemalerts@gmail.com';

      mail($to, $subject, $message, $headers);
  }

  public function xxaddSubmission() {

    $this->model->addSubmission($_POST["submissionID"], $_POST["title"],
      $_POST["dicipline1"], $_POST["dicipline2"], $_POST["dicipline3"],
      $_POST["abstaract"], $_POST["fullProposalPath"], $_POST["submissionDate"],
      $_POST["allocationDate"], $_POST["applicantId"]);
    self::emailSetup();
    header('location: ' . URL . 'submission/getAllSubmissions');
    }

  public function deleteSubmission($submissionID) {
    if(isset($submissionID)) {
      $this->model->deleteSubmission($submissionID);
    }
    header('location: ' . APP . 'view/submission/index.php');
  }

  public function editSubmission($submissionID) {
    if(isset($submissionID)){
      $submission = $this->model->getSubmission($submissionID);

      require APP . 'view/_templates/header.php';
      require APP . 'view/submission/editSubmission.php';
      require APP . 'view/_templates/footer.php';
    }
  }

    public function updateSubmission(){
      if(isset($_POST["submit_update_submission"])){
        $this->model->updateSubmission($_POST['title'], $_POST['dicipline1'],
          $_POST['dicipline2'], $_POST['dicipline3'], $_POST['abstract'], $_POST['fullProposalPath'],
          $_POST['submissionDate'], $_POST['allocationDate'], $_POST['applicantID'], $_POST['submissionID']);
      }
      header('location: ' . URL .'submission/index');
    }
  }
