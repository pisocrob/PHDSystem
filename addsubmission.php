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


<form action="http://localhost/PHDSystem/submissionadded.php" method="post">

<div id="bodydiv">
<b>Add a New Submission</b>

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

<p>staffno1:
<input type="text" name="staffno2" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>
</div>
</form>


<div id="submissionformdiv">
<?php

require_once('C:\xampp\htdocs\PHDSystem\mysqli_connect.php');

$query = "SELECT submissionid, title, abstaract, fullproposal, submissiondate,
          id, staffno1, staffno2 FROM Submission";

$response = @mysqli_query($dbc, $query);

if($response){

echo '</br></br></br><table align="left" cellspacing="5" cellpadding="8"><tr>
<td align="left"><b>Submission ID</b></td>
<td align="left"><b>Title</b></td>
<td align="left"><b>Abstract</b></td>
<td align="left"><b>Full Proposal</b></td>
<td align="left"><b>Submission Date</b></td>
<td align="left"><b>ID</b></td>
<td align="left"><b>staffno1</b></td>
<td align="left"><b>staffno2</b></td></tr>';


while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .
$row['submissionid'] . ' - </td><td align="left">' .
$row['title'] . ' - </td><td align="left">' .
$row['abstaract'] . ' - </td><td align="left">' .
$row['fullproposal'] . ' - </td><td align="left">' .
$row['submissiondate'] . ' - </td><td align="left">' .
$row['id'] . ' - </td><td align="left">' .
$row['staffno1'] . ' - </td><td align="left">' .
$row['staffno2'] . ' - </td><td align="left">';

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
