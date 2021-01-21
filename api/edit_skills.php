<?php
include_once "../base.php";


$id=$_POST['id'];


    if(isset($_POST['del'])){
      
        $Skills->del($id);
    }
    else{
        $exps=$Exps->find($id);
        $exps['name']=$_POST['name'];
        $exps['title']=$_POST['title'];
        $exps['start']=$_POST['start'];
        $exps['end']=$_POST['end'];
        print_r($_POST['list']);
        $exps['list']=serialize($_POST['list']);
        $exps['sh']=$_POST['sh'];
        
        $Exps->save($exps);
        

    }

    to('../back.php?do=skills');
   
  
