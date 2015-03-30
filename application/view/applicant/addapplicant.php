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
<form action="http://localhost/PHDSystem/application/view/applicant/applicantadded.php" method="post">

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

//require_once('C:\xampp\htdocs\PHDSystem\application\config\config.php');
require_once('C:\xampp\htdocs\PHDSystem\application\controller\addapplicant.php');

getAllApplicants();

?>
</div>
</body>
</html>
