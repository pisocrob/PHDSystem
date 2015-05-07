<div class="container">
  <div>
    <h3>Edit a Submission</h3>
      <form action="<?php echo URL; ?>submission/updateSubmission" method="POST">
        <label>Title:</label>
        <input autofocus type="text" name="title" value="<?php echo htmlspecialchars($submission->title, ENT_QUOTES, 'UTF-8'); ?>" required />
        <label>Abstract:</label>
        <input type="text" name="abstract" value="<?php echo htmlspecialchars($submission->abstract, ENT_QUOTES, 'UTF-8'); ?>" required />
        <label>Proposal File Path</label>
        <input type="text" name="fullProposalPath" value="<?php echo htmlspecialchars($submission->fullProposalPath, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="text" name="submissionDate" value="<?php echo htmlspecialchars($submission->submissionDate, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="text" name="allocationDate" value="<?php echo htmlspecialchars($submission->allocationDate, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="text" name="submissionID" value="<?php echo htmlspecialchars($submission->submissionID, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="hidden" name="applicantID" value="<?php echo htmlspecialchars($submission->applicantID, ENT_QUOTES, 'UTF-8'); ?>" />

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

        <input type="submit" name="submit_update_submission" value="Update" />
      </form>
  </div>
</div>