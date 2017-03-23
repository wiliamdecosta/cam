<?php

/**
 * Pembuatan schema Model
 *
 */
class Contact_details extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    =   " customer_name,
                                  address,
                                  email_address,
                                  daytime_contact_tel,
                                  evening_contact_tel,
                                  mobile_contact_tel,
                                  fax_contact_tel";

    public $fromClause      = "(select s01 as customer_name,
                                s21 as address,
                                s02 as email_address,
                                s03 as daytime_contact_tel,
                                s04 as evening_contact_tel,
                                s05 as mobile_contact_tel,
                                s06 as fax_contact_tel
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
