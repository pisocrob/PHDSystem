<?php

class Model
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

//APPLICANT:

public function getApplicant($applicantID){
    $sql = "SELECT fname, lname, email, qualifications, cvpath, passportPath, applicantID
    FROM Applicant WHERE applicantID = :applicantID";
    $query = $this->db->prepare($sql);
    $parameters = array(':applicantID' => $applicantID);
    $query->execute($parameters);

    return $query->fetch();
}

public function getAllApplicants($searchApplicant) {
    $sql = "SELECT applicantID, fname, lname, qualifications, cvpath, passportPath, email FROM Applicant WHERE fName LIKE (:searchApplicant)";
    $query = $this->db->prepare($sql);
    $parameters = array(':searchApplicant' => $searchApplicant);

    $query->execute($parameters);
    return $query->fetchAll();

}


public function addApplicant($fname, $lname, $email, $qualifications, $cvpath, $passportPath) {
    $sql = "INSERT INTO applicant (fname, lname, email, qualifications, cvpath, passportPath)
    VALUES (:fname, :lname, :email, :qualifications, :cv, :passport)";
    $query = $this->db->prepare($sql);

    $parameters = array(':fname' => $fname, ':lname' => $lname, ':email' => $email,
    ':qualifications' => $qualifications, ':cv' => $cvpath, ':passport' => $passportPath);
    $query->execute($parameters);

    //debugging line
   // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

public function deleteapplicant($applicantID) {
    $sql = "DELETE FROM applicant WHERE applicantID = :applicantID";
    $query = $this->db->prepare($sql);
    $parameters = array(':applicantID' => $applicantID);

    $query->execute($parameters);
    //debugging line
   //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

public function UpdateApplicant($fname, $lname, $qualifications, $cvpath, $passportPath,
    $email, $applicantID) {
    $sql = "UPDATE Applicant SET fname = :fname, lname = :lname, qualifications = :qualifications,
    cvpath = :cvpath, passportPath = :passportPath WHERE applicantID = :applicantID";
    $query = $this->db->prepare($sql);
    $parameters = array(':fname' => $fname, ':lname' => $lname, ':qualifications' => $qualifications,
        ':cvpath' => $cvpath, ':passportPath' => $passportPath, ':email' => $email, ':applicantID' => $applicantID);
    $query->execute($parameters);
}



//SUBMISSION:

public function getSubmission($submissionID){
    $sql = "SELECT title, dicipline1, dicipline2, dicipline3,
    abstract, fullProposalPath, submissionDate, allocationDate, applicantID,
    active, submissionID FROM Submission WHERE submissionID = :submissionID";
    $query = $this->db->prepare($sql);
    $parameters = array(':submissionID' => $submissionID);
    $query->execute($parameters);

     //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

    return $query->fetch();
}



public function getAllSubmissions($searchSubmission) {
    $sql = "SELECT submissionID, title, dicipline1, dicipline2, dicipline3,
    abstract, fullProposalPath, submissionDate, allocationDate, applicantID,
    active FROM Submission WHERE title LIKE (:searchSubmission)";
    $query = $this->db->prepare($sql);
    $parameters = array(':searchSubmission' => $searchSubmission);
    $query->execute($parameters);

    return $query->fetchAll();
}


public function addSubmission($submissionID, $title, $dicipline1,
    $dicipline2, $dicipline3, $abstract, $fullProposalPath, $submissionDate,
    $allocationDate, $applicantID){
    $sql = "INSERT INTO Submission (submissionID, title, dicipline1,
      dicipline2, dicipline3, abstract, fullProposalPath, submissionDate,
      allocationDate, applicantID)
       VALUES (:submissionID, :title, :dicipline1, :dicipline2, :dicipline3,
      :abstract, :fullProposalPath, :submissionDate, :allocationDate,
      :applicantID)";

    $query = $this->db->prepare($sql);
    $parameters = array(':submissionID' => $submissionID, ':title' => $title,
    ':dicipline1' => $dicipline1, ':dicipline2' => $dicipline2,
    ':dicipline3' => $dicipline3, ':abstract' => $abstract,
    ':fullProposalPath' => $fullProposalPath, ':submissionDate' => $submissionDate,
    ':allocationDate' => $allocationDate, ':applicantID'  => $applicantID); 

    $query->execute($parameters);

    //debugging line
   // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

public function deleteSubmission($submissionID) {
    $sql = "DELETE FROM Submission WHERE submissionID = :submissionID";
    $query = $this->db->prepare($sql);
    $parameters = array(':submissionID' => $submissionID);

    $query->execute($parameters);
    //debugging line
  // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

public function updateSubmission($title, $dicipline1, $dicipline2, $dicipline3, $abstract, $fullProposalPath, $submissionDate, $allocationDate, $applicantID, $submissionID) {
    $sql = "UPDATE Submission SET title = :title, dicipline1 = :dicipline1,
    dicipline2 = :dicipline2, dicipline3 = :dicipline3, abstract = :abstract,
    fullProposalPath = :fullProposalPath, submissionDate = :submissionDate,
    allocationDate = :allocationDate, applicantID = :applicantID WHERE submissionID = :submissionID";
    $query = $this->db->prepare($sql);
    $parameters = array(':title' => $title, ':dicipline1' => $dicipline1, ':dicipline2' => $dicipline2,
    ':dicipline3' => $dicipline3, ':abstract' => $abstract, ':fullProposalPath' => $fullProposalPath,
    ':submissionDate' => $submissionDate, ':allocationDate' => $allocationDate,
    ':applicantID' => $applicantID, ':submissionID' => $submissionID);
    $query->execute($parameters);
   // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

}

public function markForInterest($submissionID, $userName){
    $sql = "INSERT into interest (submissionID, supervisorID) VALUES (:submissionID, (SELECT supervisorID FROM Supervisor WHERE userName = :userName))";
    $query = $this->db->prepare($sql);
    $parameters = array(':submissionID' => $submissionID, ':userName' => $userName);
    $query->execute($parameters);
    //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

//SUPERVISOR:

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
    $sql = "SELECT supervisorID, userName, staffNo, password, email, fName, lName, email, sDicipline1, sDicipline2, sDicipline3 FROM Supervisor WHERE lName LIKE (:searchSupervisor)";
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

public function updateSupervisor($userName, $staffNo, $password, $email, $fname, $lname, $sDicipline1, $sDicipline2, $sDicipline3) {
    $sql = "UPDATE Supervisor SET userName = :userName, staffNo = :staffNo, password = :password,
    email = :email, fname = :fname, lname = :lname, sDicipline1 = :sDicipline1,
    sDicipline2 = :sDicipline2, sDicipline3 = sDicipline3";
    $query = $this->db->prepare($sql);
    $parameters = array(':userName' => $userName, ':staffNo' => $staffNo, ':password' => $password,
        ':email' => $email, ':fname' => $fname, ':lname' => $lname, ':sDicipline1' => $sDicipline1,
        ':sDicipline2' => $sDicipline2, ':sDicipline3' => $sDicipline3);
    $query->execute($parameters);
}

//login methods:

public function getRegCredentials($userName, $password){
    $sql = "SELECT username, password from registrar WHERE username=:userName AND password=:password";
    $query = $this->db->prepare($sql);
    $parameters = array(':userName' => $userName, ':password' => $password);
    $query->execute($parameters);
    //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
    return $query->fetchAll();
}

public function getSupCredentials($userName, $password){
    $sql = "SELECT username, password from Supervisor WHERE username=:userName AND password=:password";
    $query = $this->db->prepare($sql);
    $parameters = array(':userName' => $userName, ':password' => $password);
    $query->execute($parameters);
    //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
    return $query->fetchAll();
}
}
