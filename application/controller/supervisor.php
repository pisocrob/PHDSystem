<?php session_start();

class Supervisor extends controller {

  public function index() {

   
    $supervisors = $this->model->getAllSupervisors();

    if(isset($_SESSION['USER_TYPE'])){
      if($_SESSION['USER_TYPE'] == 'registrar'){
        require APP . 'view/_templates/header.php';
        require APP . 'view/supervisor/index.php';
        require APP . 'view/supervisor/addapplicant.php';
        require APP . 'view/_templates/footer.php';
      }
      else{
        require APP . 'view/_templates/header.php';
        require APP . 'view/supervisor/index.php';
        require APP . 'view/_templates/footer.php';       
      }
    }
    else {
      require APP . 'view/_templates/header.php';
      echo 'Must be logged in';
      require APP . 'view/home/index.php';
      require APP . 'view/_templates/footer.php';
    }

  }

  public function getAllSupervisors() {

    if (empty($_POST["searchSupervisor"])) {
      $searchSupervisor = "%";
      }
      if (isset($_POST["searchSupervisor"])) {
      $searchSupervisor=$_POST['searchSupervisor'];
      }

    $supervisors = $this->model->getAllSupervisors($searchSupervisor);

    require APP . 'view/_templates/header.php';
    require APP . 'view/supervisor/index.php';
    require APP . 'view/_templates/footer.php';

    //NOTE: commented out header line. For use with index file


  }

  public function xxaddSupervisor() {


    $this->model->addSupervisor($_POST["userName"], $_POST["staffNo"],
      $_POST["password"], $_POST["email"], $_POST["fName"], $_POST["lName"],
      $_POST["sDicipline1"], $_POST["sDicipline2"], $_POST["sDicipline3"]);
    header('location: ' . URL . 'supervisor/getAllSupervisors');
    }

  public function deleteSupervisor() {
    if(isset($supervisorID)) {
      $this->model->deleteSupervisor($userName);
    }
    header('location: ' . APP . 'view/supervisor/index.php');
  }

  public function editSupervisor() {
//TODO: write model functions to call
  }
  }
