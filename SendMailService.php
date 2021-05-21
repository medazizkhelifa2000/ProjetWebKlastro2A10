<?php

include_once("PHPMailer/PHPMailerAutoload.php");


class SendMailService
{
    function sendMail(){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail -> SMTPAuth = true;
        $mail -> SMTPSecure = 'ssl';
      //  $mail -> Host = 'smtp.gmail.com';
     //   $mail -> Port = '587';
        $mail -> isHTML();
        $mail -> Username = 'projet2aweb@gmail.com';
        $mail -> Password = '123456789@@';
        $mail -> SetFrom('projet2aweb@gmail.com');
        $mail -> Subject ='Test';
        $mail->Body ='A test mail';
        $mail->AddAddress('zahertestamri@gmail.com');


           if( $mail->Send()){
               echo "<script>
                alert('Mail sent !');
               
                </script>";}
           else{ echo "<script>
                alert('Mail not sent !');
               
                </script>";}


    }
}