<?php
include_once "../base.php";
$Links = new DB('links');

$data=[];
if(isset ($_POST['name']) && isset($_POST['link'])){
    
    $data['name']=$_POST['name'];
    $data['link']=$_POST['link'];
    
}

$Links->save($data);

to('../back.php?do=link');