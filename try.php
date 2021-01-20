<?php
include_once"base.php";
      $works = $Works->all(['sh'=>1]);
      foreach($works as $key=>$value){
        
        
     echo $key;
     echo $value['id'];
     print_r($value);
      }