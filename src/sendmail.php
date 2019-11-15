<?php
if (!isset($_SESSION)){
    session_start();
}
$header="MIME-Version: 1.0\r\n";
$header.='From: teamg2trks@gmail.com \r\n';
$header.='Content-Type:text/html;charset="utf-8"'."\n";
$header.='Content-Transfert-Encocdin: 8bit';

$msg='cc';

mail("rg261199@gmail.com","test",$msg, $header);
?>