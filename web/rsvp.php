<?php
if(!isset($_POST['submit']))
{
    //This page should not be accessed directly. Need to submit the form.
    echo "error; you need to submit the form!";
}
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$attending = $_POST['attending'];
$message = $_POST['message'];

//Validate first
if(empty($first_name)||empty($last_name)||empty($attending))
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'jvelasco0226@gmail.com';//<== update the email address
$email_subject = "New Form submission";
$email_body = "You have received a new message from the user $first_name $last_name.\n".
    "Attending:\n $attending".
    "Here is the message:\n $message".

$to = "jvelasco0226@gmail.com";//<== update the email address
$headers = "From: $first_name $last_name \r\n";
// $headers .= "Reply-To: $visitor_email \r\n";

//Send the email!
mail("jvelasco0226@gmail.com",$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank-you');

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?>
