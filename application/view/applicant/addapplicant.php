<html>

<link rel="stylesheet" type="text/css" href="style.css">

<form action="<?php echo URL; ?>addapplicant/xxaddapplicant" method="POST">

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
</div>
</body>
</html>
