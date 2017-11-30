<?php
/**
 * Created by IntelliJ IDEA.
 * User: billt
 * Date: 10/14/2017
 * Time: 1:08 PM
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once ($_SERVER["DOCUMENT_ROOT"] .DIRECTORY_SEPARATOR ."cebookcovers" .DIRECTORY_SEPARATOR ."config.php");

require '../vendor/autoload.php';

$mail = new PHPMailer(true); //true is to enable exceptions catching

//if the form is access the page then process email generator otherwise send the user to the contact page
if (isset($_REQUEST['sendMessage'])) {


//init vars for message
    $toAddress = "";
    $fmAddress = "";
    $senderName = "No Name Supplied";
    $subject = "No Subject Supplied";
    $message = "No message Supplied";


    if (isset($_REQUEST['sendTo'])) {
        $toAddress = $_REQUEST['sendTo'];
    }

    if (isset($_REQUEST['email'])) {
        if(PHPMailer::validateAddress($_REQUEST['email'])){
            $fmAddress = $_REQUEST['email'];
        }else{
            echo "invalid email address supplied";
            exit(0);
        }


    }

    if (isset($_REQUEST['name'])) {
        $senderName = $_REQUEST['name'];
    }

    if (isset($_REQUEST['subject'])) {
        $subject = $_REQUEST['subject'];
    }

    if (isset($_REQUEST['message'])) {
        $message = $_REQUEST['message'];
        $log->debug("Message from pOST: " .$message);
    }

    try{
        //$mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "bill.tucker.la@gmail.com";
        $mail->Password = "b1llyb0b!";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        $mail->setFrom($fmAddress, $senderName);
        $mail->addReplyTo($fmAddress, $senderName);

        //This is the To address What a Strange method and is not! intuitive
        $mail->addAddress('bill.tucker.la@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        echo "Message Sent";
        header('location: ../mail-thankyou.php');
    }catch (Exception $e){
        echo "Exception thrown";
        echo "Mailer Error: " .$mail->ErrorInfo;
    }


}else{
    //$header('location: ../contactus.php');
    echo "Some other failer outside of mailer";
    exit(0);
}


?>