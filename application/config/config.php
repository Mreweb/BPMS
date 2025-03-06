<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['base_url'] = 'http://localhost:8080/BPMS/';
//$config['base_url'] = 'http://paziresh.dgval.ir:5055/';
$config['index_page'] = '';
$config['uri_protocol']	= 'REQUEST_URI';
$config['url_suffix'] = '';
$config['language']	= 'persian';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['composer_autoload'] = FALSE;
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-(),#@';
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['allow_get_array'] = TRUE;
$config['log_threshold'] = 0;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = 'bpYzH4olFrJDHuvihqEM0AIdotzljyuQ';
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'cms_session';
$config['sess_expiration'] = 14450;
//$config['sess_save_path'] = NULL;
$config['sess_save_path'] = sys_get_temp_dir();
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 300;
$config['sess_regenerate_destroy'] = FALSE;
$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= TRUE;
$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = FALSE;
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_cms_design';
$config['csrf_cookie_name'] = 'csrf_cookie_cms_design';
$config['csrf_expire'] = 14400;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();
$config['compress_output'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';
$config['defaultImage'] = $config['base_url'] . 'assets/ui/images/no-img.png';
$config['defaultPageTitle'] = '';
$config['defaultPageSize'] = 10;
$config['upload_path']= './uploads/';
$config['404_image']= $config['base_url'].('assets/ui/assets/img/404.jpg');
$config['SMSAPI']= 'QUiRP61z2Q5BcNd0d9zRjj947LWIZ5VQfAUS0EwOloI';
$config['SMSTemplate']= 'ticketverify';

/* Enums */
$config['DBMessages'] = array(
    'SuccessAction' => array(
        'type' => "green",
        'content' => "عملیات با موفقیت انجام شد",
        'success' => true
    ),
    'ErrorAction' => array(
        'type' => "red",
        'content' => "عملیات با خطا مواجه شد",
        'success' => false
    ),
    'RequiredFields' => array(
        'type' => "red",
        'content' => 'تمامی مقادیر الزامی را وارد کنید',
        'success' => false
    ),
    'DuplicateInfo' => array(
        'type' => "yellow",
        'content' => 'اطلاعات قبلا در سامانه ثبت شده است',
        'success' => false
    )
);
$config['API'] = array();
$config['ENUM'] = array(
    'APP_Name' => 'سامانه پذیرش دارایی ها',
    'ACTIVE_USER' => array(
        '0' => 'غیرفعال',
        '1' => 'فعال'
    ),
    'HAS_NOT' => array(
        '0' => 'ندارد',
        '1' => 'دارد'
    ),
    'YES_NO' => array(
        '0' => 'خیر',
        '1' => 'بله'
    ),
    'GENDER' => array(
        'MALE' => 'آقا',
        'FEMALE' => 'خانم'
    ),
    'ACCEPT' => array(
        '0' => 'عدم تایید',
        '1' => 'تایید شده'
    ),
    'REQ_STATUS' => array(
        'DRAFT' => 'ثبت اولیه',
        'CENTRALBANK' => 'بررسی بانک مرکزی',
        'LEGAL' => 'بررسی کمیسیون حقوقی',
        'ECONOMIC' => 'بررسی کمیسیون اقتصادی',
        'FINAL_ACCEPT' => 'بررسی نهایی ارشد',
        'REJECT' => 'عدم تایید',
        'ACCEPT' => 'تایید و پذیرش'
    ),
    'REQ_TYPE' => array(
        'EARTH' => 'زمین',
        'BUILDING' => 'ملک',
        'IRON_HOUSE' => 'ملک نیمه ساخته',
    ),
    'DOC_TYPE' => array(
        '1' => 'مشاع',
        '2' => 'شش دانگ',
        '3' => 'منگوله دار',
        '4' => 'تک برگ',
        '5' => 'سایر',
    ),
    'REQ_DOC_TYPE' => array(
        'PROPERTY_DEED' => 'سند ملک',
        'VALUATION_REPORT' => 'گزارش ارزش گذاری',
        'PROJECT_DESIGN_DOCUMENTATION' => 'مستندات طراحی پروژه',
        'REPRESENTATIVE_INTRODUCTION_LETTER' => 'نامه معرفی نماینده',
        'MARKET_MANAGER_INTRODUCTION_LETTER' => 'نامه معرفی بازارگردان',
        'WHITE_PAPER' => 'سپیدنامه',
        'OTHER' => 'سایر',
    ),
    'COMPANY_TYPE' => array(
        '1' => 'شرکت هاي سهامي (خاص يا عام)',
        '2' => 'شرکت با مسئولیت محدود',
        '3' => 'شرکت تضامني',
        '4' => 'شرکت مختلط سهامي و غیرسهامي',
        '5' => 'شرکت تعاوني',
        '6' => 'شرکت نسبي',
    ),
    'BANK_RELATION' => array(
        '1' => ' بانک يا موسسه اعتباري',
        '2' => ' شرکت مستقیم',
        '3' => 'شرکت غیرمستقیم'
    ),
    'PERSON_RELATION_TYPE' => array(
        '1' => 'سهامداري',
        '2' => 'نمايندگي',
        '3' => 'طرح خاص ',
    ),
    'PROPERTY_TYPE' => array(
        '1' => 'آپارتمان',
        '2' => 'زمين',
        '3' => 'ویلایی',
        '4' => 'ساير',
    ),
    'PROPERTY_SPECIAL_STATUS' => array(
        '1' => 'طلق',
        '2' => 'وقفی',
        '3' => 'دولتی',
        '4' => 'سایر',
    ),
    'PROPERTY_BUY_TYPE' => array(
        '1' => 'خرید',
        '2' => 'تملیک',
        '3' => 'سایر'
    ),
    'PROPERTY_JUDGE_RESULT' => array(
        '0' => 'له',
        '1' => 'علیه'
    ),
    'PROPERTY_DOC_EXACT' => array(
        '0' => 'قطعی',
        '1' => 'وکالتی'
    ),
    'USE_TYPE' => array(
        '1' => 'مسکونی',
        '2' => 'خدمات عمومی',
        '3' => 'کشاورزی',
        '4' => 'اداری و دولتی',
        '5' => 'تجاری',
        '6' => 'صنعتی',
        '7' => 'انبارداری',
        '8' => 'معدن',
        '9' => 'حمل و نقل',
        '10' => 'ورزشی',
        '11' => 'فضای سبز',
        '12' => 'آموزشی',
        '13' => 'فرهنگی و مذهبی',
        '14' => 'پارکینگ',
        '15' => 'بهداشتی و درمانی',
        '16' => 'مختلط',
        '17' => 'فاقد کاربری',
    ),
    'ROLES' => array(
        'ADMIN' => 'ادمین',
        'MANAGER' => 'ارشد',
        'ECONOMIC' => 'اقتصادی',
        'LEGAL' => 'حقوقی',
        'PUBLISHER' => 'ناشر / بانک',
        'CENTRALBANK' => 'بانک مرکزی'
    ),
    'TRANSLATES' => array(
        'Report' => 'گزارشات',
    )
);
/* End Enums */
