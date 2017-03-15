<?php

/**
 * Pembuatan schema Model
 *
 */
class Account extends Abstract_model {

    public $table           = "account";
    public $pkey            = "customer_ref";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = 	" customer_ref,
                                  account_num ,
                                  account_name ,
                                  billing_status ,
                                  currency_code ,
                                  next_bill_dtm ,
                                  last_bill_dtm ,         
                                  bill_event_seq ,
                                  bill_charge_seq ,
                                  last_bill_seq ,
                                  invoicing_co_id ,
                                  default_cps_id";

    public $fromClause      = "( select s01 as customer_ref,
                                        s02 as account_num ,
                                        s03 as account_name ,
                                        s04 as billing_status ,
                                        s05 as currency_code ,
                                        s06 as next_bill_dtm ,
                                        s07 as last_bill_dtm ,         
                                        n01 as bill_event_seq ,
                                        n02 as bill_charge_seq ,
                                        n03 as last_bill_seq ,
                                        n04 as invoicing_co_id ,
                                        n05 as default_cps_id
                                from table(pack_lov.get_account_list(%s, %s, '')) )";

    public $refs            = array();

    function __construct($customer_ref = '') {
        parent::__construct();

        //$this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$customer_ref."'");
        $this->db_crm = $this->load->database('corecrm', TRUE);
        $this->db_crm->_escape_char = ' ';
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
