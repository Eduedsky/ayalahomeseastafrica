<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'ayalahomeseastafrica@gmail.com';

  if( file_exists($php_email_form = '../php/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }


  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->phone_number = $_POST['phone'];
//   $contact->date = $_POST['date'];
//   $contact->service = $_POST['service'];
//   $contact->number = $_POST['number'];
  $contact->subject = "New Reservation";

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'host' => 'mail.weevetsevents.com',
    'username' => 'admin@weevetsevents.com',
    'password' => 'k@k@sungur@1009',
    'port' => '26'
    
  );
 

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['phone'], 'Phone Number');
//   $contact->add_message( $_POST['number'], 'Number of guests');
//   $contact->add_message( $_POST['date'], 'Event Date');
//   $contact->add_message( $_POST['service'], 'Services to be offered');
  $contact->add_message( $_POST['message'], 'Message', 10);
  
  $contact->honeypot = $_POST['first_name'];
  echo $contact->send();
?>
