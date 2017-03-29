<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Json library
* @class Customer_controller
* @version 07/05/2015 12:18:00
*/
class Adjustment_controller {

    function readLovProduct()
    {

        $start = getVarClean('current', 'int', 0);
        $limit = getVarClean('rowCount', 'int', 5);

        $sort = getVarClean('sort', 'str', 'product_label');
        $dir = getVarClean('dir', 'str', 'asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');
        $customer_ref = getVarClean('customer_ref', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {
            permission_check('view-account');

            $ci = &get_instance();
            $ci->load->model('lov/product_adjustment');
            $table = new Product_adjustment();
            // $table = $ci->account;

            //Set default criteria. You can override this if you want
            foreach ($table->fields as $key => $field) {
                if (!empty($$key)) { // <-- Perhatikan simbol $$
                    if ($field['type'] == 'str') {
                        $table->setCriteria($table->getAlias() . $key . $table->likeOperator . " '" . $$key . "' ");
                    } else {
                        $table->setCriteria($table->getAlias() . $key . " = " . $$key);
                    }
                }
            }

            if (!empty($searchPhrase)) {
                $table->setCriteria("(upper(account_num) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                        OR upper(account_name) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                        OR upper(product_label) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                        OR upper(product_name) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                        OR upper(customer_ref) " . $table->likeOperator . " upper('%" . $searchPhrase . "%')
                                    )");
            }
            $start = ($start - 1) * $limit;
            $items = $table->getAll($start, $limit, $sort, $dir);
            $totalcount = $table->countAll();

            $data['rows'] = $items;
            $data['success'] = true;
            $data['total'] = $totalcount;

        } catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

    function readLovAdjustment_type() {

        $start = getVarClean('current','int',0);
        $limit = getVarClean('rowCount','int',5);

        $sort = getVarClean('sort','str','adjustment_type_id');
        $dir  = getVarClean('dir','str','asc');

        $searchPhrase = getVarClean('searchPhrase', 'str', '');

        $data = array('rows' => array(), 'success' => false, 'message' => '', 'current' => $start, 'rowCount' => $limit, 'total' => 0);

        try {
            //permission_check('view-customer');

            $ci = & get_instance();
            $ci->load->model('lov/adjustment_type');
            $table = $ci->adjustment_type;

            //Set default criteria. You can override this if you want
            foreach ($table->fields as $key => $field){
                if (!empty($$key)){ // <-- Perhatikan simbol $$
                    if ($field['type'] == 'str'){
                        $table->setCriteria($table->getAlias().$key.$table->likeOperator." '".$$key."' ");
                    }else{
                        $table->setCriteria($table->getAlias().$key." = ".$$key);
                    }
                }
            }

            if(!empty($searchPhrase)) {
                $table->setCriteria("(upper(adjustment_type_name) ".$table->likeOperator." upper('%".$searchPhrase."%') OR upper(adjustment_type_name) ".$table->likeOperator." upper('%".$searchPhrase."%'))");
            }

            $start = ($start-1) * $limit;
            $items = $table->getAll($start, $limit, $sort, $dir);
            $totalcount = $table->countAll();

            $data['rows'] = $items;
            $data['success'] = true;
            $data['total'] = $totalcount;

        }catch (Exception $e) {
            $data['message'] = $e->getMessage();
        }

        return $data;
    }

}

/* End of file Groups_controller.php */