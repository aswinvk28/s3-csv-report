<?php

define('PAGE_ROOT', dirname(__FILE__));

require_once 'actions/errors.php';
require_once 'config.php';
require_once 'includes/page.php';
require_once 'includes/routes.php';

global $routes;
session_start(); 
register_shutdown_function('page_shutdown_site');
?>

<!DOCTYPE html>
<html>
    <body>
        <div class="clearfix" id="page_full">
            <div id="page_body">
                <div class="container">
                    <p>An error has occurred in delivering the page</p>
                </div>
            </div>
        </div>
    </body>
</html>