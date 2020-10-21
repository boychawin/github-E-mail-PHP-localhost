<?php
// รับค่า email มาเก็บไว้ที่ตัวแปลชื่อ $memberemail
$memberemail=$_POST['memberemail'];
// ทำการสุ่มสร้างรหัสใหม่
$newpass = rand(10000000, 99999999); 


//โค้ดส่วนของการส่งอีเมล
 $mailto = "$memberemail";
 $mailSub = 'รหัสผ่านใหม่';
 $mailMsg =
     $mailSub .
     '<br>' .
     'Email: ' .
     $memberemail .
     '<br>' .
     'รหัสผ่านใหม่ของคุณคือ: ' .
     $newpass .
     '<br>' .
     'เว็บไซต์: ' .
     "<a href='boychawin.com'>สวัสดี</a>" .
     '<br>' .
     'สถานะ: ' .
     'สำเร็จ';
 require 'PHPMailer/PHPMailerAutoload.php'; //ติดตั้งโฟลเดอร์ PHPMailer ด้วยไม่งั้นส่งเมลไม่ได้นะจ่ะ
 $mail = new PHPMailer();
 $mail->IsSmtp();
 $mail->SMTPAuth = true;
 $mail->SMTPSecure = 'tls';
 $mail->Host = 'smtp.gmail.com';
 $mail->Port = 587; 
 $mail->IsHTML(true);
 $mail->CharSet = 'utf-8';
 $mail->ContentType = 'text/html';
 $mail->Username = 'ใส่อีเมล@gmail.com'; //ใส่อีเมล
 $mail->Password = 'ใส่รหัสผ่านอีเมล'; //ใส่รหัสผ่านอีเมล
 $mail->SetFrom('boychawin.com@gmail.com', 'boychawin.com');
 // ("ตั้งชื่ออีเมล์บ@gmail.com", "ตั้งชื่อ");
 $mail->Subject = $mailSub;
 $mail->Body = $mailMsg;
 $mail->AddAddress($mailto);

 if (!$mail->Send()) {
     echo 'ส่งเมลไม่สำเร็จ';
 } else {
     echo 'ส่งเมลสำเร็จ';
 }

?>