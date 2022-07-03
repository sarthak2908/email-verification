<?php
require('connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$code2)
{
    require ("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);
    try { 
        //Server settings
                              //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sarthakiosd123@gmail.com';                     //SMTP username
        $mail->Password   = 'IOSD@123';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('sarthakiosd123@gmail.com', 'Sarthak');
        $mail->addAddress($email2);    //Add a recipient
       
    
        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email verfication';
        $mail->Body    = "Click the link below to verify email
        <a href='http://localhost/emailverify/verify.php?email=$email$code2=$code2'>Verify</a>";
        
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
 
}
if (isset($_POST['submit']))
{
$user_exist_query="SELECT * FROM `comic_book` WHERE `email`='$_POST[email]'";

$result=mysqli_query($con,$user_exist_query);
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            echo"
                <script>alert('email already taken');
                window.location.href='index.php';
                </script>;
                ";
            
        }
        else
        {    $code2=bin2hex(random_bytes(16) );  
            $comic="INSERT INTO `comic_book`(`email`,`code`,`verify`) VALUES ('$_POST[email]','$code2','0') ";
            if(mysqli_query($con,$comic) && sendMail($_POST['email'],$code2))
            { 
                echo"
                    <script>alert('email registered');
                    window.location.href='index.php';
                    </script>;
                    ";
                
            }

            
            else
            {
                echo"
                    <script>alert('Cannot Run Query');
                    window.location.href='index.php';
                    </script>;
                    ";
            }

        }

    }
    
    else
    {
        echo"
            <script>alert('Cannot run query');
            window.location.href='index.php';
            </script>;
            ";
        
    }

}
  
?>