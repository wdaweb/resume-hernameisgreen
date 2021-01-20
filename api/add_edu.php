<?php
include_once "../base.php";
$Edu = new DB('edu');

$data=[];

    $data['deg']=$_POST['deg'];
    $data['name']=$_POST['name'];
    $data['strt']=$_POST['strt'];
    $data['end']=$_POST['end'];
    $data['content']=serialize($_POST['content']);
    $data['sh']=$_POST['sh'];

$Edu->save($data);

to('../back.php?do=edu');