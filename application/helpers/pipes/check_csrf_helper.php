<?php

$ci =& get_instance();
if($ci->input->server('REQUEST_METHOD') != 'GET') {
    if ($ci->input->request_headers()['csrf-header'] !== $_COOKIE['csrf']) {
        echo json_encode($ci->config->item('DBMessages')['CSRFAction']);
        die();
    }
}
?>