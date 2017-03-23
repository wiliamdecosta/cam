<?php

/**
 * Pembuatan schema Model
 *
 */
class Additional_information extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    =   " sap_code_bill,
                                sap_code_unbill,
                                sold2party";

    public $fromClause      = "(select s01 as sap_code_bill,
                                         s02 as sap_code_unbill,
                                         s03 as sold2party
                                       from table(pack_list_cust_acc_prod.customer_details_attribute(%s,%s)))";

    public $refs            = array();

    function __construct($customer_ref='') {
        parent::__construct();
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$customer_ref."'");
    }

    function validate() {
        $ci =& get_instance();

        if($this->actionType == 'CREATE') {
            //do something
            // example :
            //$this->record['created_date'] = date('Y-m-d');
            //$this->record['updated_date'] = date('Y-m-d');

        }else {
            //do something
            //example:
            //$this->record['updated_date'] = date('Y-m-d');
            //if false please throw new Exception

        }
        return true;
    }

}

/* End of file Users.php */
