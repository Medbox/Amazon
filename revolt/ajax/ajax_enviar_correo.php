<?php

require_once("../class/PHPMailer/class.phpmailer.php");
require_once("../class/PHPMailer/class.smtp.php");

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host			=	'smtp.gmail.com';
$mail->Port			=	465;
$mail->SMTPAuth		=	true;
$mail->SMTPSecure	=	'ssl';
$mail->Username		=	'intranet.revolt@gmail.com';
$mail->Password		=	'010203040506070809';

$VAR_EMAIL	=	$_POST['from_email'];
$VAR_NAME	=	"[Revolt] ".$_POST['from_name'];
$VAR_ARR_TO	=	explode(",",$_POST['to_emails']);
$VAR_MSG	=	nl2br($_POST['email_msg']);
$VAR_SUB	=	$_POST['email_sub'];
$VAR_FLAG	=	"NOVA";

//$replace=str_replace("\r","<br>",$replace);

//FROM
$mail->From			=	$VAR_EMAIL;
$mail->FromName		=	$VAR_NAME;

//TO
foreach($VAR_ARR_TO as $I => $EMAIL){
	
	if($EMAIL == $VAR_EMAIL){	$VAR_FLAG	=	"VA";	}
	$mail->addAddress($EMAIL);
	
	}
	
if($VAR_FLAG != "VA"){
	$mail->addCC($VAR_EMAIL);
	}

//MESSAGE
$mail->addReplyTo($VAR_EMAIL);

$mail->WordWrap = 50;
$mail->isHTML(true);

if($VAR_SUB != ""){
	$mail->Subject = $VAR_SUB;
	}
else{	
	$mail->Subject = '(no subject)';
	}



$mail->Body    = $VAR_MSG;


if(!$mail->send()){
   echo "ERROR|".$mail->ErrorInfo;
	}
else{
	echo "OK";
	}