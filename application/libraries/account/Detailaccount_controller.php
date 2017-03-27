<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class Detailaccount_controller {

	function read_detail_acc() {

        $account_num = getVarClean('account_num', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('account/account');
            $table = $ci->account;
            
            $items = $table->getDetailAccount($account_num);

            $data['total'] = 1;
            $data['records'] = 1;

            $data['rows'] = $items;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }

    function read_billing() {

        $account_num = getVarClean('bill_period', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('account/account');
            $table = $ci->account;
            
            $items = $table->getBilling($account_num);

            $data['total'] = 1;
            $data['records'] = 1;

            $data['rows'] = $items;
            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        echo json_encode($data);
        exit;
    }
   
}