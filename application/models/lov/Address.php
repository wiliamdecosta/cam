<?php

/**
 * Pembuatan schema Model
 *
 */
class Address extends Abstract_model {

    public $table           = "";
    public $pkey            = "";
    public $alias           = "";

    public $fields          = array();

    public $selectClause    = 	" address_1, 
                                  address_2, 
                                  address_3, 
                                  address_4, 
                                  address_5, 
                                  zipcode, 
                                  country_name, 
                                  customer_ref, 
                                  address_seq , 
                                  country_id , 
                                  address_format_id ";

    public $fromClause      = "( select  s01 as address_1, 
                                          s02 as address_2, 
                                          s03 as address_3, 
                                          s04 as address_4, 
                                          s05 as address_5, 
                                          s06 as zipcode, 
                                          s07 as country_name, 
                                          s08 as customer_ref, 
                                          n01 as address_seq , 
                                          n03 as country_id , 
                                          n04 as address_format_id 
                                  from table(pack_lov.get_addres_bycustomer(%s, %s,''))
                                )";

    public $refs            = array();

    function __construct($customer_ref = '') {
        parent::__construct();

        //$this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'");
        $this->fromClause = sprintf($this->fromClause, "'".$this->session->userdata('user_name')."'", "'".$customer_ref."'");
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
