<?php
set_include_path('../include/');
$page = 'contact'; 
$level = 1;
include 'header.php';

error_reporting (E_ALL ^ E_NOTICE);
/* Email address where the messages should be delivered */
$to = 'admin@projectimuse.org';


/* From email address, in case your server prohibits sending emails from addresses other than those of your
own domain (e.g. email@yourdomain.com). If this is used then all email messages from your contact form will appear
from this address instead of actual sender. */
$from = '';

/* This will be appended to the subject of contact form message */
//$subject_prefix = 'from IMUSE Website';

/* Security question and answer array */
$question = 'What does the U in IMUSE stands for?';
$answer = 'understanding';

/* Empty/Invalid fields will be highlighted in this color */
$field_error_color = '#cf0000';

/* Thank you message to be displayed after the form is submitted. Can include HTML tags. Write your message
between <!-- Start message --> and <!-- End message --> */
$thank_you_message = <<<EOD
<div class="wrapper col4">
  <div id="container">
     <h2>Contact Us</h2><br><br>
	 <img class="imgr" src = "../images/fans.JPG" width=400px height=300px />
<!-- Start message -->
<p>Thanks for your interest in IMUSE. <br />
We will get back to you as soon as we can.</p>
<br><br>
<!-- End message -->
<div class="clear"></div>
</div>
</div>
EOD;

$fail_message = <<<EOD
<div class="wrapper col4">
  <div id="container">
     <h2>Contact Us</h2><br><br>
	 <img class="imgr" src = "../images/fans.JPG" width=400px height=300px />
<!-- Start message -->
<p>Email failed...Please try again or email us <a href="mailto:admin@projectimuse.org">directly</a><br><br>
We will get back to you as soon as we can.</p><br><br>
<!-- End message -->
<div class="clear"></div>
</div>
</div>
EOD;


/* URL to be redirected to after the form is submitted. If this is specified, then the above message will
not be shown and user will be redirected to this page after the form is submitted */
/* Example: $thank_you_url = 'http://www.yourwebsite.com/thank_you.html'; */

$thank_you_url = '';

/*******************************************************************************
 *  Do not change anything below, unless of course you know very well
 *  what you are doing :)
*******************************************************************************/

$sendername = array('Name','name',NULL,NULL);
$email = array('Email','email',NULL,NULL,NULL);
$subject = array('Subject','subject',NULL,NULL);
$message = array('Message','message',NULL,NULL);
$security = array('Security question','security',NULL,NULL,NULL);

$error_message = '';

echo '<div id="contactform">';

if (!isset($_POST['submit'])) {
    $skipform = FALSE;
} else { //form submitted
    $skipform = TRUE;
  $error = 0;

  if(!empty($_POST['check'])) die("Invalid form access");

  if(!empty($_POST['name'])) {
    $sendername[2] = clean_var($_POST['name']);
    if (function_exists('htmlspecialchars')) $sendername[2] = htmlspecialchars($sendername[2], ENT_QUOTES);
  } else {
    $error = 1;
    $sendername[3] = 'color:'.$field_error_color.';';
  }

  if(!empty($_POST['email'])) {
    $email[2] = clean_var($_POST['email']);
    if (!validEmail($email[2])) {
      $error = 1;
      $email[3] = 'color:'.$field_error_color.';';
      $email[4] = '<strong><span style="color:'.$field_error_color.';">Invalid email</span></strong>';
    }
  } else {
    $error = 1;
    $email[3] = 'color:'.$field_error_color.';';
  }

  if(!empty($_POST['subject'])) {
    $subject[2] = clean_var($_POST['subject']);
    if (function_exists('htmlspecialchars')) $subject[2] = htmlspecialchars($subject[2], ENT_QUOTES);
  } else {
    $error = 1;
    $subject[3] = 'color:'.$field_error_color.';';
  }

  if(!empty($_POST['message'])) {
    $message[2] = clean_var($_POST['message']);
    if (function_exists('htmlspecialchars')) $message[2] = htmlspecialchars($message[2], ENT_QUOTES);
  } else {
    $error = 1;
    $message[3] = 'color:'.$field_error_color.';';
  }

  if(empty($_POST['security'])) {
    $error = 1;
    $security[3] = 'color:'.$field_error_color.';';
  } else {

    if('understanding' != strtolower(clean_var($_POST['security']))) {
      $error = 1;
      $security[3] = 'color:'.$field_error_color.';';
      $security[4] = '<strong><span style="color:'.$field_error_color.';">'.$_POST['security'].' is the wrong answer...</span></strong>';
    }
  }

  if ($error == 1) {
    $error_message = '<span style="font-weight:bold; color: #cf0000;">All fields are required.</span><br /><br />';
    $skipform = FALSE;
  } else {
    if (function_exists('htmlspecialchars_decode')) $sendername[2] = htmlspecialchars_decode($sendername[2], ENT_QUOTES);
    if (function_exists('htmlspecialchars_decode')) $subject[2] = htmlspecialchars_decode($subject[2], ENT_QUOTES);
    if (function_exists('htmlspecialchars_decode')) $message[2] = htmlspecialchars_decode($message[2], ENT_QUOTES);

    $delegate = $_POST['delegate'];
    $associate = $_POST['associate'];
    $message = "$sendername[2]\r\n$email[2]\r\n\r\nInterested delegate? $delegate\r\nInterested associate? $associate\r\n\r\nMessage:\r\n$message[2]\r\n";

    if (!$from) $from_value = $email[2];
    else $from_value = $from;

    $headers = "From: $from_value" . "\r\n" . "Reply-To: $email[2]";

    $success = mail($to,$subject[2], $message, $headers);
    //mail($to2,$subject[2], $message, $headers);
    //$success = $success || mail($to3,$subject[2], $message, $headers);

    if (!$thank_you_url) {

      //include $header_file;
        if($success){
            echo "Email Successfully Sent.";
            echo $thank_you_message;
        } else {
            echo $fail_message;
        }
      echo "\n";
      //include $footer_file;
    }
    else {
      //header("Location: $thank_you_url");
    }
    $skipform = TRUE;
  }
  //$skipform = TRUE;
} //else submitted

