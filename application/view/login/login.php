<html>
<head>
<title>Login test</title>
</head>
<body>
<!--TODO: sort form name and action -->
	<form name="loginform" action="login_exec.php" method="post">
	<table width="309" border="0" align="center" cellpadding="2" cellspacing="5">
		<tr>
			<td colspan="2">
						<!-- This code displays the message for	input validation-->
						<?php
							if(isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0) {
								echo '<ul class="err">';
								foreach($_SESSION['ERRMSG_ARR'] as $msg) {
									echo '<li>',$msg,'<li>';
									}
							echo '</ul>';
							unset($_SESSION['ERRMSG_ARR']);
							}
						?>
			</td>
		</tr>
		<tr>
			<td width="116"><div algin="right">Username</div></td>
			<td with="177"><input name="username" type="text" /></td>
		</tr>
		<tr>
			<td><div align="right">Password</div></td>
			<td><input name="password" type="text" /></td>
		</tr>
		<tr>
			<td><div align="right"></div></td>
			<td><input name="" type="submit" value="login" /></td>
		</tr>
	</table>
	</form>
</body>
</html>
