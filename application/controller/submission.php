<?php session_start();

class Submission extends controller {

  public function index() {

    if(isset($_SESSION['USER_TYPE'])){
      $submissions = $this->submissions->getAllSubmissions();

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

    $submissions = $this->submissions->getAllSubmissions($searchSubmission);

    if(isset($_SESSION['USER_TYPE'])){

      $interests = $this->submissions->checkInterest($_SESSION['SESS_USER']);
      if($_SESSION['USER_TYPE'] == 'registrar'){
        require APP . 'view/_templates/header.php';
        require APP . 'view/submission/indexReg.php';
        require APP . 'view/submission/addsubmission.php';
        require APP . 'view/_templates/footer.php';
      }
      else if($interests > 0){
        require APP . 'view/_templates/header.php';
        require APP . 'view/submission/indexSupInterested.php';
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

  public function xxaddSubmission() {

    $this->submissions->addSubmission($_POST["title"],
      $_POST["dicipline1"], $_POST["dicipline2"], $_POST["dicipline3"],
      $_POST["abstaract"], $_POST["fullProposalPath"], $_POST["submissionDate"],
      $_POST["allocationDate"], $_POST["applicantID"]);

  $emails = $this->submissions->getEmailList($_POST["dicipline1"], $_POST["dicipline2"], $_POST["dicipline3"]);
  $emailList = implode(', ', $emails);
  $to = $emailList;
  $subject = 'New PHD Submission Alerts';
  $message = 'Tesing round 3';
  $headers = 'From: phdsystemalerts@gmail.com';

  mail($emailList, $subject, $message, $headers);
      
    header('location: ' . URL . 'submission/getAllSubmissions');
    }

  public function deleteSubmission($submissionID) {
    if(isset($submissionID)) {
      $this->submissions->deleteSubmission($submissionID);
    }
    header('location: ' . URL . 'submission/getAllSubmissions');
  }

  public function editSubmission($submissionID) {
    if(isset($submissionID)){
      $submission = $this->submissions->getSubmission($submissionID);

      require APP . 'view/_templates/header.php';
      require APP . 'view/submission/editSubmission.php';
      require APP . 'view/_templates/footer.php';
    }
  }

    public function updateSubmission(){
      if(isset($_POST['submit_update_submission'])){
        $this->submissions->updateSubmission($_POST['title'], $_POST['dicipline1'],
          $_POST['dicipline2'], $_POST['dicipline3'], $_POST['abstract'], $_POST['fullProposalPath'],
          $_POST['submissionDate'], $_POST['allocationDate'], $_POST['applicantID'], $_POST['submissionID']);
      }
      header('location: ' . URL .'submission/getAllSubmissions');
    }

    public function markForInterest($submissionID){
      if(isset($submissionID)){
        $this->submissions->markForInterest($submissionID,$_SESSION['SESS_USER']);
      }
      header('location: ' . URL . 'submission/getAllSubmissions');
    }

    public function removeInterest($submissionID){
      if(isset($submissionID)){
        $this->submissions->removeInterest($submissionID, $_SESSION['SESS_USER']);
      }
      header('location: ' . URL . 'submission/getAllSubmissions');
    }
  }
