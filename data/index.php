<?php
// $file = fopen($_REQUEST['filename'],"r");

// while ($str=fread($file,1000))
// {
//   echo $str;
// }
$method = $_SERVER['REQUEST_METHOD'];
if ('PUT' === $method) {
    parse_str(file_get_contents('php://input'), $_PUT);
    var_dump($_PUT); //$_PUT contains put fields 
}