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

/**
 *MY METHODS START HERE:
 */



public function getAllApplicants($searchApplicant) {
    $sql = "SELECT applicantid, fname, lname, qualifications, cvpath, passportpath, email FROM Applicant WHERE fName LIKE (:searchApplicant)";
    $query = $this->db->prepare($sql);
    $parameters = array(':searchApplicant' => $searchApplicant);

    $query->execute($parameters);
    return $query->fetchAll();

}


public function addApplicant($fname, $lname, $email, $qualifications, $cvpath, $passportpath) {
    $sql = "INSERT INTO applicant (fname, lname, email, qualifications, cvpath, passportpath)
    VALUES (:fname, :lname, :email, :qualifications, :cv, :passport)";
    $query = $this->db->prepare($sql);

    $parameters = array(':fname' => $fname, ':lname' => $lname, ':email' => $email,
    ':qualifications' => $qualifications, ':cv' => $cvpath, ':passport' => $passportpath);
    $query->execute($parameters);

    //debugging line
   // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

public function deleteapplicant($applicantid) {
    $sql = "DELETE FROM applicant WHERE applicantid = :applicantid";
    $query = $this->db->prepare($sql);
    $parameters = array(':applicantid' => $applicantid);

    $query->execute($parameters);
    //debugging line
   echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

public function editapplicant() {
    //TODO: add parameters and do SQL query
}

public function getSubmission($submissionID){
    $sql = "SELECT title, dicipline1, dicipline2, dicipline3,
    abstract, fullProposalPath, submissionDate, allocationDate, applicantID,
    active, submissionID FROM Submission WHERE submissionID = :submissionID";
    $query = $this->db->prepare($sql);
    $parameters = array(':submissionID' => $submissionID);
    $query->execute($parameters);

    return $query->fetch();
}


/**
 *MATT'S SUBMISSION METHODS START HERE:
 */

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
    //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

}

/**
 *MATT'S SUPERVISOR METHODS START HERE:
 */


public function getAllSupervisors($searchSupervisor) {
    $sql = "SELECT userName, staffNo, password, email, fName, lName, email, sDicipline1, sDicipline2, sDicipline3 FROM Supervisor WHERE lName LIKE (:searchSupervisor)";
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

public function deleteSupervisor($userName) {
    $sql = "DELETE FROM Supervisor WHERE userName = :userName";
    $query = $this->db->prepare($sql);
    $parameters = array(':userName' => $userName);

    $query->execute($parameters);
    //debugging line
   echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

public function editSupervisor() {
    //TODO: add parameters and do SQL query
}

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
