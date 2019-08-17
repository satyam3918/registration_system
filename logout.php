<?php
include('dbconn.php');
session_destroy();
setcookie('PHPSESSID','',time()-3600);
setcookie('userName',$userName,time()-3600);
setcookie('userPwd',$userPwd,time()-3600);
header('Location:regform.php');