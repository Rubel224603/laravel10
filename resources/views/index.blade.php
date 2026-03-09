<?php



$str = "Hello Laravel";
// echo strlen($str);
 
 $cars = [
    'name'=>"bmw",
    'color'=>"red",
    'price'=>111111

 ];

 function valueUpperCase($data){
    return strtoupper($data);
 }

 $upperCaseCars = array_map("valueUpperCase",$cars);
 print_r($upperCaseCars);













?>