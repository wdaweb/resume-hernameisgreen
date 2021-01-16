<?php
include_once "../base.php";
$Works = new DB('works');

$id=$_POST['id'];


    if(isset($_POST['del'])){
        $id=$_POST['id'];
        $Works->del($id);
    }
    else{
        $work=$Works->find($id);
        $work['name']=$_POST['name'];
        $work['link']=$_POST['link'];
        $work['des']=serialize($_POST['des']);
        $work['tech']=serialize($_POST['tech']);
        $col=" sh = 0";
        $Works->setcol($col);
        $work['sh']=(isset($_POST['sh']))?1:0;
        if($work['sh']==0){
            $shone=$Work->all("limit 1");
            $shone['sh']=1;
            $shone['id']=$shone[0][0];
            $im['sh']=$shone['sh'];
            $im['id']=$shone['id'];
        }
        $Works->save($work);
        $Works->save($im);

    }

    to('../back.php?do=works');
   
