<html>
<div class="container">
<link rel="stylesheet" type="text/css" href="style.css">

<form action="<?php echo URL; ?>submission/xxaddSubmission" method="POST">

<b>Add a New Submission</b>

<p>

<!--removed ID field as it should auto increment-->

<label>Title:
<input type="text" name="title" size="30" value="" placeholder="Enter Title" required/>
</label>


<label>Abstract:
<input type="text" name="abstaract" size="30" value="" placeholder="Enter Abstract Summary"required/>
</label>

<label>Proposal File Path:
<input type="text" name="fullProposalPath" size="30" value="" placeholder="Enter Proposal Location"/>
</label>
<p>
<label>Submission Date:
<input type="date" name="submissionDate" size="10" value="" placeholder="Enter Submission Date" required/>
</label>

<label>Allocation Date:
<input type="date" name="allocationDate" size="10" value="" placeholder="Enter Allocation date"/>
</label>

<label>Applicant ID:
<input type="text" name="applicantID" size="5" value="" placeholder="Enter Applicatn ID" required/>
</label>

<p>
<select name="dicipline1" >
   <option value="None">-- Select Discipline --</option>
   <option value="Computer Science">Computer Science</option>
   <option value="Mathematics">Mathematics</option>
   <option value="Electrical Engineering">Electrical Engineering</option>
   <option value="Media Studies">Media Studies</option>
</select>

<select name="dicipline2" >
   <option value="None">-- Select Discipline --</option>
   <option value="Computer Science">Computer Science</option>
   <option value="Mathematics">Mathematics</option>
   <option value="Electrical Engineering">Electrical Engineering</option>
   <option value="Media Studies">Media Studies</option>
</select>

<select name="dicipline3" >
   <option value="None">-- Select Discipline --</option>
   <option value="Computer Science">Computer Science</option>
   <option value="Mathematics">Mathematics</option>
   <option value="Electrical Engineering">Electrical Engineering</option>
   <option value="Media Studies">Media Studies</option>
</select>
</p>
<label>
<input type="submit" name="submit" value="Send" />
</label>
</p>
</form>
</div>
</html>
