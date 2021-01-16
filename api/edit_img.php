<?php
include_once "../base.php";
$Img = new DB('img');
//print_r($_POST);

$id=$_POST['id'];


    if(isset($_POST['del'])){
        $id=$_POST['id'];
        $Img->del($id);
    }
    else{
        $img=$Img->find($id);
        $img['name']=$_POST['name'];
        
        $col=" sh = 0";
        $Img->setcol($col);

        $img['sh']=(isset($_POST['sh']))?1:0;
        if($img['sh']==0){
            $shone=$Img->all("limit 1");
            $shone['sh']=1;
            $shone['id']=$shone[0][0];
            $im['sh']=$shone['sh'];
            $im['id']=$shone['id'];
        }
        $Img->save($img);
        $Img->save($im);

    }
    to('../back.php?do=img');

   