<?php
include_once "../base.php";
$Bio = new DB('bio');
print_r($_POST);

$id=$_POST['id'];


    if(isset($_POST['del'])){
        $id=$_POST['id'];
        $Bio->del($id);
    }
    else{
        $bio=$Bio->find($id);
        $bio['sh']=(isset($_POST['sh']))?1:0;
        $bio['name']=$_POST['name'];
        $bio['bio']=$_POST['bio'];
        $Bio->save($bio);
    }
    to('../back.php?do=bio');