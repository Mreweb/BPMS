<?php

function pipeEnum($enumName, $k , $class=null ,$return = false)
{
    $ci =& get_instance();
    foreach ($ci->config->item('ENUM')[$enumName] as $key => $value) {
        if ($key == $k) {
            if($return){
                return $value;
            } else{
                if($class == null){
                    echo $value;
                } else{
                    echo "<span class='".$class."'>".$value."</span>";
                }
            }
        }
    }
}
function getRequestsStatusClass($status){
    switch ($status){
        case 'DRAFT':
            return 'badge bg-secondary';
        case 'LEGAL':
            return 'badge bg-primary';
        case 'CENTRALBANK':
            return 'badge bg-primary';
        case 'ECONOMIC':
            return 'badge bg-warning';
        case 'FINAL_ACCEPT':
            return 'badge bg-info';
        case 'REJECT':
            return 'badge bg-danger';
        case 'ACCEPT':
            return 'badge bg-success';
        default:
            return 'badge bg-secondary';
    }
}
function getHasNotClass($status){
    switch ($status){
        case '0':
            return 'badge bg-danger';
        case '1':
            return 'badge bg-primary';
        case 'ECONOMIC':
        default:
            return 'badge bg-secondary';
    }
}
function getPeymentClass($status){
    switch ($status){
        case 'DONE':
            return 'badge bg-success';
        case 'FAILED':
            return 'badge bg-danger';
        case 'PENDING':
            return 'badge bg-primary';
        case 'REJECT':
            return 'badge bg-danger';
        case 'RETURNED':
            return 'badge bg-warning';
        default:
            return 'badge bg-warning';
    }
}
function getEnum($enumName)
{
    $ci =& get_instance();
    return $ci->config->item('ENUM')[$enumName];
}
function FaToEn($input)
{
    return strtr($input, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9'));
}
function convertDate($input, $isHtml = false , $format='Y/m/d'){
    if ($input != NULL) {
        if (!$isHtml) {
            return str_ireplace("/","-",jDateTime::date($format, $input, false, true, 'Asia/Tehran'));
        } else {
            return '<span style="direction:rtl;">' . jDateTime::date($format, $input, false, true, 'Asia/Tehran') . '</span>';
        }
    } else {
        return "";
    }
}
function convertGoergianDate($input){
    if ($input !== NULL) {
        $input = explode("-", $input);
        $date = jDateTime::toGregorian($input[0], $input[1], $input[2]);
        return $date[0].'-'.$date[1].'-'.$date[2];
    }
}
function convertPersianDate($input){
    if ($input !== NULL) {
        $input = explode("-", $input);
        $date = jDateTime::toJalali($input[0], $input[1], $input[2]);
        return $date[0].'-'.$date[1].'-'.$date[2];
    }
}
function convertPersianDateTime($input){
    if ($input !== NULL) {
        $input = str_ireplace(" ","T",$input);
        $hsi = jDateTime::date("H:i:s", strtotime($input), null, true, 'Asia/Tehran');
        if($hsi == "00:00:00"){
            return jDateTime::date("Y/m/d", strtotime($input), null, true, 'Asia/Tehran');
        } else{
            return jDateTime::date("Y/m/d H:i:s", strtotime($input), null, true, 'Asia/Tehran');
        }
    }
}
function convertTime($input, $isHtml = false){
    if ($input !== NULL) {
        if ($isHtml) {
            return jDateTime::date("H:i:s", $input, false, true, 'Asia/Tehran');
        } else {
            return '<span style="direction:rtl;">' . jDateTime::date("H:i:s", $input, false, true, 'Asia/Tehran') . '</span>';
        }
    } else {
        return "";
    }
}
function makeTimeFromDate($input , $split="-"){
    if ($input !== NULL) {
        $input = explode($split, $input);
        return jDateTime::mktime(0, 0, 0, $input[1], $input[2], $input[0]);
    }
}
function getCurrentYear($increaseAmount = 0){
    return intval(jDateTime::date("Y", false, false, 'Asia/Tehran')) + $increaseAmount;
}
function isValidNationalCode($input){
    if (
        !preg_match("/^\d{10}$/", $input)
        || $input == '0000000000'
        || $input == '1111111111'
        || $input == '2222222222'
        || $input == '3333333333'
        || $input == '4444444444'
        || $input == '5555555555'
        || $input == '6666666666'
        || $input == '7777777777'
        || $input == '8888888888'
        || $input == '9999999999'
    ) {
        return false;
    }
    $check = (int) $input[9];
    $sum = array_sum(array_map(function ($x) use ($input) {
            return ((int) $input[$x]) * (10 - $x);
        }, range(0, 8))) % 11;
    return ($sum < 2 && $check == $sum) || ($sum >= 2 && $check + $sum == 11);
}
function startsWith($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}
function endsWith($string, $endString)
{
    $len = strlen($endString);
    if ($len == 0) {
        return true;
    }
    return (substr($string, -$len) === $endString);
}
function randomString($type = 'numeric', $length = 10)
{
    return random_string($type, $length);
}
function isSetValue($value)
{
    if (isset($value) && !empty($value) && trim($value) !== '') {
        return TRUE;
    }
    return FALSE;
}
function getSMSAPI(){
    $ci =& get_instance();
    return $ci->config->item('SMSAPI');
}
function getSMSTemplate(){
    $ci =& get_instance();
    return $ci->config->item('SMSTemplate');
}
function sendSMS($method , $to , $inputs){
    //$to = '09120572107';

    for($i = 0; $i < count($inputs); $i++){
        if(!is_numeric($inputs[$i])){
            $inputs[$i] = str_ireplace(" ","_",$inputs[$i]);
        }
    }

    if(sizeof($inputs) == 1){
        $url = 'http://api.kavenegar.com/v1/'.getSMSAPI().'/verify/lookup.json?receptor='.$to.'&token='.$inputs[0].'&template='.$method.'&type=sms';
    }
    if(sizeof($inputs) == 2){
        $url = 'http://api.kavenegar.com/v1/'.getSMSAPI().'/verify/lookup.json?receptor='.$to.'&token='.$inputs[0].'&token2='.$inputs[1].'&template='.$method.'&type=sms';
    }
    if(sizeof($inputs) == 3){
        $url = 'http://api.kavenegar.com/v1/'.getSMSAPI().'/verify/lookup.json?receptor='.$to.'&token='.$inputs[0].'&token2='.$inputs[1].'&token3='.$inputs[2].'&template='.$method.'&type=sms';
    }
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    $result = curl_exec($curl);
    curl_close($curl);
}
function response($array, $code = null){
    if($code != null){
        http_response_code($code);
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES  );
    exit(0);
}
function get_req_message($key , $custom_message = null , $additionalArray = array()){
    $ci =& get_instance();
    $msg = $ci->config->item('DBMessages')[$key];
    if($custom_message != null){
        $msg['message'] = $custom_message;
    }
    foreach($additionalArray as $key => $value){
        $msg[$key] = $value;
    }
    return $msg;
}
function check_request_method($method){
    $ci =& get_instance();
    if($method == $ci->input->server('REQUEST_METHOD')){
        return TRUE;
    }
    response(get_req_message('MethodNotAllowed'), 405);

}
function check_captcha($captcha){
    $ci =& get_instance();
    $data = $ci->db->select('*')->from('captcha')->where(array(
        'CaptchaId' => $captcha['inputCaptchaId'],
        'CaptchaCode' => $captcha['inputCaptchaCode']
    ))->get()->num_rows();
    if ($data <= 0) {
        response(get_req_message('ErrorAction', 'کد امنیتی صحیح نیست'), 400);
        die();
    }
}
function getVisitorInfo(){
    $ci =& get_instance();
    $data['IpAddress'] = $ci->input->ip_address();
    $data['Browser'] = $ci->agent->browser();
    $data['BrowserVersion'] = $ci->agent->version();
    $data['Platform'] = $ci->agent->platform();
    $data['FullUserAgentString'] = $_SERVER['HTTP_USER_AGENT'];
    return $data;
}
function getLoginInfo(){
    $ci =&  get_instance();
    return $ci->session->userdata('AdminLoginInfo')[0];
}
function getPersonInfoById($personId){
    $ci =&  get_instance();
    $ci->db->select('*');
    $ci->db->from('person');
    $ci->db->where(array('PersonId' => $personId));
    $data = $ci->db->get()->result_array()[0];
    $ci->db->reset_query();

    $ci->db->reset_query();

    $ci->db->select('*');
    $ci->db->from('person_roles');
    $ci->db->where(array('PersonId' => $personId));
    $data['roles'] = $ci->db->get()->result_array();

    $ci->db->reset_query();

    $ci->db->select('*');
    $ci->db->from('person_legal_info');
    $ci->db->where(array('PersonId' => $personId));
    $data['legal_info'] = $ci->db->get()->result_array();
    return $data;
}
function getPersonInfoByRequestId($reqId){
    $ci =&  get_instance();
    $ci->db->select('*');
    $ci->db->from('person');
    $ci->db->join('person_requests' , 'person_requests.PersonId=person.PersonId');
    $ci->db->where(array('person_requests.ReqId' => $reqId));
    $data = $ci->db->get()->result_array()[0];
    return $data;
}
function getLoginRoles(){
    $ci =&  get_instance();
    return $ci->session->userdata('AdminRoles');
}
function checkPersonAccess($roles , $role){
    return true;
    $hasAccess = false;
    if(is_array($role)) {
        foreach($role as $r){
            foreach ($roles as $item) {
                if($item == $r){
                    $hasAccess = true;
                    break;
                }
            }
        }
    } else{
        foreach ($roles as $item) {
            if($item == $role){
                $hasAccess = true;
                break;
            }
        }
    }
    if(!$hasAccess){
        redirect(base_url('PageAccess'),'auto',401);
        die();
    }
}
function invalidUrlParameterInput(){
    die('Invalid Parameter Input');
}
function setInputValue($input)
{
    echo "value='" . $input . "'";
}
function setOptionSelected($input, $compare)
{
    if ($input == $compare) echo "selected";
}
function setRadioSelected($input, $compare)
{
    if ($input == $compare) echo "checked";
}
function setSelectData($input, $currentValue = NULL)
{
    foreach ($input as $key => $value) {
        if ($currentValue != NULL && $key == $currentValue) {
            echo "<option value='" . $key . "' selected>";
        } else {
            echo "<option value='" . $key . "'>";
        }
        echo $value;
        echo "</option>";
    }
}
function logAction(){

}
function isRecordExists($data){
    if(empty($data) || sizeof($data) == 0){
        echo "<tr><td colspan='100'>موردی یافت نشد</td></tr>";
    }
}
function make_request($url, $qs = null)
{
    $ci =& get_instance();
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    if ($qs != null) {
        curl_setopt($ch, CURLOPT_URL, $url . "?" . http_build_query($qs));
    } else {
        curl_setopt($ch, CURLOPT_URL, $url);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $r = curl_exec($ch);
    if (curl_error($ch)) {
        echo json_encode($ci->config->item('DBMessages')['ErrorAction']);
        die();
    }
    return json_decode($r, true);
}
function log_requests($personId){
    $ci =& get_instance();
    $ci->db->select('*');
    $ci->db->from('person_account_package');
    $ci->db->where('PersonId', $personId);
    $package = $ci->db->get()->result_array()[0];
    $info = getVisitorInfo();
    $routeClass = $ci->router->fetch_class();
    $routeMethod = $ci->router->fetch_method();
    $ci->db->insert('person_requests', array(
        'PersonId' => $personId,
        'ReqURL' => current_url(),
        'ReqClass' => $routeClass,
        'ReqFunction' => $routeMethod,
        'ReqPackageType' => $package['PackageType'],
        'ReqIp' => $info['IpAddress'],
        'ReqPlatform' => $info['Platform'],
        'CreateDateTime' => time()
    ));

}
function secureInput($input){
    $input = array_map(function ($v) {
        if(!is_array($v)){
            return strip_tags($v);
        }
        return $v;
    }, $input);
    /*$input = array_map(function ($v) {
        return remove_invisible_characters($v);
    }, $input);*/
    $input = array_map(function ($v) {
        return makeSafeInput($v);
    }, $input);

    return $input;
}
function makeSafeInput($string) {
    $string=str_ireplace("<?","",$string);
    $string=str_ireplace("?>","",$string);
    $string=str_ireplace("<?php","",$string);
    $string=str_ireplace("?>","",$string);
    $string=str_ireplace("<body","",$string);
    $string=str_ireplace("<embed","",$string);
    $string=str_ireplace("<frame","",$string);
    $string=str_ireplace("<script","",$string);
    $string=str_ireplace("<frameset","",$string);
    $string=str_ireplace("<html","",$string);
    $string=str_ireplace("<iframe","",$string);
    $string=str_ireplace("<img","",$string);
    $string=str_ireplace("<style","",$string);
    $string=str_ireplace("<layer","",$string);
    $string=str_ireplace("<link","",$string);
    $string=str_ireplace("<ilayer","",$string);
    $string=str_ireplace("<meta","",$string);
    $string=str_ireplace("<object","",$string);
    $string=str_ireplace("<","",$string);
    $string=str_ireplace(">","",$string);
    $string=str_ireplace("javascript","",$string);
    $string=str_ireplace("java&#010","",$string);
    $string=str_ireplace("java&#X0A","",$string);
    $string=str_ireplace("u003e","",$string);
    $string=str_ireplace("alert ","",$string);
    $string=str_ireplace("drop ","",$string);
    $string=str_ireplace("select ","",$string);
    $string=str_ireplace("update ","",$string);
    $string=str_ireplace("script","",$string);
    $string=str_ireplace("1=1","",$string);
    $string=str_ireplace("delete","",$string);
    return $string;
}

function getNextDayByDate($date , $dayCount = 1){
    $time = $date;
    $time += $time + ($dayCount*24*60*60);
    return $time;
}
function getPrevDayByDate($date , $dayCount = 1){
    $time = $date;
    $time = $time - ($dayCount*24*60*60);
    return $time;
}

?>