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

    public $selectClause    = 	" business_share,
                                  npwp,   
                                  is_monthly_invoice,   
                                  sap_account";

    public $fromClause      = "(select s01 as  business_share,
                                        s02 as npwp,
                                        s03 as is_monthly_invoice,          
                                        s04 as sap_account
                                from table(pack_list_cust_acc_prod.account_details_addinformation(%s,%s)))";

    public $refs            = array();

    function __construct($account_num='') {
        parent::__construct();

        //$this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$account_num."'");
        // $this->db_crm = $this->load->database('default', TRUE);
        // $this->db_crm->_escape_char = ' ';
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
