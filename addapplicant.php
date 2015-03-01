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
<form action="http://localhost/PHDSystem/applicantadded.php" method="post">

<b>Add a New Applicant</b>

<p>ID:
<input type="text" name="id" size="30" value="" />
</p>

<p>FirstName:
<input type="text" name="fname" size="30" value="" />
</p>

<p>LastName:
<input type="text" name="lname" size="30" value="" />
</p>

<p>CV File Location:
<input type="text" name="cv" size="30" value="" />
</p>

<p>Passport File Location:
<input type="text" name="passport" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</div>
</form>


<div id="lowerbody">
<?php

require_once('C:\xampp\htdocs\PHDsystem\mysqli_connect.php');

$query = "SELECT id, fname, lname, cv, passport FROM Applicant";

$response = @mysqli_query($dbc, $query);

if($response){

echo '</br></br></br><table align="left" cellspacing="5" cellpadding="8"><tr>
<td align="left"><b>id</b></td>
<td align="left"><b>fname</b></td>
<td align="left"><b>lname</b></td>
<td align="left"><b>cv</b></td>
<td align="left"><b>passport</b></td></tr>';


while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .
$row['id'] . ' - </td><td align="left">' .
$row['fname'] . ' - </td><td align="left">' .
$row['lname'] . ' - </td><td align="left">' .
$row['cv'] . ' - </td><td align="left">' .
$row['passport'] . ' - </td><td align="left">';

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
