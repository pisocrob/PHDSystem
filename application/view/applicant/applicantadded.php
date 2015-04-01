<html>

<link rel="stylesheet" type="text/css" href="style.css">

    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Id</td>
            <td>Fname</td>
            <td>Lname</td>
            <td>CV Path</td>
            <td>Passport Path</td>
            <td>EDIT</td>
            <td>DELETE</td>
        </tr>
                </thead>
        <tbody>
        <?php foreach ($applicants as $applicant) { ?>
            <tr>
                <td><?php if (isset($applicant->applicantid)) echo htmlspecialchars($applicant->applicantid, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($applicant->fname)) echo htmlspecialchars($applicant->fname, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($applicant->lname)) echo htmlspecialchars($applicant->lname, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($applicant->cvpath)) echo htmlspecialchars($applicant->cvpath, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($applicant->passportpath)) echo htmlspecialchars($applicant->passportpath, ENT_QUOTES, 'UTF-8'); ?></td>
               <!-- not too sure what this does?
                     <td>
                    <?php if (isset($applicant->link)) { ?>
                        <a href="<?php echo htmlspecialchars($applicant->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($applicant->link, ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php } ?>
                </td>
                -->
                <!-- TODO: write controllers for this functionality-->
                <td><a href="<?php echo URL . 'addapplicant/editapplicant/' . htmlspecialchars($applicant->applicantid, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                <td><a href="<?php echo URL . 'addapplicant/deleteapplicant/' . htmlspecialchars($applicant->applicantid, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</html>
