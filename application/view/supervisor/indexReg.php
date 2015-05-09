<html>
<div class="container">
<link rel="stylesheet" type="text/css" href="style.css">

<div class="box">
<form action="<?php echo URL; ?>supervisor/getAllSupervisors" method="POST">
  <input type="text" name="searchSupervisor" size="30" value="" />
<input type="submit" name="submit" value="Send" />
</form>
</div>


<div class="box">
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Supervisor ID</td>
            <td>userName</td>
            <td>staffNo</td>
            <td>password</td>
            <td>email</td>
            <td>fName</td>
            <td>lName</td>
            <td>sDicipline1</td>
            <td>sDicipline2</td>
            <td>sDicipline3</td>
            <td>EDIT</td>
            <td>DELETE</td>
        </tr>
            </thead>
        <tbody>
        <?php foreach ($supervisors as $supervisor) { ?>
            <tr>
                <td><?php if (isset($supervisor->supervisorID)) echo htmlspecialchars($supervisor->supervisorID, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($supervisor->userName)) echo htmlspecialchars($supervisor->userName, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($supervisor->staffNo)) echo htmlspecialchars($supervisor->staffNo, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($supervisor->password)) echo htmlspecialchars($supervisor->password, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($supervisor->email)) echo htmlspecialchars($supervisor->email, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($supervisor->fName)) echo htmlspecialchars($supervisor->fName, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($supervisor->lName)) echo htmlspecialchars($supervisor->lName, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($supervisor->sDicipline1)) echo htmlspecialchars($supervisor->sDicipline1, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($supervisor->sDicipline2)) echo htmlspecialchars($supervisor->sDicipline2, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($supervisor->sDicipline3)) echo htmlspecialchars($supervisor->sDicipline3, ENT_QUOTES, 'UTF-8'); ?></td>


                <td><a href="<?php echo URL . 'Supervisor/editSupervisor/' . htmlspecialchars($supervisor->supervisorID, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                <td><a href="<?php echo URL . 'Supervisor/deleteSupervisor/' . htmlspecialchars($supervisor->supervisorID, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                <td>
               <?php if (isset($supervisor->link)) { ?>
                   <a href="<?php echo htmlspecialchars($supervisor->link, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($supervisor->link, ENT_QUOTES, 'UTF-8'); ?></a>
               <?php } ?>
           </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>
</html>
