<div class="container">
  <div>
    <h3>Edit a Supervisor</h3>
    	<form action="<?php echo URL; ?>supervisor/updateSupervisor" method="POST">
			<p>
			<label>User Name:
			<input type="text" name="userName" size="30" value="<?php echo htmlspecialchars($supervisor->userName, ENT_QUOTES, 'UTF-8'); ?>" required/>
			</label>

			<label>Staff Number:
			<input type="number" name="staffNo" size="30" value="<?php echo htmlspecialchars($supervisor->staffNo, ENT_QUOTES, 'UTF-8'); ?>" required/>
			</label>

			<label>Password:
			<input type="text" name="password" size="30" value="<?php echo htmlspecialchars($supervisor->password, ENT_QUOTES, 'UTF-8'); ?>" required/>
			</label>
			</p>
			<p>
			<label>Email:
			<input type="email" name="email" size="30" value="<?php echo htmlspecialchars($supervisor->email, ENT_QUOTES, 'UTF-8'); ?>" required/>
			</label>

			<label>First Name:
			<input type="text" name="fName" size="30" value="<?php echo htmlspecialchars($supervisor->fname, ENT_QUOTES, 'UTF-8'); ?>" required/>
			</label>

			<label>Last Name:
			<input type="text" name="lName" size="30" value="<?php echo htmlspecialchars($supervisor->lname, ENT_QUOTES, 'UTF-8'); ?>" required/>
			</label>
			<input type="hidden" name="supervisorID" size="30" value="<?php echo htmlspecialchars($supervisor->supervisorID, ENT_QUOTES, 'UTF-8'); ?>" />
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
			<input type="submit" name="submit_update_supervisor" value="Send" />
			</label>
			</p>
		</form>
  </div>
</div>