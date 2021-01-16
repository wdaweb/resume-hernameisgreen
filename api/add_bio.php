<?php
include_once "../base.php";
$Bio = new DB('bio');

$data=[];
if(isset ($_POST['save-it'])){
    to('../back.php');
    $data['name']=$_POST['name'];
    $data['bio']=$_POST['bio'];
    $data['sh']=0;
}

$Bio->save($data);

to('../back.php?do=bio');