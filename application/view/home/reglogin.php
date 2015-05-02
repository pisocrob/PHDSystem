<div class="container">
<form action="<?php echo URL; ?>home/checkRegCredentials" method="POST">

<b>Registrar Login</b>
<p>
<label>User Name:
<input type="text" name="userName" size="30" value="" placeholder="Enter Username"required/>
</label>
<label>Password:
<input type="text" name="password" size="30" value="" placeholder="Enter Password"required/>
</label>
</p>
<p>
<label>
<input type="submit" name="submit_reg_login" value="Login" />
</label>
</p>
</form>
</div>