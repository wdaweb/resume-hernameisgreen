<?php

include_once "../base.php";
$Img=new DB('img');
$data=[];
if(!empty($_POST['name'])&&!empty($_FILES['img']['tmp_name'])){
    $data['name']=$_POST['name'];
    $filename=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/'.$filename);
    $data['img']=$filename;
}
$Img->save($data);
to('../back.php?do=img');