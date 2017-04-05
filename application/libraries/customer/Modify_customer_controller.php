<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modify_customer_controller {

    function customer_detail() {

        $customer_ref = getVarClean('customer_ref', 'str', '');
        $data = array();
        try {

            $ci = & get_instance();
            $ci->load->model('customer/customer');
            $table = $ci->customer;

            $customer_detail = $table->getDetailCustomer($customer_ref);
            $contact_address = $table->getContactAddressDetails($customer_ref);
            $attributes = $table->getCustomerDetailAttribute($customer_ref);

            $data['customer_detail'] = $customer_detail;
            $data['contact_address'] = $contact_address;
            $data['attributes'] = $attributes;

            $data['success'] = true;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
            $data['success'] = false;
        }

        echo json_encode($data);
        exit;
    }


}

/* End of file Users_groups_controller.php */