//global $sendername, $email, $subject, $message, $security, $question, $answer, $form_width, $form_background, $form_border, $form_border_style;


$formcontents = <<<EOD
<div class="wrapper col4">
  <div id="container">
  
   <h2>Contact Us</h2>
 
  <p>Feel free to contact us via this form or email us <a href="mailto: admin@projectimuse.org">directly.</a></p><br>
  $error_message

	<div id="respond">
        <form method="post" class="contactForm">
          <p>
		  <input  type="text" name="{$sendername[1]}" value="{$sendername[2]}" size="22"/>	
			<label for="{$sendername[1]}" class="contactlabel">{$sendername[0]}</label> 
          </p>
          <p>
		   <input type="text" name="{$email[1]}" value="{$email[2]}" size="22"/>
			<label for="{$email[1]}" class="contactlabel">{$email[0]}</label>&nbsp;&nbsp;&nbsp;&nbsp;{$email[4]}       
          </p>
          <p>
		   <textarea  name="{$message[1]}" cols="20" rows="13" placeholder="Please write your message here...">{$message[2]}</textarea>
          </p>
		  <p>
		  <p> <input  type="text" name="{$security[1]}" value="" size="22"/>
			<label for="{$security[1]}" class="contactlabel">{$question}?</label>&nbsp;&nbsp;&nbsp;&nbsp;{$security[4]}
			
		  </p>
          <p>
		  <input type="hidden" name="question" value="{$question}">
			<input type="hidden" name="{$subject[1]}" value="Website contact form Submission" /></p>
			<input type="hidden" name="check" value="">
            <input name="submit" type="submit" id="submit" value="Submit Form" style="font-weight:bold;"
			onmouseover="this.style.backgroundColor = '#c9c5e0'; this.style.color = '#982216';" onmouseout="this.style.backgroundColor = 'white'; this.style.color = '#666666';"
			onClick = "this.style.backgroundColor = 'white'; this.style.color = '#666666'; />
          </p>
        </form>
		    <br class="clear">
		
	</div><br><br><br>
   </div>
</div>
EOD;


if(!$skipform){
    echo $formcontents;
}

function clean_var($variable) {
    $variable = strip_tags(stripslashes(trim(rtrim($variable))));
  return $variable;
}

echo "</div>";
include 'footer.php';


/**
Email validation function. Thanks to http://www.linuxjournal.com/article/9585
*/
function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && function_exists('checkdnsrr'))
      {
        if (!(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {
         // domain not found in DNS
         $isValid = false;
       }
      }
   }
   return $isValid;
}

?>