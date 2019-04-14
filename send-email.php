<?php  echo($_SESSION['Email']);
      error_reporting(0); 

      $to = 'thomas.soliday@gmail.com';
      $subject= 'Contact questions';
      $text = $_POST['essay'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $tel = $_POST['tel'];
      $from = $_POST['email'];

      $message= $fname . $lname . $tel . $text;
      mail($to, $subject, $message, $from); 

    ?>