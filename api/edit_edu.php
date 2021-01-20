<?php
include_once "../base.php";
$Edu = new DB('edu');


$id=$_POST['id'];


    if(isset($_POST['del'])){
        
        $Edu->del($id);
    }
    else{
        $edu=$Edu->find($id);
        $edu['name']=$_POST['name'];


        $col=" sh = 0";
        $Edu->setcol($col);

        $edu['sh']=(isset($_POST['sh']))?1:0;
        if($edu['sh']==0){
            $shone=$edu->all("limit 1");
            $shone['sh']=1;
            $shone['id']=$shone[0][0];
            $im['sh']=$shone['sh'];
            $im['id']=$shone['id'];
        }
        $Edu->save($edu);


    }
    to('../back.php?do=edu');

   