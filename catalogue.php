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
<title>Search</title>
</head>

<h2>Search</h2>

<form method="post">
  <input type="text" name="search" size="30" value="" />
<input type="submit" name="submit" value="Send" />
</form>

<?php

require_once('C:\xampp\htdocs\PHDSystem\mysqli_connect.php');


if(isset($_POST['submit'])){

    $search = trim($_POST['search']);

  }

if(empty($_POST['search'])){

    $search = null;
  }



$query = "SELECT * FROM Submission WHERE Title LIKE '%$search%'";

$response = @mysqli_query($dbc, $query);

if($response){



echo '</br></br></br><table align="left" cellspacing="5" cellpadding="8"><tr>
<td align="left"><b>submissionid</b></td>
<td align="left"><b>title</b></td>
<td align="left"><b>abstract</b></td>
<td align="left"><b>fullproposal</b></td>
<td align="left"><b>submissiondate</b></td>
<td align="left"><b>id</b></td>
<td align="left"><b>staffno1</b></td>
<td align="left"><b>staffno2</b></td></tr>';


while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .
$row['submissionID'] . ' - </td><td align="left">' .
$row['title'] . ' - </td><td align="left">' .
$row['abstaract'] . ' - </td><td align="left">' .
$row['fullProposal'] . ' - </td><td align="left">' .
$row['submissionDate'] . ' - </td><td align="left">' .
$row['id'] . ' - </td><td align="left">' .
$row['staffNo1'] . ' - </td><td align="left">' .
$row['staffNo2'] . ' - </td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

mysqli_close($dbc);

?>



</html>
