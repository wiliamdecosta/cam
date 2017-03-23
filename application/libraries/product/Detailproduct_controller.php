<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class Detailproduct_controller {

	function read() {

        $customer_ref = getVarClean('customer_ref', 'str', '');
        $product_seq = getVarClean('product_seq', 'int', 0);

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'records' => 0, 'total' => 0);

        try {

            $ci = & get_instance();
            $ci->load->model('product/product');
            $table = $ci->product;
            
            $items = $table->getDetailProduct($customer_ref, $product_seq);

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