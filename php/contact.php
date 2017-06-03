<?php
if($_REQUEST['first_name'] == '' || $_REQUEST['contact_email'] == '' ||  $_REQUEST['message'] == ''):
  return "error";
endif;
if (filter_var($_REQUEST['contact_email'], FILTER_VALIDATE_EMAIL)):
  $subject = 'New Email from GnarLock Web Contact Form'; // Subject of your email

  // Receiver email address
  $to = 'info@gnarloc.com';  //send-to gnarloc info email address


  // prepare header
  $header = 'From: '. $_REQUEST['first_name'] . " " .$_REQUEST['last_name'] . ' <'. $_REQUEST['contact_email'] .'>'. "\r\n";
  $header .= 'Reply-To:  '. $_REQUEST['first_name'] . " " .$_REQUEST['last_name'] . ' <'. $_REQUEST['contact_email'] .'>'. "\r\n";
  $header .= 'X-Mailer: PHP/' . phpversion();


  $message .= 'Name: ' . $_REQUEST['first_name'] . " " .$_REQUEST['last_name'] . "\n";
  $message .= 'Email: ' . $_REQUEST['contact_email'] . "\n";
  $message .= 'Subject: ' . $_REQUEST['contact_subject'] . "\n";
  $message .= 'Message: '. $_REQUEST['message'];

  // Send contact information
  $mail = mail( $to, $subject , $message, $header );

  echo 'sent';
  else:
    return "error";
  endif;

?>
