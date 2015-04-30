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


/**
 *MATT'S SUBMISSION METHODS START HERE:
 */

public function getAllSubmissions($searchSubmission) {
    $sql = "SELECT submissionID, title, dicipline1, dicipline2, dicipline3,
    abstaract, fullProposalPath, submissionDate, allocationDate, applicantID,
    active FROM Submission WHERE title LIKE (:searchSubmission)";
    $query = $this->db->prepare($sql);
    $parameters = array(':searchSubmission' => $searchSubmission);
    $query->execute($parameters);

    return $query->fetchAll();
}


public function addSubmission($submissionID, $title, $dicipline1,
    $dicipline2, $dicipline3, $abstaract, $fullProposalPath, $submissionDate,
    $allocationDate, $applicantId) {
    $sql = "INSERT INTO Submission (submissionID, title, dicipline1,
      dicipline2, dicipline3, abstaract, fullProposalPath, submissionDate,
      allocationDate, applicantId)
      VALUES (:submissionID, :title, :dicipline1, :dicipline2, :dicipline3,
      :abstaract, :fullProposalPath, :submissionDate, :allocationDate,
      :applicantId)";

    $query = $this->db->prepare($sql);
    $parameters = array(':submissionID' => $submissionID, ':title' => $title,
    ':dicipline1' => $dicipline1, ':dicipline2' => $dicipline2,
    ':dicipline3' => $dicipline3, ':abstaract' => $abstaract,
    ':fullProposalPath' => $fullProposalPath, ':submissionDate' => $submissionDate,
    ':allocationDate' => $allocationDate, ':applicantId' => $applicantId);

    $query->execute($parameters);

    //debugging line
   // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

public function deleteSubmissions($submissionID) {
    $sql = "DELETE FROM Submission WHERE submissionID = :submissionID";
    $query = $this->db->prepare($sql);
    $parameters = array(':submissionID' => $submissionID);

    $query->execute($parameters);
    //debugging line
   echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
}

public function editSubmissions() {
    //TODO: add parameters and do SQL query
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




    /**
     *THE STOCK DEFAULT METHODS
     * Get all songs from database
     */
    public function getAllSongs()
    {
        $sql = "SELECT id, artist, track, link FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addSong($artist, $track, $link)
    {
        $sql = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteSong($song_id)
    {
        $sql = "DELETE FROM song WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a song from database
     */
    public function getSong($song_id)
    {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    public function updateSong($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_songs;
    }
}
