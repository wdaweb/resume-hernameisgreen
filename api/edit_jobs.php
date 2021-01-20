<?php
include_once "../base.php";
$Jobs = new DB('jobs');

if(empty($_POST['id'])){

$jobs['type']=serialize($_POST['type']);
$jobs['area']=serialize($_POST['area']);
$jobs['workday']=$_POST['workday']; 
$jobs['jobtitle']=($_POST['jobtitle']);
$jobs['salary']=$_POST['salary'];

$Jobs->save($jobs);            
}else{

$id=$_POST['id'];
$jobs=$Jobs->find($id);
$jobs['type']=serialize($_POST['type']);
$jobs['area']=serialize($_POST['area']);
$jobs['workday']=$_POST['workday']; 
$jobs['jobtitle']=($_POST['jobtitle']);
$jobs['salary']=$_POST['salary'];
$Jobs->save($jobs);
}
    

to('../back.php?do=jobs');