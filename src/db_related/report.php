<?php
if (!isset($_SESSION)){
    session_start();
}
$header="MIME-Version: 1.0\r\n";
$header.='From: teamg2trks@gmail.com \r\n';
$header.='Content-Type:text/html;charset="utf-8"'."\n";
$header.='Content-Transfert-Encocdin: 8bit';

$mail=$_SESSION['Email'];
$subject=$_POST['subject_report'];
$msg=$_POST['msg_report'];
$send='
De '.$mail.'
Objet : '.$subject.'
'.$msg
;

mail("teamg2trks@gmail.com",$subject,$send, $header);

echo '<script> document.location.replace("../singleevent.php"); </script>'; 
?>