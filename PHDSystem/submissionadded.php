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

    if(empty($_POST['submissionid'])){

        // Adds name to array
        $data_missing[] = 'submissionid';

    } else {

        // Trim white space from the name and store the name
       $submissionid = trim($_POST['submissionid']);

    }

    if(empty($_POST['title'])){

        // Adds name to array
        $data_missing[] = 'title';

    } else{

        // Trim white space from the name and store the name
        $title = trim($_POST['title']);

    }

    if(empty($_POST['abstaract'])){

        // Adds name to array
        $data_missing[] = 'abstaract';

    } else {

        // Trim white space from the name and store the name
        $abstaract = trim($_POST['abstaract']);

      }

      if(empty($_POST['fullproposal'])){

        // Adds name to array
        $data_missing[] = 'fullproposal';

    } else {

        // Trim white space from the name and store the name
        $fullproposal = trim($_POST['fullproposal']);

    }

    if(empty($_POST['submissiondate'])){

        // Adds name to array
        $data_missing[] = 'submissiondate';

    } else {

        // Trim white space from the name and store the name
        $submissiondate = trim($_POST['submissiondate']);

      }

    if(empty($_POST['id'])){

        // Adds name to array
        $data_missing[] = 'id';

    } else {

        // Trim white space from the name and store the name
        $id = trim($_POST['id']);

      }

    if(empty($_POST['staffno1'])){

        // Adds name to array
        $data_missing[] = 'staffno1';

    } else {

        // Trim white space from the name and store the name
        $staffno1 = trim($_POST['staffno1']);

      }

    if(empty($_POST['staffno2'])){

        // Adds name to array
        $data_missing[] = 'staffno2';

    } else {

        // Trim white space from the name and store the name
        $staffno2 = trim($_POST['staffno2']);

      }



    if(empty($data_missing)){



        $query = "INSERT INTO Submission (submissionid, title, abstaract,
                  fullproposal, submissiondate, id, staffno1, staffno2)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);



        mysqli_stmt_bind_param($stmt, "ssssssss", $submissionid, $title,
                                $abstaract, $fullproposal, $submissiondate, $id,
                                $staffno1, $staffno2);

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



<form action="http://localhost/PHDSystem/submissionadded.php" method="post">

    <b>Add a New Supervisor</b>

<p>Submission ID:
<input type="text" name="submissionid" size="30" value="" />
</p>

<p>Title:
<input type="text" name="title" size="30" value="" />
</p>

<p>Abstract:
<input type="text" name="abstaract" size="30" value="" />
</p>

<p>Full Proposal:
<input type="text" name="fullproposal" size="30" value="" />
</p>

<p>Submission Date:
<input type="text" name="submissiondate" size="30" value="" />
</p>

<p>ID:
<input type="text" name="id" size="30" value="" />
</p>

<p>staffno1:
<input type="text" name="staffno1" size="30" value="" />
</p>

<p>staffno2:
<input type="text" name="staffno2" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</div>
</div>
</html>
