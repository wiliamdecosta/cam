<?php

/**
 * Pembuatan schema Model
 *
 */
class Status extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = 	" effective_dtm,
                                  product_status ,
                                  status_reason_txt";

    public $fromClause      = "(select  s01 as effective_dtm, 
                                        s02 as product_status , 
                                        s03 as status_reason_txt 
                                from table(pack_list_cust_acc_prod.product_details_status(%s,%s, %d)))";

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
