<?php

class ModelRequests extends CI_Model{

    public function doPagination($inputs){
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        $this->db->join('person' , 'person.PersonId = person_requests.ReqPersonId');
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        if ($inputs['inputNationalCode'] != '') {
            $this->db->like('PersonNationalCode', $inputs['inputNationalCode']);
        }
        if ($inputs['inputPhone'] != '') {
            $this->db->like('PersonPhone', $inputs['inputPhone']);
        }
        if ($inputs['inputReqStatus'] != '') {
            $this->db->where('ReqStatus', $inputs['inputReqStatus']);
        }
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function doMyPagination($inputs){
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        $this->db->join('person' , 'person.PersonId = person_requests.ReqPersonId');
        $this->db->where('ReqPersonId' , $inputs['inputPersonId']);
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function doStepLegalPagination($inputs)
    {
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        $this->db->where('ReqStatus', 'LEGAL');
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function doStepEconimicPagination($inputs)
    {
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        $this->db->where('ReqStatus', 'ECONOMIC');
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function doStepFinalPagination($inputs)
    {
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        $this->db->where('ReqStatus', 'FINAL_ACCEPT');
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function doStepFinishedPagination($inputs)
    {
        $limit = $inputs['pageIndex'];
        $start = ($limit - 1) * $this->config->item('defaultPageSize');
        $end = $this->config->item('defaultPageSize');
        $this->db->select('*');
        $this->db->from('person_requests');
        if ($inputs['inputTitle'] != '') {
            $this->db->like('ReqTitle', $inputs['inputTitle']);
        }
        $this->db->where_in('ReqStatus', array('ACCEPT', 'REJECT'));
        $this->db->order_by('ReqId', 'DESC');

        $tempdb = clone $this->db; /* For Count Of Rows */
        $this->db->limit($end, $start);
        $query = $this->db->get()->result_array();
        $queryCount = $tempdb->count_all_results();
        if (count($query) > 0) {
            $result['data'] = $query;
            $result['count'] = $queryCount;
        } else {
            $result['data'] = array();
            $result['count'] = 0;
        }
        return $result;
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('person_requests');
        $this->db->where('ReqId', $id);
        return $this->db->get()->result_array();
    }

    public function getAttachmentByReqId($id)
    {
        $this->db->select('*');
        $this->db->from('person_requests_attachments');
        $this->db->where('AttachReqId', $id);
        return $this->db->get()->result_array();
    }

    public function getAttachmentById($id)
    {
        $this->db->select('*');
        $this->db->from('person_requests_attachments');
        $this->db->where('AttachId', $id);
        return $this->db->get()->result_array();
    }

    public function doAdd($inputs){
        $this->db->select('*');
        $this->db->from('person_requests');
        $this->db->group_start();
        $this->db->where(array('ReqTitle' => $inputs['inputTitle']));
        $this->db->group_end();
        $data = $this->db->get()->result_array();

        if($inputs['inputReqStatus'] == 'DRAFT'){
            $status = 'DRAFT';
        }
        else {
            $status = 'LEGAL';
        }
        $userArray = array(
            'ReqPersonId' => $inputs['inputCreatePersonId'],
            'ReqTitle' => $inputs['inputTitle'],
            'ReqDescription' => $inputs['inputDescription'],
            'ReqType' => $inputs['inputReqType'],
            'ReqAgentNationalCode' => $inputs['inputAgentNationalCode'],
            'ReqMarketMakerNationalCode' => $inputs['inputMarketMakerNationalCode'],
            'ReqUseType' => $inputs['inputReqUseType'],
            'ReqPrice' => $inputs['inputPrice'],
            'ReqStatus' => $status,
            'CreateDatetime' => time(),
            'CreatePersonId' => $inputs['inputCreatePersonId']
        );
        $this->db->insert('person_requests', $userArray);

        $reqId = $this->db->insert_id();

        foreach ($inputs['inputAttachments'] as $inputAttachment) {
            if ($inputAttachment['src'] != "") {
                $userArray = array(
                    'AttachReqId' => $reqId,
                    'AttachUrl' => $inputAttachment['src'],
                    'AttachTitle' => $inputAttachment['name'],
                    'AttachType' => $inputAttachment['type'],
                    'CreateDatetime' => time(),
                    'CreatePersonId' => $inputs['inputCreatePersonId']
                );
                $this->db->insert('person_requests_attachments', $userArray);
            }
        }


        return $this->config->item('DBMessages')['SuccessAction'];
    }

    public function doEdit($inputs)
    {
        $this->db->select('*');
        $this->db->from('person_requests');
        $this->db->where(array('ReqId !=' => $inputs['inputReqId']));
        $this->db->where(array('ReqTitle' => $inputs['inputTitle']));
        $data = $this->db->get()->result_array();
        if (!empty($data)) {
            return $this->config->item('DBMessages')['DuplicateInfo'];
        } else {

            if($inputs['inputReqStatus'] == 'DRAFT'){
                $status = 'DRAFT';
            }
            else {
                $status = 'LEGAL';
            }
            $userArray = array(
                'ReqTitle' => $inputs['inputTitle'],
                'ReqDescription' => $inputs['inputDescription'],
                'ReqType' => $inputs['inputReqType'],
                'ReqUseType' => $inputs['inputReqUseType'],
                'ReqAgentNationalCode' => $inputs['inputAgentNationalCode'],
                'ReqMarketMakerNationalCode' => $inputs['inputMarketMakerNationalCode'],
                'ReqPrice' => $inputs['inputPrice'],
                'ReqStatus' => $status,
                'ModifyDateTime' => time(),
                'ModifyPersonId' => $inputs['inputModifyPersonId']
            );
            $this->db->where('ReqId', $inputs['inputReqId']);
            $this->db->update('person_requests', $userArray);

            $this->db->delete('person_requests_attachments', array(
                'AttachReqId' => $inputs['inputReqId']
            ));

            foreach ($inputs['inputAttachments'] as $inputAttachment) {
                if ($inputAttachment['src'] != "") {
                    $userArray = array(
                        'AttachReqId' => $inputs['inputReqId'],
                        'AttachUrl' => $inputAttachment['src'],
                        'AttachTitle' => $inputAttachment['name'],
                        'AttachType' => $inputAttachment['type'],
                        'CreateDatetime' => time(),
                        'CreatePersonId' => $inputs['inputCreatePersonId']
                    );
                    $this->db->insert('person_requests_attachments', $userArray);
                }
            }


        }
        return $this->config->item('DBMessages')['SuccessAction'];
    }

    public function doEditLegal($inputs){

        $status = "LEGAL";
        if ($inputs['inputResult'] == "0") {
            $status = "DRAFT";
        }
        if ($inputs['inputResult'] == "1") {
            $status = "ECONOMIC";
        }
        $userArray = array(
            'ReqStatus' => $status
        );
        $this->db->where('ReqId', $inputs['inputReqId']);
        $this->db->update('person_requests', $userArray);

        if ($inputs['inputResultDescription'] != "") {
            $userArray = array(
                'CommentReqId' => $inputs['inputReqId'],
                'CommentType' => 'LEGAL',
                'CommentContent' => $inputs['inputResultDescription'],
                'CommentPersonId' => $inputs['inputCreatePersonId'],
                'CreatePersonId' => $inputs['inputCreatePersonId'],
                'CreateDateTime' => time()
            );
            $this->db->insert('person_requests_comments', $userArray);
        }

        return $this->config->item('DBMessages')['SuccessAction'];
    }

    public function doEditEconimic($inputs)
    {

        $status = "LEGAL";
        if ($inputs['inputResult'] == "0") {
            $status = "LEGAL";
        }
        if ($inputs['inputResult'] == "1") {
            $status = "FINAL_ACCEPT";
        }
        $userArray = array(
            'ReqStatus' => $status
        );
        $this->db->where('ReqId', $inputs['inputReqId']);
        $this->db->update('person_requests', $userArray);

        if ($inputs['inputResultDescription'] != "") {
            $userArray = array(
                'CommentReqId' => $inputs['inputReqId'],
                'CommentType' => 'ECONOMIC',
                'CommentContent' => $inputs['inputResultDescription'],
                'CommentPersonId' => $inputs['inputCreatePersonId'],
                'CreatePersonId' => $inputs['inputCreatePersonId'],
                'CreateDateTime' => time()
            );
            $this->db->insert('person_requests_comments', $userArray);
        }

        return $this->config->item('DBMessages')['SuccessAction'];
    }

    public function doEditFinal($inputs){

        $userArray = array(
            'ReqStatus' => $inputs['inputResult']
        );
        $this->db->where('ReqId', $inputs['inputReqId']);
        $this->db->update('person_requests', $userArray);

        if ($inputs['inputResultDescription'] != "") {
            $userArray = array(
                'CommentReqId' => $inputs['inputReqId'],
                'CommentType' => 'FINAL_ACCEPT',
                'CommentContent' => $inputs['inputResultDescription'],
                'CommentPersonId' => $inputs['inputCreatePersonId'],
                'CreatePersonId' => $inputs['inputCreatePersonId'],
                'CreateDateTime' => time()
            );
            $this->db->insert('person_requests_comments', $userArray);
        }

        return $this->config->item('DBMessages')['SuccessAction'];
    }

    public function getCommentsById($id)
    {
        $this->db->select('*');
        $this->db->from('person_requests_comments');
        $this->db->where('CommentReqId', $id);
        $this->db->order_by('RowId', 'ASC');
        return $this->db->get()->result_array();
    }

}

?>