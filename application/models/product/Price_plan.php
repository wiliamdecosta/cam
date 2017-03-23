<?php

/**
 * Pembuatan schema Model
 *
 */
class Price_plan extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = 	" tariff_name,
                                  product_quantity ,
                                  additions_quantity ,
                                  start_dat ,
                                  end_dat";

    public $fromClause      = "(select  s01 as tariff_name,
                                          n01 as product_quantity ,
                                          n02 as additions_quantity ,
                                          s02 as start_dat ,
                                          s03 as end_dat
                                from table(pack_list_cust_acc_prod.product_details_priceplan(%s,%s, %d)))";

    public $refs            = array();

    function __construct($customer_ref='', $product_seq=0) {
        parent::__construct();

        //$this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$customer_ref."'",$product_seq);
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
