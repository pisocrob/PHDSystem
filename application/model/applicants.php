<?php

class Applicants
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
    cvpath = :cvpath, passportPath = :passportPath, email = :email WHERE applicantID = :applicantID";
    $query = $this->db->prepare($sql);
    $parameters = array(':fname' => $fname, ':lname' => $lname, ':qualifications' => $qualifications,
        ':cvpath' => $cvpath, ':passportPath' => $passportPath, ':email' => $email, ':applicantID' => $applicantID);
    $query->execute($parameters);

    echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}
}
