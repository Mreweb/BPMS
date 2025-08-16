<?php

class ModelProposal extends CI_Model{

    public function getRequestTransactions($id){
        $this->db->select('*');
        $this->db->from('person_requests_transactions');
        $this->db->where('ReqId', $id);
        return $this->db->get()->result_array();
    }

    public function doDeployContract($inputs){

        $this->db->select('*');
        $this->db->from('person_requests');
        $this->db->where(array(
            'ReqId' => $inputs['inputReqId'],
            'ReqContractStatus' => 1
        ));
        $data = $this->db->get()->num_rows();

        if ($data == 1) {
            $msg = $this->config->item('DBMessages')['ErrorAction'];
            $msg['content'] = 'قرارداد هوشمند برای این درخواست قبلا ایجاد شده است.';
            return $msg;
        }


        $nodeUrl = $this->config->item('node_url');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $nodeUrl . 'deployContract',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $contract = json_decode($response, true);

        if (isset($contract['Contract']) && startsWith($contract['Contract'], "0x") && (strlen($contract['Contract']) >= 40 && strlen($contract['Contract']) <= 42)) {
            $userArray = array(
                'ReqContractStatus' => 1,
                'ReqContractAddress' => $contract['Contract']
            );
            $this->db->update('person_requests', $userArray);
            return $this->config->item('DBMessages')['SuccessAction'];
        }

        $msg = $this->config->item('DBMessages')['ErrorAction'];
        $msg['content'] = 'عدم دریافت پاسخ از شبکه بلاکچین. لطفا چند لحظه دیگر مجددا تلاش کنید.';
        return $msg;


    }

    public function doPublishProposal($inputs){

        $this->db->select('*');
        $this->db->from('person_requests');
        $this->db->where(array(
            'ReqId' => $inputs['inputReqId']
        ));
        $data = $this->db->get()->result_array();

        if ($data['ReqProposalStatus'] == 1) {
            $msg = $this->config->item('DBMessages')['ErrorAction'];
            $msg['content'] = 'پروپوزال برای این درخواست قبلا ایجاد شده است.';
            return $msg;
        }


        $proposalId = random_string('alpha',60);
        $proposalTitle = $inputs['inputProposalTitle'];
        $contractAddress = $data[0]['ReqContractAddress'];

        $nodeUrl = $this->config->item('node_url');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $nodeUrl . 'createProposal/'.$proposalId.'/'.$proposalTitle.'/'.$contractAddress,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $transactionHash = json_decode($response, true);

        if (isset($transactionHash['transactionHash']) && startsWith($transactionHash['transactionHash'], "0x") && (strlen($transactionHash['transactionHash']) == 66 ) ) {

            $this->db->where(array(
                'ReqId' => $inputs['inputReqId']
            ));
            $userArray = array(
                'ReqProposalStatus' => 1,
                'ReqProposalName' => $proposalTitle,
                'ReqProposalId' => $proposalId
            );
            $this->db->update('person_requests', $userArray);

            $userArray = array(
                'ReqId' => $inputs['inputReqId'],
                'TransactionHash' => $transactionHash['transactionHash'],
                'FunctionCall' => 'createProposal',
                'InputData' => json_encode(array(
                    'ProposalId' => $proposalId,
                    'ProposalTitle' => $proposalTitle,
                    'ContractAddress' => $contractAddress
                )),
                'CreateDateTime' => time(),
                'CreatePersonId' => $inputs['inputCreatePersonId']
            );
            $this->db->insert('person_requests_transactions', $userArray);


            return $this->config->item('DBMessages')['SuccessAction'];
        }

        $msg = $this->config->item('DBMessages')['ErrorAction'];
        $msg['content'] = 'عدم دریافت پاسخ از شبکه بلاکچین. لطفا چند لحظه دیگر مجددا تلاش کنید.';
        return $msg;


    }

}

?>