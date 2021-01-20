<?php
include_once "../base.php";
$Exps = new DB('exps');

$data=[];

    $data['name']=$_POST['name'];
    $data['title']=$_POST['title'];
    $data['start']=$_POST['start'];
    $data['end']=$_POST['end'];
    print_r($_POST['list']);
    $data['list']=serialize($_POST['list']);
    $data['sh']=$_POST['sh'];

$Exps->save($data);

to('../back.php?do=exps');