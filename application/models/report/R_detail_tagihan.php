<?php

/**
 * Pembuatan schema Model
 *
 */
class R_detail_tagihan extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();
    //public $sessionUsername = $this->session->userdata('user_name');

    public $selectClause    = "   customer_ref, 
                                  account_num, 
                                  account_name, 
                                  invoice_num, 
                                  npwp, 
                                  revenue_code_id, 
                                  product_group, 
                                  product_name, 
                                  product_label, 
                                  prod_period, 
                                  gl_account, 
                                  curr_type, 
                                  bill_mny, 
                                  installation, 
                                  abonemen, 
                                  charge_start_dat, 
                                  cust_order_num, 
                                  product_id, 
                                  product_seq,
                                  sap_code_bill,
                                  sap_code_unbill";
                                  
    public $fromClause      = "( select s01 as customer_ref, 
                                  s02 as account_num, 
                                  s03 as account_name, 
                                  s04 as invoice_num, 
                                  s05 as npwp, 
                                  n01 as revenue_code_id, 
                                  s06 as product_group, 
                                  s07 as product_name, 
                                  s08 as product_label, 
                                  s09 as prod_period, 
                                  s10 as gl_account, 
                                  s11 as curr_type, 
                                  n02 as bill_mny, 
                                  n03 as installation, 
                                  n04 as abonemen, 
                                  s12 as charge_start_dat, 
                                  s13 as cust_order_num, 
                                  n05 as product_id, 
                                  n06 as product_seq,
                                  s14 as sap_code_bill,
                                  s15 as sap_code_unbill
                                from table(pack_report.rep_billing_product_detail(%s,%s,null,''))
                                )";

    public $refs            = array();

    function __construct($periode = "") {
        parent::__construct();
        //$this->db = $this->load->database('tosdb', TRUE);
        //$this->db->_escape_char = ' ';

        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$periode."'"); 

        //$this->db_crm = $this->load->database('corecrm', TRUE);
        //$this->db_crm->_escape_char = ' ';
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
