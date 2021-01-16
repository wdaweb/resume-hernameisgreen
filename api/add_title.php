<?php
include_once "../base.php";
$Title=new DB('title');

$data=[];
if(!empty ($_POST['title'])){
   
    $data['title']=$_POST['title'];

    $data['sh']=0;
    $Title->save($data);
}


to('../back.php?do=title');