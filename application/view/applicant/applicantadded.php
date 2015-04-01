<html>

<link rel="stylesheet" type="text/css" href="style.css">
<head>
<title>Add an Applicant</title>
</head>
<body>
<?php

//require_once('C:\xampp\htdocs\PHDSystem\mysqli_connect.php');

if(isset($_POST['submit'])){

    $data_missing = array()
}

if(empty($_POST['id'])){

    // Adds name to array
    $data_missing[] = 'id';
}
    
if(empty($_POST['fname'])){

    // Adds name to array
    $data_missing[] = 'fname';
}
   

if(empty($_POST['lname'])){

    // Adds name to array
    $data_missing[] = 'lname';
}



  if(empty($_POST['cv'])){

    // Adds name to array
    $data_missing[] = 'cv';
}


if(empty($_POST['passport'])){

    // Adds name to array
    $data_missing[] = 'passport';
}

if(empty($data_missing)){       

    echo 'Applicant Added';

} else {

    echo 'You need to enter the following data<br />';

    foreach($data_missing as $missing){

        echo "$missing<br />";

    }


?>

 <form action="<?php echo URL; ?>addapplicant/addapplicant" method="POST">

     <b>Add a New Applicant</b>

 <p>id:
 <input type="text" name="id" size="30" value="" />
 </p>

 <p>FirstName:
 <input type="text" name="fname" size="30" value="" />
 </p>

 <p>LastName:
 <input type="text" name="lname" size="30" value="" />
 </p>

 <p>CV:
 <input type="text" name="cv" size="30" value="" />
 </p>

 <p>Passport:
 <input type="text" name="passport" size="30" value="" />
 </p>

 <p>
 <input type="submit" name="submit" value="Send" />
 </p>

 </form>
 </body>
 </div>
 </html>
