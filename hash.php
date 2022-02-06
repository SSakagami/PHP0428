<?php

// $pw=password_hash('test1',PASSWORD_DEFAULT);

$box=[
'test4',
'test5',
'test6',
'test7',
'test8',
'test9',
'test10',
'test11',
'test12',
'test13',
'test14',
'test15'];

$pw=[];

// for($i==0; $i<count($box); $i++){
// $pw[$i]=password_hash($box[$i],PASSWORD_DEFAULT);
// }


// var_dump($pw);
// var_dump($box);

$pw1=password_hash('test15',PASSWORD_DEFAULT);

echo $pw1;

?>