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
<title>Add a Book</title>
</head>
<body>

<?php

require_once('C:\xampp\htdocs\PHDSystem\mysqli_connect.php');


if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['staffno'])){

        // Adds name to array
        $data_missing[] = 'staffno';

    } else {

        // Trim white space from the name and store the name
       $staffno = trim($_POST['staffno']);

    }

    if(empty($_POST['username'])){

        // Adds name to array
        $data_missing[] = 'username';

    } else{

        // Trim white space from the name and store the name
        $username = trim($_POST['username']);

    }

    if(empty($_POST['password'])){

        // Adds name to array
        $data_missing[] = 'password';

    } else {

        // Trim white space from the name and store the name
        $password = trim($_POST['password']);

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



    if(empty($data_missing)){



        $query = "INSERT INTO Supervisor (staffno, username, password, fname, lname)
				  VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);



        mysqli_stmt_bind_param($stmt, "sssss", $staffno, $username,
                              $password, $fname, $lname);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Book Added';

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

<form action="http://localhost/PHDSystem/supervisoradded.php" method="post">

    <b>Add a New Supervisor</b>

<p>Staff Number:
<input type="text" name="staffno" size="30" value="" />
</p>

<p>Username:
<input type="text" name="username" size="30" value="" />
</p>

<p>Password:
<input type="text" name="password" size="30" value="" />
</p>

<p>First Name:
<input type="text" name="fname" size="30" value="" />
</p>

<p>Last Name:
<input type="text" name="lname" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</div>
</html>
