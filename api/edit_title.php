<?php
include_once "../base.php";
$Title = new DB('title');
//print_r($_POST);

$id=$_POST['id'];


    if(isset($_POST['del'])){
        $id=$_POST['id'];
        $Title->del($id);
    }
    else{
        $title=$Title->find($id);
        $title['title']=$_POST['title'];
        $title['id']=$_POST['id'];

        $col=" sh = 0";
        $Title->setcol($col);

        $title['sh']=(isset($_POST['sh']))?1:0;
        if($title['sh']==0){
            $shone=$Title->all("limit 1");
            $shone['sh']=1;
            $shone['id']=$shone[0][0];
            $im['sh']=$shone['sh'];
            $im['id']=$shone['id'];
        }
        $Title->save($title);
        $Title->save($im);

    }
    to('../back.php?do=title');

   