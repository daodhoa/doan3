<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function rootlogfile()
{
    return $_SERVER['DOCUMENT_ROOT']."/doan3/HoTroHocTap/logfile/";//mylog
}

function rootlogbailam()
{
    return $_SERVER['DOCUMENT_ROOT']."/doan3/HoTroHocTap/logbailam/";//mylog
}

function pr($bien)
{
    echo "<pre>";
    print_r($bien);
    echo "</pre>";
    exit;
}
?>