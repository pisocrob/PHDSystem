<div class="container">
<form action="<?php echo URL; ?>home/checkSupCredentials" method="POST">

<b>Login</b>
<p>
<p>
<a href="<?php echo URL; ?>home/reglogin">(Registrar)</a>
</p>
<label>User Name:
<input type="text" name="userName" size="30" value="" placeholder="Enter Username"required/>
</label>
<label>Password:
<input type="text" name="password" size="30" value="" placeholder="Enter Password"required/>
</label>
</p>
<p>
<label>
<input type="submit" name="submit_login" value="Login" />
</label>
</p>
</form>
</div>