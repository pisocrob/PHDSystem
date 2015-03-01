<html>

<link rel="stylesheet" type="text/css" href="style.css">
<div id="navbar">
<ul>
  <li><a href="index.php">Login</a></li>
  <li><a href="catalogue.php">Search Submissions</a></li>
  <li><a href="addapplicant.php">Add an Applicant</a></li>
  <li><a href="addsupervisor.php">Add a Supervisor</a></li>
  <li><a href="addsubmission.php">Add a Submission</a></li>
</ul>
</div>
<div id="bodydiv">
<head>
<title>Add an Applicant</title>
</head>
<body>
<?php

require_once('C:\xampp\htdocs\PHDSystem\mysqli_connect.php');

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['id'])){

        // Adds name to array
        $data_missing[] = 'id';

    } else {

        // Trim white space from the name and store the name
        $id = trim($_POST['id']);

      }


    if(empty($_POST['fname'])){

        // Adds name to array
        $data_missing[] = 'fname';

    } else {

        // Trim white space from the name and store the name
        $fname = trim($_POST['fname']);

    }

    if(empty($_POST['lname'])){

        // Adds name to array
        $data_missing[] = 'lname';

    } else {

        // Trim white space from the name and store the name
        $lname = trim($_POST['lname']);

      }

      if(empty($_POST['cv'])){

        // Adds name to array
        $data_missing[] = 'cv';

    } else {

        // Trim white space from the name and store the name
        $cv = trim($_POST['cv']);

    }

    if(empty($_POST['passport'])){

        // Adds name to array
        $data_missing[] = 'passport';

    } else {

        // Trim white space from the name and store the name
        $passport = trim($_POST['passport']);

      }


    if(empty($data_missing)){



        $query = "INSERT INTO Applicant (id, fname, lname, cv, passport)
                              VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);



        mysqli_stmt_bind_param($stmt, "sssss", $id, $fname, $lname,
                               $cv, $passport);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Applicant Added';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}

?>

 <form action="http://localhost/PHDSystem/applicantadded.php" method="post">

     <b>Add a New Applicant</b>

 <p>id:
 <input type="text" name="id" size="30" value="" />
 </p>

 <p>FirstName:
 <input type="text" name="fname" size="30" value="" />
 </p>

 <p>LastName:
 <input type="text" name="lname" size="30" value="" />
 </p>

 <p>CV:
 <input type="text" name="cv" size="30" value="" />
 </p>

 <p>Passport:
 <input type="text" name="passport" size="30" value="" />
 </p>

 <p>
 <input type="submit" name="submit" value="Send" />
 </p>

 </form>
 </body>
 </div>
 </html>
