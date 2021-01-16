<?php
include_once "../base.php";
$Bio = new DB('bio');
print_r($_POST);

$id=$_POST['id'];


    if(isset($_POST['del'])){
        //$id=$_POST['id'];
        $Bio->del($id);
    }
    else{
        $bio=$Bio->find($id);
        $bio['name']=$_POST['name'];
        $bio['bio']=$_POST['bio'];

        $col=" sh = 0";
        $Bio->setcol($col);

        $bio['sh']=(isset($_POST['sh']))?1:0;
        if($bio['sh']==0){
            $shone=$Bio->all("limit 1");
            $shone['sh']=1;
            $shone['id']=$shone[0][0];
            $im['sh']=$shone['sh'];
            $im['id']=$shone['id'];
        }
        $Bio->save($bio);
        $Bio->save($im);

    }
    to('../back.php?do=bio');

   