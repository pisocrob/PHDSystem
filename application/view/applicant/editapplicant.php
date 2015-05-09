<div class="container">
  <div>
    <h3>Edit a Applicant</h3>
		<form action="<?php echo URL; ?>applicant/updateApplicant" method="POST">

		<b>Add a New Applicant</b>
		<p>

		<label>FirstName:
		<input type="text" name="fname" size="30" value="<?php echo htmlspecialchars($applicant->fname, ENT_QUOTES, 'UTF-8'); ?>" required/>
		</label>


		<label>LastName:
		<input type="text" name="lname" size="30" value="<?php echo htmlspecialchars($applicant->lname, ENT_QUOTES, 'UTF-8'); ?>" required />
		</label>


		<label>Email:
		<input type="email" name="email" size="30" value="<?php echo htmlspecialchars($applicant->email, ENT_QUOTES, 'UTF-8'); ?>" required/>
		</label>
		</p>
		<p>

		<label>Qualifications:
		<input type="text" name="qualifications" size="30" value="<?php echo htmlspecialchars($applicant->qualifications, ENT_QUOTES, 'UTF-8'); ?>" required/>
		</label>


		<label>CV File Location:
		<input type="text" name="cvpath" size="30" value="<?php echo htmlspecialchars($applicant->cvpath, ENT_QUOTES, 'UTF-8'); ?>"/>
		</label>

		<label>Passport File Location:
		<input type="text" name="passportPath" size="30" value="<?php echo htmlspecialchars($applicant->passportPath, ENT_QUOTES, 'UTF-8'); ?>"/>
		</label>

		<input type="hidden" name="applicantID" value="<?php echo htmlspecialchars($applicant->applicantID, ENT_QUOTES, 'UTF-8'); ?>"/>

		<label>
		<input type="submit" name="submit_update_applicant" value="Send" />
		</label>

		</form>
   </div>
</div>
