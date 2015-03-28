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

<form action="http://localhost/PHDSystem/supervisoradded.php" method="post">

<div id="bodydiv">
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
</div>
</form>


<div id="lowerbody">
<?php

require_once('C:\xampp\htdocs\PHDSystem\mysqli_connect.php');

$query = "SELECT staffno, username, password, fname, lname FROM Supervisor";

$response = @mysqli_query($dbc, $query);

if($response){

echo '</br></br></br><table align="left" cellspacing="5" cellpadding="8"><tr>
<td align="left"><b>staffno</b></td>
<td align="left"><b>username</b></td>
<td align="left"><b>password</b></td>
<td align="left"><b>fname</b></td>
<td align="left"><b>lname</b></td></tr>';


while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .
$row['staffno'] . ' - </td><td align="left">' .
$row['username'] . ' - </td><td align="left">' .
$row['password'] . ' - </td><td align="left">' .
$row['fname'] . ' - </td><td align="left">' .
$row['lname'] . ' - </td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

mysqli_close($dbc);

?>
</div>
</body>
</html>
