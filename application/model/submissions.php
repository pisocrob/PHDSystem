<?php

class Submissions
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


    public function addSubmission($title, $dicipline1,
        $dicipline2, $dicipline3, $abstract, $fullProposalPath, $submissionDate,
        $allocationDate, $applicantID){
        $sql = "INSERT INTO Submission (title, dicipline1,
          dicipline2, dicipline3, abstract, fullProposalPath, submissionDate,
          allocationDate, applicantID)
           VALUES (:title, :dicipline1, :dicipline2, :dicipline3,
          :abstract, :fullProposalPath, :submissionDate, :allocationDate,
          :applicantID)";

        $query = $this->db->prepare($sql);
        $parameters = array(':title' => $title,
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

    public function checkInterest($userName){
        $sql = "SELECT * FROM interest where supervisorID = (SELECT supervisorID FROM Supervisor WHERE userName = :userName)";
        $query = $this->db->prepare($sql);
        $parameters = array(':userName' => $userName);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function removeInterest($submissionID, $userName){
        $sql = "DELETE FROM interest WHERE supervisorID = (SELECT supervisorID from Supervisor WHERE userName = :userName) AND submissionID = :submissionID";
        $query = $this->db->prepare($sql);
        $parameters = array(':submissionID' => $submissionID, ':userName' => $userName);
        $query->execute($parameters);

        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
    }

    public function getEmailList($dicipline1, $dicipline2, $dicipline3){
        $sql = "SELECT email FROM Supervisor WHERE sDicipline1 = :dicipline1 OR sDicipline2 = :dicipline2
        OR sDicipline3 =:dicipline3";
        $query = $this->db->prepare($sql);
        $parameters = array(':dicipline1' => $dicipline1, ':dicipline2' => $dicipline2,
            ':dicipline3' => $dicipline3);
        $query->execute($parameters);

        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        return $query->fetchAll(PDO::FETCH_COLUMN, 0);
    }
}
