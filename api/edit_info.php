<?php
include_once "../base.php";
$Info = new DB('info');

$info['name']=$_POST['name']; 
$info['engname']=($_POST['engname']);
$info['birthday']=$_POST['birthday'];
$info['hobbies']=serialize($_POST['hobbies']);
$info['shortintro']=($_POST['shortintro']);
$Info->save($info);            

    

to('../back.php?do=info');
   
