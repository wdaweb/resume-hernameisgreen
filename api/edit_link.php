<?php
include_once "../base.php";
$Links = new DB('links');
//print_r($_POST);




$id=$_POST['id'];
    if(isset($_POST['del'])){
        $Links->del($id);
    }
    else{
        $links=$Links->find($id);
        $links['name']=$_POST['name'];
        $links['link']=$_POST['link'];
        $Links->save($links);


    }
    to('../back.php?do=link');
