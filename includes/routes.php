<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$routes = array(
    '/' => array(
        'callable' => 'page_get_home',
        'variables' => array(
            'page' => array('content' => array(), 'section_name' => '')
        )
    ),
    'list-s3' => array(
        'callable' => 'page_get_s3_list',
        'variables' => array(
            'page' => array('content' => array(), 'sidebar' => array(), 'message' => '')
        ),
        'method' => 'GET',
        'headers' => array(
            'Content-Type: application/json',
            'Access-Control-Allow-Origin: *'
        )
    )
);