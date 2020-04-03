<?php

session_start();


//Phase 2: Step # 5
$objDB = new mysqli('localhost', 'root', '', 'jscourse');

if($objDB->connect_errno){
    die('Connection failed');
}


//Phase 3: Step # 3
require_once 'PHPMailer-master/PHPMailerAutoload.php';

//Phase 3: Step # 4
require_once 'send_mail.php';