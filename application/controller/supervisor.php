<?php session_start();

class Supervisor extends controller {

  public function index() {

   
    $supervisors = $this->model->getAllSupervisors();

    if(isset($_SESSION['USER_TYPE'])){
      if($_SESSION['USER_TYPE'] == 'registrar'){
        require APP . 'view/_templates/header.php';
        require APP . 'view/supervisor/index.php';
        require APP . 'view/supervisor/addsupervisor.php';
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
      require APP . 'view/home/login.php';
      require APP . 'view/_templates/footer.php';
    }

  }

  public function getAllSupervisors() {

    if(isset($_SESSION['USER_TYPE'])){
      if (empty($_POST["searchSupervisor"])) {
        $searchSupervisor = "%";
        }
        if (isset($_POST["searchSupervisor"])) {
        $searchSupervisor=$_POST['searchSupervisor'];
        }

        $supervisors = $this->model->getAllSupervisors($searchSupervisor);

        if($_SESSION['USER_TYPE'] == 'registrar'){
          require APP . 'view/_templates/header.php';
          require APP . 'view/supervisor/index.php';
          require APP . 'view/supervisor/addsupervisor.php';
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
      require APP . 'view/home/login.php';
      require APP . 'view/_templates/footer.php';
    }
  }

  public function xxaddSupervisor() {

    
      $this->model->addSupervisor($_POST["userName"], $_POST["staffNo"],
      $_POST["password"], $_POST["email"], $_POST["fName"], $_POST["lName"],
      $_POST["sDicipline1"], $_POST["sDicipline2"], $_POST["sDicipline3"]);
    header('location: ' . URL . 'supervisor/getAllSupervisors');         
  }

  public function deleteSupervisor($supervisorID) {
        if(isset($supervisorID)) {
          $this->model->deleteSupervisor($supervisorID);
        }
      header('location: ' . APP . 'view/supervisor/getAllSupervisors.php');        
  }  

  public function editSupervisor($supervisorID) {
    if(isset($supervisorID)){
      $supervisor = $this->model->getSupervisor($supervisorID);

      require APP . 'view/_templates/header.php';
      require APP . 'view/supervisor/editSupervisor.php';
      require APP . 'view/_templates/footer.php';
    }
  }

  public function updateSupervisor(){
    if(isset($_POST['submit_update_supervisor'])){
      $this->model->updateSupervisor($_POST['userName'], $_POST['staffNo'], $_POST['password'], $_POST['email'], $_POST['fname'], $_POST['lname'], $_POST['sDicipline1'], $_POST['sDicipline2'], $_POST['sDicipline3']);
    }
    header('location: ' . URL .'supervisor/getAllSupervisors');
  }
}
