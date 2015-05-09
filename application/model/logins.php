<?php

class Logins
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
