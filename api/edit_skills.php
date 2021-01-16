<?php
include_once "../base.php";
$Skills = new DB('skills');

$id=$_POST['id'];


    if(isset($_POST['del'])){
      
        $Skills->del($id);
    }
    else{
        $skills=$Skills->find($id);
        $skills['name']=$_POST['name'];

        $skills['tech']=($_POST['tech']);
        
        if(!empty($_POST['sh'])){
            
            $skills['sh']=1;
        }else{
            $skills['sh']=0;
        }
        
        
        $Skills->save($skills);
        

    }

    to('../back.php?do=skills');
   
