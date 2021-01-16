<?php

include_once "../base.php";
$Works=new DB('works');
$data=[];
if(!empty($_POST['name'])&&(!empty($_FILES['img']['tmp_name']))){
    

        $data['name']=$_POST['name'];
        $filename=$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/'.$filename);
        $data['img']=$filename;
        $data['link']=$_POST['link'];
        $data['des']=serialize($_POST['des']);
        $data['tech']=serialize($_POST['tech']);
        $data['sh']=0;
    }

$Works->save($data);
to('../back.php?do=works');