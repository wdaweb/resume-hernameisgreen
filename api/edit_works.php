<?php
include_once "../base.php";
$Works = new DB('works');

$id = $_POST['id'];


if (isset($_POST['del'])) {
    $id = $_POST['id'];
    $Works->del($id);
} else {
    $work = $Works->find($id);
    $work['name'] = $_POST['name'];
    $work['link'] = $_POST['link'];
    $work['des'] = serialize($_POST['des']);
    $work['tech'] = serialize($_POST['tech']);
    if(!empty($_POST['sh'])){
        $work['sh']=1;
    }
    $Works->save($work);
}

to('../back.php?do=works');
