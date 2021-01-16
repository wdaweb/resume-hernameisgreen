<?php
include_once "../base.php";
$Skills = new DB('skills');

$data=[];
if(isset ($_POST['name']) && isset($_POST['tech'])){
    
    $data['name']=$_POST['name'];
    $data['tech']=$_POST['tech'];

    if(!empty($_POST['sh'])){
            
        $data['sh']=1;

    }else{
        $data['sh']=0;
    }
    
    
}

$Skills->save($data);

to('../back.php?do=skills');