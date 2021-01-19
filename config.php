<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$GLOBALS['debug'] = false;
$GLOBALS['email_to'] = "aswinkvj@gmail.com";
$GLOBALS['error_path'] = "log/site.log";
$GLOBALS["environment"] = "prod";

if(!empty($_GET['debug']) && $_GET['debug'] == 1) {
    $GLOBALS['debug'] = true;
}