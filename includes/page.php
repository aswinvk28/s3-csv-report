<?php

class Context extends stdClass
{
    function dispatch($routes)
    {
        $this->dispatch_multi_page($routes);
    }
    
    function dispatch_multi_page($routes)
    {
        // strict mode `E_ALL`
        $page = array();
        if(array_key_exists($this->uri, $routes)) {
            $page = call_user_func($routes[$this->uri]['callable'], $this, $routes[$this->uri], $page);
            $this->page_variables['html_content'] .= call_user_func('page_execute_script', $page, $this, $routes[$this->uri]);
            echo render_template(PAGE_ROOT . "/templates/page.tpl.php", $this->page_variables);
        } elseif(count(array_intersect_key($this->variables, $routes)) > 0 &&
            ($key = array_keys(array_intersect_key($this->variables, $routes))[0])
            && $this->http_method == $routes[$key]['method']) {
            if(!empty($routes[$key]['headers']) && !headers_sent()) {
                foreach($routes[$key]['headers'] as $header) {
                    header($header); // send headers
                }
            }
            $page = call_user_func($routes[$key]['callable'], $this, $routes[$key], $page);
            $this->page_variables['api_content'] = $page['content'];
            echo $this->page_variables['api_content'];
        } elseif(count(array_intersect_key($this->variables, $routes)) > 0) {
            $key = array_keys(array_intersect_key($this->variables, $routes))[0];
            $page = call_user_func($routes[$key]['callable'], $this, $routes[$key], $page);
            $this->page_variables['html_content'] .= call_user_func('page_execute_script', $page, $this, $routes[$key]);
            echo render_template(PAGE_ROOT . "/templates/page.tpl.php", $this->page_variables);
        } else {
            echo render_template(PAGE_ROOT . "/templates/page.tpl.php", $this->page_variables);
        }
    }
}

function get_page_context() {
    $output = array();
    $params = array();
    $context = new Context();
    $context->uri = $_SERVER['REQUEST_URI'];
    $context->path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $context->http_method = $_SERVER['REQUEST_METHOD'];
    $context->query = $_SERVER['QUERY_STRING'];
    $context->host = $_SERVER['HTTP_HOST'];
    $context->is_https = isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : false;
    $context->ip = $_SERVER['REMOTE_ADDR'];
    $context->q = isset($_GET['q']) ? $_GET['q'] : '';
    parse_str($context->q, $output);
    $context->variables = $output;
    $context->page_variables = array('html_content' => '');
    
    return $context;
}

function render_template($filePath, $variables) {
    extract($variables);
    ob_start();
    require($filePath);
    $contents = ob_get_clean();
    return $contents;
}

function render($content) {
    if (empty($content))
        return "";
    $result = "";
    if(is_string($content)) return $content;
    foreach($content as $row) {
        $result .= $row;
    }
    return $result;
}

function page_execute_script($page, $context, $route) {
    return render_template(PAGE_ROOT . "/templates/layout.tpl.php", array('page' => $page, 'section_name' => $page['section_name']));
}

function page_shutdown_site() {
    
    session_destroy();
    
}

function page_get_home($context, $route, $page) {
    ob_start();
    require_once PAGE_ROOT . "/pages/home/home.php";
    $page['content'] = ob_get_clean();
    $page['section_name'] = "home";
    return $page;
}

function page_get_s3_list($context, $route, $page) {
    require_once PAGE_ROOT . '/actions/list_s3.php';
    if(!isset($normal_objects)) {
        throw new Exception("S3 Objects from the bucket 'normal' are not captured");
    }
    if(!isset($pneumonia_objects)) {
        throw new Exception("S3 Objects from the bucket 'pneumonia' are not captured");
    }
    $output = [];
    foreach ($normal_objects['Contents']  as $object) {
        $output[] = array("image_url" => $object['Key']);
    }
    foreach ($pneumonia_objects['Contents']  as $object) {
        $output[] = array("image_url" => $object['Key']);
    }
    $page['section_name'] = "home";
    $page['content'] = json_encode($output);
    return $page;
}