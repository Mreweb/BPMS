<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'session','form_validation','JDateTime','user_agent');
$autoload['drivers'] = array();
$autoload['helper'] = array('url','string', 'security', 'cookie','html' , 'form' , 'pipes/pipe');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('ModelLog');