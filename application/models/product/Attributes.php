<?php

/**
 * Pembuatan schema Model
 *
 */
class Attributes extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = 	" attribute_ua_name,
                                  attribute_value ,
                                  start_dat ,
                                  end_dat ,
                                  file_name ,
                                  orig_file_name ,
                                  file_dir";

    public $fromClause      = "(select  s01 as attribute_ua_name,
                                      s02 as attribute_value ,
                                      s03 as start_dat ,
                                      s04 as end_dat ,
                                      s21 as file_name,
                                      s22 as orig_file_name,
                                      s23 as file_dir 
                                from table(pack_list_cust_acc_prod.product_details_attributes(%s,%s, %d)))";

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
