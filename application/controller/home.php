<?php session_start();

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{




    public function index()
    {

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/login.php';
        require APP . 'view/_templates/footer.php';
    }

    public function checkRegCredentials() {
        if(isset($_POST["submit_reg_login"])){
            $credentials = $this->logins->getRegCredentials($_POST["userName"], $_POST["password"]);
            if (sizeof($credentials) > 0){

                $_SESSION['SESS_ID'] = $_POST['userName'];
                $_SESSION['SESS_USER'] = $_POST['userName'];
                $_SESSION['USER_TYPE'] = 'registrar';

                require APP . 'view/_templates/header.php';
                require APP . 'view/home/index.php';
                require APP . 'view/_templates/footer.php';
            }
            else {
                require APP . 'view/_templates/header.php';
                require APP . 'view/home/login.php';
                require APP . 'view/_templates/footer.php';
                echo "User name or password was incorrect";
            }
        }
    }

    public function checkSupCredentials() {
        if(isset($_POST["submit_login"])){
            $credentials = $this->logins->getSupCredentials($_POST["userName"], $_POST["password"]);
            if (sizeof($credentials) > 0){
                $_SESSION['SESS_ID'] = 'supervisor';
                $_SESSION['SESS_USER'] = $_POST['userName'];
                $_SESSION['USER_TYPE'] = 'supervisor';

                require APP . 'view/_templates/header.php';
                require APP . 'view/home/index.php';
                require APP . 'view/_templates/footer.php';
            }
            else {
                require APP . 'view/_templates/header.php';
                require APP . 'view/home/login.php';
                require APP . 'view/_templates/footer.php';
                echo "User name or password was incorrect";
            }
        }
    }

    public function regLogin(){
        if(isset($_SESSION['USER_TYPE'])){
            if($_SESSION['USER_TYPE'] == 'supervisor'){
                require APP . 'view/_templates/header.php';
                echo 'Already logged in as Supervisor';
                require APP . 'view/home/index.php';
                require APP . 'view/_templates/footer.php';
            }
            else{
                require APP . 'view/_templates/header.php';
                echo 'Already logged in as Registrar';
                require APP . 'view/home/index.php';
                require APP . 'view/_templates/footer.php';
            }
        }
        else{
            require APP . 'view/_templates/header.php';
            require APP . 'view/home/regLogin.php';
            require APP . 'view/_templates/footer.php';
        }
    }
}
