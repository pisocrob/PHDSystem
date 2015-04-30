<html>
<div class="container">
<link rel="stylesheet" type="text/css" href="style.css">

<form action="<?php echo URL; ?>applicant/xxaddapplicant" method="POST">

<b>Add a New Applicant</b>
<p>

<label>FirstName:
<input type="text" name="fname" size="30" value="" placeholder="Enter First Name" required/>
</label>


<label>LastName:
<input type="text" name="lname" size="30" value="" placeholder="Enter Last Name" required />
</label>


<label>Email:
<input type="email" name="email" size="30" value="" placeholder="Enter Email" required/>
</label>
</p>
<p>

<label>Qualifications:
<input type="text" name="qualifications" size="30" value="" placeholder="Enter Qualifications" required/>
</label>


<label>CV File Location:
<input type="text" name="cv" size="30" value=""  placeholder="Enter CV Location"/>
</label>

<label>Passport File Location:
<input type="text" name="passport" size="30" value="" placeholder="Enter Passport Location"/>
</label>

<label>
<input type="submit" name="submit" value="Send" />
</label>

</form>