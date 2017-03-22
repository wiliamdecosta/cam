<?php

/**
 * Pembuatan schema Model
 *
 */
class product_attribute_sub extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    ="  product_id ,
                                product_attribute_subid ,
                                attribute_ua_name,
                                attribute_bill_name,
                                mandatory_boo,
                                attribute_units,
                                display_position ,
                                val_type,
                                val_refference";

    public $fromClause      = "( select n01 as product_id ,
                                  n02 as product_attribute_subid ,
                                  s01 as attribute_ua_name,
                                  s02 as attribute_bill_name,
                                  s03 as mandatory_boo,
                                  s04 as attribute_units,
                                  n03 as display_position ,
                                  s05 as val_type,
                                  s06 as val_refference
                                  from table(pack_lov.get_prodattr_list_byprodid(%s, to_number(%s), '')) )";

    public $refs            = array();

    function __construct($product_id = 0) {
        parent::__construct();
        //$this->db = $this->load->database('tosdb', TRUE);
        //$this->db->_escape_char = ' ';
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$product_id."'");
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
