<?php
include_once "../base.php";
$Info = new DB('info');


if(empty($_POST['id'])){

    $info['name']=$_POST['name']; 
    $info['engname']=($_POST['engname']);
    $info['birthday']=$_POST['birthday'];
    $info['hobbies']=serialize($_POST['hobbies']);
    $info['shortintro']=($_POST['shortintro']);
    $Info->save($info);            
}else{
    $id=$_POST['id'];
    $info=$Info->find($id);
    $info['name']=$_POST['name']; 
    $info['engname']=($_POST['engname']);
    $info['birthday']=$_POST['birthday'];
    $info['hobbies']=serialize($_POST['hobbies']);
    $info['shortintro']=($_POST['shortintro']);
    $Info->save($info);            

}

    

to('../back.php?do=info');
   
