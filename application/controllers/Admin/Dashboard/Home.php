<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('admin/admin_login');
        $this->load->model('admin/ModelPerson');
        $this->load->model('admin/ModelProfile');
        $this->load->model('admin/ModelCountry');
        $this->loginInfo = getLoginInfo();
        $this->loginRoles = getLoginRoles();
        $this->enum = $this->config->item('ENUM');
    }

	public function index(){
        $data['pageTitle'] = 'پیشخوان';
        $personId = $this->loginInfo['PersonId'];
        $this->loginRoles = getLoginRoles();
	    $this->load->view('admin_panel/static/header', $data);
	    $this->load->view('admin_panel/home/index', $data);
	    $this->load->view('admin_panel/static/footer');
	}
    public function uploadFile(){
        $inputs = $this->input->post(NULL, TRUE);
        $uploadPath = $this->config->item('upload_path');
        $error = array();
        $errorClass = "alert alert-danger";
        $this->session->set_flashdata('class', $errorClass);
        if (!empty($_FILES["file"])) {
            $myFile = $_FILES["file"];
            if ($myFile["error"] !== UPLOAD_ERR_OK) {
                $result = array(
                    'type' => "red",
                    'content' => "خطای ارتباط با سرور",
                    'success' => false
                );
                echo json_encode($result);
                die();
            }
            $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
            $i = 0;
            $parts = pathinfo($name);
            while (file_exists($uploadPath . $name)) {
                $i++;
                $name = $parts["filename"] . "_" . $i . "." . $parts["extension"];
            }
            if ($myFile['size'] > 20971520) {
                $result = array(
                    'type' => "red",
                    'content' => "حجم فایل بیشتر از 20 مگابایت است",
                    'success' => false
                );
                echo json_encode($result);
                die();
            }
            $allowedExtensions = array('jpg', 'png', 'gif', 'jpeg', 'zip','rar','pdf', 'rar', 'doc', 'docx', 'xls', 'xlsx', 'avi', 'webm', 'mp4', '3gp', 'ogg');
            $temp = explode(".", $myFile["name"]);
            $extension = strtolower(end($temp));
            if (!in_array($extension, $allowedExtensions)) {
                $result = array(
                    'type' => "red",
                    'content' => "فرمت فایل ارسالی نامعتبر است",
                    'success' => false
                );
                echo json_encode($result);
                die();
            }
            $fileName = md5(rand(100, 9999) . microtime()) . '_' . randomString().".".$extension;
            $success = move_uploaded_file($myFile["tmp_name"], $uploadPath . $fileName);
            if (!$success) {
                $result = array(
                    'type' => "red",
                    'content' => "خطایی رخ داده است",
                    'success' => false
                );
                echo json_encode($result);
                die();
            } else {
                chmod($uploadPath . $fileName, 0644);
                $result = array(
                    'type' => "green",
                    'content' => "بارگذاری با موفقیت انجام شد",
                    'fileSrc' => base_url('uploads/') . $fileName,
                    'fileName' =>  $myFile["name"],
                    'success' => true
                );
                echo json_encode($result);
                die();
            }
        } else {
            $result = array(
                'type' => "green",
                'content' => "بارگذاری با موفقیت انجام شد",
                'fileSrc' => "",
                'success' => true
            );
            echo json_encode($result);
            die();
        }
    }

    public function log_out(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
