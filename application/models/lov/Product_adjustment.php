<?php

/**
 * Pembuatan schema Model
 *
 */
class Product_adjustment extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    ="product_label,
                              product_name ,
                              account_num ,
                              account_name ,
                              customer_ref,
                              product_id ,
                              product_seq ,
                              cps_id";

    public $fromClause      = "( select 
                                      s01 as product_label,
                                      s02 as product_name ,
                                      s03 as account_num ,
                                      s04 as account_name ,
                                      s05 as customer_ref,
                                      n01 as product_id ,
                                      n02 as product_seq ,
                                      n03 as cps_id
                                  from table(pack_lov.get_parentcustproductdet_list(%s, ''))
 
                                )";

    public $refs            = array();

    function __construct($) {
        parent::__construct();
       
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
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
