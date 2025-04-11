<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MyRequests extends CI_Controller{

    private $loginInfo;
    private $loginRoles;
    private $enum;
    public function __construct(){
        parent::__construct();
        $this->load->helper('admin/admin_login');
        $this->load->model('admin/ModelRequests');
        $this->load->model('admin/ModelCountry');
        $this->loginInfo = getLoginInfo();
        $this->loginRoles = getLoginRoles();
        $this->enum = $this->config->item('ENUM');
        checkPersonAccess($this->loginRoles, 'PUBLISHER');
    }

    public function index(){
        $page['pageTitle'] = 'فهرست درخواست های من';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/my/index', $data);
        $this->load->view('admin_panel/requests/my/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doMyPagination(){
        $inputs = $this->input->post(NULL, TRUE);
        $inputs['inputPersonId'] = $this->loginInfo['PersonId'];
        $data = $this->ModelRequests->doMyPagination($inputs);
        $data['htmlResult'] = $this->load->view('admin_panel/requests/my/pagination', $data, TRUE);
        unset($data['data']);
        echo json_encode($data);
    }

    public function Add(){
        
        $page['pageTitle'] = 'افزودن درخواست پذیرش';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $data['provinceList'] = $this->ModelCountry->getProvinceList();

        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/my/add/index', $data);
        $this->load->view('admin_panel/requests/my/add/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doAdd(){

        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);
        $inputs['inputCreatePersonId'] = $this->loginInfo['PersonId'];
        $result = $this->ModelRequests->doAdd($inputs);

        if (!$result['success']) {
            response(get_req_message('DuplicateInfo') , 400);
        } else {
            logAction($inputs,$this->loginInfo['PersonId']);
            response(get_req_message('SuccessAction') , 200);
        }
    }

    public function Edit($id){

        if(!is_numeric($id)){
            invalidUrlParameterInput();
        }

        $page['pageTitle'] = 'ویرایش درخواست';
        $data['loginInfo'] = $this->loginInfo;
        $data['enum'] = $this->enum;
        $data['provinceList'] = $this->ModelCountry->getProvinceList();
        $data['request'] = $this->ModelRequests->getById($id)[0];
        $data['request_property_cities'] = $this->ModelCountry->getCityByProvinceId($data['request']['ReqProvinceId']);
        if($data['request']['ReqPersonId'] != $this->loginInfo['PersonId']){
            redirect(base_url('Admin/Dashboard/Home?msg=دسترسی به این درخواست محدود شده است'));
        }
        $data['request'] = $this->ModelRequests->getById($id)[0];
        $data['request_attachment'] = $this->ModelRequests->getAttachmentByReqId($id);
        $data['request_attachment_images'] = $this->ModelRequests->getImagesByReqId($id);
        $data['request_comments'] = $this->ModelRequests->getCommentsById($id);
        $data['request_property_info'] = $this->ModelRequests->getPropertyInfoById($id)[0];
        $data['request_owner_info'] = $this->ModelRequests->getPropertyOwnerInfoById($id)[0];
        $data['request_central_bank_info'] = $this->ModelRequests->getPropertyCentralBankInfoById($id)[0];
        $data['request_property_locations'] = $this->ModelRequests->getPropertyLocationsById($id)[0];




        $this->load->view('admin_panel/static/header', $page);
        $this->load->view('admin_panel/requests/my/edit/index', $data);
        $this->load->view('admin_panel/requests/my/edit/index_css', $data);
        $this->load->view('admin_panel/requests/my/edit/index_js', $data);
        $this->load->view('admin_panel/static/footer');
    }
    public function doEdit(){

        $inputs = $this->input->post(NULL, TRUE);
        $inputs = secureInput($inputs);

        $data['request'] = $this->ModelRequests->getById($inputs['inputReqId'])[0];

        if(isset($_GET['draft']) && $_GET['draft']){
            if($data['request']['ReqStatus'] != 'DRAFT' ){
                response(get_req_message('ErrorAction' , 'درخواست در مرحله بررسی است و قابل ویرایش نیست.') , 400);
                die();
            }
        }

        $inputs['inputModifyPersonId'] = $this->loginInfo['PersonId'];
        $inputs['inputCreatePersonId'] = $this->loginInfo['PersonId']; /* For Editing Roles Need create Person Id */
        $result = $this->ModelRequests->doEdit($inputs);

        if (!$result['success']) {
            response(get_req_message('DuplicateInfo') , 400);
        } else {
            logAction($inputs,$this->loginInfo['PersonId']);
            response(get_req_message('SuccessAction') , 200);
        }

    }


}