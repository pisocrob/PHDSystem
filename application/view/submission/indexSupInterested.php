<div class="container">
<link rel="stylesheet" type="text/css" href="style.css">

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
                <td><?php if (isset($submission->abstract)) echo htmlspecialchars($submission->abstract, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->fullProposalPath)) echo htmlspecialchars($submission->fullProposalPath, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->submissionDate)) echo htmlspecialchars($submission->submissionDate, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->allocationDate)) echo htmlspecialchars($submission->allocationDate, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->applicantID)) echo htmlspecialchars($submission->applicantID, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($submission->active)) echo htmlspecialchars($submission->active, ENT_QUOTES, 'UTF-8'); ?></td>

                </td>
                <td><a href="<?php echo URL . 'submission/markforinterest/' . htmlspecialchars($submission->submissionID, ENT_QUOTES, 'UTF-8'); ?>">Interested</a></td>
                <td><a href="<?php echo URL . 'submission/removeInterest/' . htmlspecialchars($submission->submissionID, ENT_QUOTES, 'UTF-8'); ?>">Remove Interest</a></td>
                <td>
               <?php if (isset($submission->link)) { ?>
                   <a href="<?php echo htmlspecialchars($submission->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($submission->link, ENT_QUOTES, 'UTF-8'); ?></a>
               <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>
</html>
