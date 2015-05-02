<html>
<div class="container">
<link rel="stylesheet" type="text/css" href="style.css">

<form action="<?php echo URL; ?>supervisor/xxaddSupervisor" method="POST">

<b>Add a New Supervisor</b>
<p>
<label>User Name:
<input type="text" name="userName" size="30" value="" placeholder="Enter Username"required/>
</label>

<label>Staff Number:
<input type="number" name="staffNo" size="30" value="" placeholder="Enter Staff Number"required/>
</label>

<label>Password:
<input type="text" name="password" size="30" value="" placeholder="Enter Password"required/>
</label>
</p>
<p>
<label>Email:
<input type="email" name="email" size="30" value="" placeholder="Enter Email"required/>
</label>

<label>First Name:
<input type="text" name="fName" size="30" value="" placeholder="Enter First Name"required/>
</label>

<label>Last Name:
<input type="text" name="lName" size="30" value="" placeholder="Enter Last Name"required/>
</label>
<p>
<select name="sDicipline1" required>
   <option value="None">-- Select Discipline --</option>
   <option value="Computer Science">Computer Science</option>
   <option value="Mathematics">Mathematics</option>
   <option value="Electrical Engineering">Electrical Engineering</option>
   <option value="Media Studies">Media Studies</option>
</select>

</label>

<select name="sDicipline2">
   <option value="None">-- Select Discipline --</option>
   <option value="Computer Science">Computer Science</option>
   <option value="Mathematics">Mathematics</option>
   <option value="Electrical Engineering">Electrical Engineering</option>
   <option value="Media Studies">Media Studies</option>
</select>

<select name="sDicipline3">
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