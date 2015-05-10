
<?php

class Supervisors
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

public function getSupervisor($supervisorID){
    $sql = "SELECT userName, staffNo, password, email, fname, lname, supervisorID FROM Supervisor WHERE
    supervisorID = :supervisorID";
    $query = $this->db->prepare($sql);
    $parameters = array(':supervisorID' => $supervisorID);
    $query->execute($parameters);
 //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
    return $query->fetch();
}

public function getAllSupervisors($searchSupervisor) {
    $sql = "SELECT supervisorID, userName, staffNo, password, email, fName, lName, email, sDicipline1, sDicipline2, sDicipline3 FROM Supervisor WHERE lName LIKE :searchSupervisor";
    $query = $this->db->prepare($sql);
    $parameters = array(':searchSupervisor' => $searchSupervisor);
    $query->execute($parameters);

    return $query->fetchAll();
}


public function addSupervisor($userName, $staffNo, $password, $email, $fName, $lName, $sDicipline1, $sDicipline2, $sDicipline3) {
    $sql = "INSERT INTO Supervisor (userName, staffNo, password, email, fName,
    lName, sDicipline1, sDicipline2, sDicipline3)
    VALUES (:userName, :staffNo, :password, :email, :fName, :lName,
    :sDicipline1, :sDicipline2, :sDicipline3)";
    $query = $this->db->prepare($sql);
    $parameters = array(':userName' => $userName, ':staffNo' => $staffNo, ':password' => $password,
    ':email' => $email, ':fName' => $fName, ':lName' => $lName, ':sDicipline1' => $sDicipline1,
    ':sDicipline2' => $sDicipline2, ':sDicipline3' => $sDicipline3);
    $query->execute($parameters);

    //debugging line
   // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

public function deleteSupervisor($supervisorID) {
    $sql = "DELETE FROM Supervisor WHERE supervisorID = :supervisorID";
    $query = $this->db->prepare($sql);
    $parameters = array(':supervisorID' => $supervisorID);

    $query->execute($parameters);
    //debugging line
  // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

public function updateSupervisor($userName, $staffNo, $password, $email, $fname, $lname, $sDicipline1, $sDicipline2, $sDicipline3, $supervisorID) {
    $sql = "UPDATE Supervisor SET userName = :userName, staffNo = :staffNo, password = :password,
    email = :email, fname = :fname, lname = :lname, sDicipline1 = :sDicipline1,
    sDicipline2 = :sDicipline2, sDicipline3 = :sDicipline3 WHERE supervisorID = :supervisorID";
    $query = $this->db->prepare($sql);
    $parameters = array(':userName' => $userName, ':staffNo' => $staffNo, ':password' => $password,
        ':email' => $email, ':fname' => $fname, ':lname' => $lname, ':sDicipline1' => $sDicipline1,
        ':sDicipline2' => $sDicipline2, ':sDicipline3' => $sDicipline3, ':supervisorID' => $supervisorID);
    $query->execute($parameters);

   // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}
}
