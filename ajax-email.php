<?php
/*
 * Madjid L O U N A S
 *
 * benharoun,djebahia,bouira---Algerie
 * +213 779922012
 * majiddevweb@gmail.com
 * Fb: majidov beats
 */
/* SETTINGS */
$recipient = "majiddevweb@gmail.com";
$subject = "msg de ....";

if($_POST){

  /* DATA FROM HTML FORM */
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
//$phone = $_POST['phone'];


  /* SUBJECT */
  $emailSubject = $subject . " de " . $name;

  /* HEADERS */
  $headers = "de: $name <$email>\r\n" .
             "reponde: $name <$email>\r\n" . 
             "sujet: $emailSubject\r\n" .
             "contenu: text/plain; charset=UTF-8\r\n" .
             "MIME-Version: 1.0\r\n" . 
             "X-Mailer: PHP/" . phpversion() . "\r\n";
 
  /* PREVENT EMAIL INJECTION */
  if ( preg_match("/[\r\n]/", $name) || preg_match("/[\r\n]/", $email) ) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
    die("500 Internal Server Error");
  }

  /* MESSAGE TEMPLATE */
  $mailBody = "Name: $name \n\r" .
              "Email:  $email \n\r" .
              "Subject:  $subject \n\r" .
//            "Phone:  $phone \n\r" .
              "Message: $message";

  /* SEND EMAIL */
  mail($recipient, $emailSubject, $mailBody, $headers);
}
?>