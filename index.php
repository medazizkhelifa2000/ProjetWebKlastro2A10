<?php
 require 'PHPMailer/PHPMailerAutoload.php';
 $mail = new PHPMailer;
 $mail ->isSMTP();
 $mail ->Host='smtp.gmail.com';
 $mail ->Port = 587;
 $mail -> SMTPAuth = true;
 $mail ->SMTPSecure = 'tls';
 $mail ->Username ='projet2aweb@gmail.com';
 $mail ->Password ='123456789@@';
 $mail ->setFrom('projet2aweb@gmail.com','Artistico');
 $mail ->addAddress('zaher.amri@esprit.tn');
 $mail->addReplyTo('projet2aweb@gmail.com');
 $mail->isHTML(true);
 $mail->Subject='Test';
 $mail->Body='<h1 align=center>Hello</h1>';
 if(!$mail->send()){
     echo "Mail not sent";
 }
 else{
     echo "mail sent";
 }

 ?>