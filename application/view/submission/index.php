<html>
<div class="container">
<link rel="stylesheet" type="text/css" href="style.css">


<form action="<?php echo URL; ?>submission/xxaddSubmission" method="POST">

<b>Add a New Submission</b>

<p>
<label>Submission ID:
<input type="text" name="submissionID" size="5" value="" placeholder="Enter Submission ID No." required/>
</label>

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
<input type="text" name="applicantId" size="5" value="" placeholder="Enter Applicatn ID" required/>
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


<div class="box">
<form action="<?php echo URL; ?>submission/getAllSubmissions" method="POST">
  <input type="text" name="searchSubmission" size="30" value="" />
<input type="submit" name="submit" value="Send" />
</form>
</div>


<div class="box">
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Submission ID</td>
            <td>Title</td>
            <td>Discipline 1</td>
            <td>Discipline 2</td>
            <td>Discipline 3</td>
            <td>Abstract</td>
            <td>Full Propoposal Path</td>
            <td>Submission Date</td>
            <td>Allocation Date</td>
            <td>Applicant ID</td>
            <td>Active</td>
            <td>EDIT</td>
            <td>DELETE</td>
        </tr>
                </thead>
        <tbody>
        <?php foreach ($submissions as $submission) { ?>
            <tr>
                <td><?php if (isset($submission->submissionID)) echo htmlspecialchars($submission->submissionID, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->title)) echo htmlspecialchars($submission->title, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->dicipline1)) echo htmlspecialchars($submission->dicipline1, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->dicipline2)) echo htmlspecialchars($submission->dicipline2, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->dicipline3)) echo htmlspecialchars($submission->dicipline3, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->abstaract)) echo htmlspecialchars($submission->abstaract, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->fullProposalPath)) echo htmlspecialchars($submission->fullProposalPath, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->submissionDate)) echo htmlspecialchars($submission->submissionDate, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->allocationDate)) echo htmlspecialchars($submission->allocationDate, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->applicantId)) echo htmlspecialchars($submission->applicantId, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->active)) echo htmlspecialchars($submission->active, ENT_QUOTES, 'UTF-8'); ?></td>
               <!-- not too sure what this does?
                     <td>
                    <?php if (isset($submission->link)) { ?>
                        <a href="<?php echo htmlspecialchars($submission->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($submission->link, ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php } ?>
                </td>
                -->
                <!-- TODO: write controllers for this functionality-->
                <td><a href="<?php echo URL . 'submission/editsubmission/' . htmlspecialchars($submission->submissionID, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                <td><a href="<?php echo URL . 'submission/deletesubmission/' . htmlspecialchars($submission->submissionID, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>
</html>
